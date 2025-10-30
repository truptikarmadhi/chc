<?php
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Theme setting',
      'menu_title' => 'Theme setting',
      'menu_slug' => 'theme-setting',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}

// 

add_action('init', 'case_studies');
function case_studies()
{
  register_post_type(
    'case_studies',
    array(
      'labels' => array(
        'name' => __("Case studies", 'textdomain'),
        'singular_name' => __("Case studies", 'textdomain'),
        'add_new' => __("Add case study"),
        'add_new_item' => __("Add case study"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'case_study', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
  register_taxonomy(
    'case_studies_cat',
    'case_studies',
    array(
      'labels' => array(
        'name'              => 'Case studies category',
        'singular_name'     => 'Case studies category',
        'search_items'      => 'Search Case studies category',
        'all_items'         => 'All Case studies category',
        'parent_item'       => 'Parent category Group',
        'parent_item_colon' => 'Parent category Group:',
        'edit_item'         => 'Edit Case studies category',
        'update_item'       => 'Update Case studies category',
        'add_new_item'      => 'Add New Case studies category',
        'new_item_name'     => 'New Case studies category Name',
        'menu_name'         => 'Case studies category',
        'back_to_items'     => '← Go to Case studies category'
      ),
      'hierarchical'      => true,
      'public'            => true,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'rewrite'           => array('slug' => 'case-studies-cat'),
    )
  );
}

add_action('init', 'testimonials');
function testimonials()
{
  register_post_type(
    'testimonials',
    array(
      'labels' => array(
        'name' => __("Testimonials", 'textdomain'),
        'singular_name' => __("Testimonials", 'textdomain'),
        'add_new' => __("Add testimonial"),
        'add_new_item' => __("Add testimonial"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'testimonial', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
}

add_action('init', 'services');
function services()
{
  register_post_type(
    'services',
    array(
      'labels' => array(
        'name' => __("Service", 'textdomain'),
        'singular_name' => __("Service", 'textdomain'),
        'add_new' => __("Add service"),
        'add_new_item' => __("Add service"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'service', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
  register_taxonomy(
    'services_cat',
    'services',
    array(
      'labels' => array(
        'name'              => 'Services category',
        'singular_name'     => 'Services category',
        'search_items'      => 'Search Services category',
        'all_items'         => 'All Services category',
        'parent_item'       => 'Parent category Group',
        'parent_item_colon' => 'Parent category Group:',
        'edit_item'         => 'Edit Services category',
        'update_item'       => 'Update Services category',
        'add_new_item'      => 'Add New Services category',
        'new_item_name'     => 'New Services category Name',
        'menu_name'         => 'Services category',
        'back_to_items'     => '← Go to Services category'
      ),
      'hierarchical'      => true,
      'public'            => true,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'rewrite'           => array('slug' => 'case-studies-cat'),
    )
  );
}

add_filter('wpcf7_autop_or_not', '__return_false');

add_image_size('gallery-thumb', 400, 0, true);
add_image_size('medium', 1200, 0, true);
add_image_size('fullscreen', 2700, 0, true);


function enqueue_custom_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom-ajax', get_template_directory_uri('/resources/assets/scripts/parts/handlebar.js'), ['jquery'], '1.0', true);

  wp_localize_script('custom-ajax', 'ajax_params', [
    'ajax_url' => admin_url('admin-ajax.php'),
  ]);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');




function load_case()
{
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'case_studies',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  if ($category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'case_studies_cat',
        'field'    => 'slug',
        'terms'    => $category,
      ],
    ];
  }

  $query = new WP_Query($args);
  $casestudy = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $case_id = get_the_ID();
      $categories = get_the_terms($case_id, 'case_studies_cat');
      $category_data = [];
      if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
          $category_data[] = [
            'name' => $category->name,
            'slug' => $category->slug,
          ];
        }
      }

      $casestudy[] = [
        'title'      => get_the_title(),
        'role'       => get_field('role', $case_id),
        'location'  => get_field('location', $case_id),
        'image'      => get_the_post_thumbnail_url($case_id, 'large'),
        'link'       => get_permalink($case_id),
        'categories' => $category_data,
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success(['posts' => $casestudy, 'total_posts' => $query->found_posts,]);
}
add_action('wp_ajax_load_case', 'load_case');
add_action('wp_ajax_nopriv_load_case', 'load_case');



function load_testimonial()
{
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'testimonials',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  $query = new WP_Query($args);
  $testimonial = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $testimonial_id = get_the_ID();

      $testimonial[] = [
        'title'      => get_the_title(),
        'content'    => get_the_content($testimonial_id),
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success(['posts' => $testimonial, 'total_posts' => $query->found_posts,]);
}
add_action('wp_ajax_load_testimonial', 'load_testimonial');
add_action('wp_ajax_nopriv_load_testimonial', 'load_testimonial');



function load_service()
{
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'services',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  if ($category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'services_cat',
        'field'    => 'slug',
        'terms'    => $category,
      ],
    ];
  }

  $query = new WP_Query($args);
  $services = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $service_id = get_the_ID();
      $categories = get_the_terms($service_id, 'services_cat');
      $category_data = [];
      if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
          $category_data[] = [
            'name' => $category->name,
            'slug' => $category->slug,
          ];
        }
      }

      $services[] = [
        'title'      => get_the_title(),
        'content'    => get_the_content($service_id),
        'image'      => get_the_post_thumbnail_url($service_id, 'large'),
        'link'       => get_permalink($service_id),
        'categories' => $category_data,
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success(['posts' => $services, 'total_posts' => $query->found_posts,]);
}
add_action('wp_ajax_load_service', 'load_service');
add_action('wp_ajax_nopriv_load_service', 'load_service');


// functions.php

// 1) enqueue script and localize ajax data
function tp_enqueue_search_redirect_script()
{
  wp_enqueue_script(
    'tp-search-redirect',
    get_stylesheet_directory_uri() . '/js/tp-search-redirect.js',
    array('jquery'),
    '1.1',
    true
  );

  wp_localize_script('tp-search-redirect', 'tpSearchRedirect', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce'    => wp_create_nonce('tp_search_redirect_nonce'),
    'fallback_search_url' => home_url('/?s='),
  ));
}
add_action('wp_enqueue_scripts', 'tp_enqueue_search_redirect_script');


// 2) AJAX handler for logged-in and not-logged-in users
function tp_ajax_search_redirect()
{
  if (
    ! isset($_POST['nonce']) ||
    ! wp_verify_nonce($_POST['nonce'], 'tp_search_redirect_nonce')
  ) {
    wp_send_json_error(array('message' => 'Invalid nonce'), 403);
  }

  $term = isset($_POST['term']) ? sanitize_text_field(wp_unslash($_POST['term'])) : '';

  if (empty($term)) {
    wp_send_json_error(array('message' => 'Empty search term'), 400);
  }

  // 🔹 Query ALL public post types (post, page, custom post types, etc.)
  $args = array(
    'post_type'      => 'any', // <-- all post types
    's'              => $term,
    'posts_per_page' => 1,
    'post_status'    => 'publish',
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    $query->the_post();
    $url = get_permalink();
    wp_reset_postdata();
    wp_send_json_success(array('url' => esc_url_raw($url)));
  } else {
    wp_send_json_error(array('message' => 'No results'), 404);
  }
}
add_action('wp_ajax_tp_search_redirect', 'tp_ajax_search_redirect');
add_action('wp_ajax_nopriv_tp_search_redirect', 'tp_ajax_search_redirect');
