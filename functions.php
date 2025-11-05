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
    'fallback_search_url' => home_url('/'),
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

// filter case study

add_action('wp_ajax_get_handlebars_ajax', 'gethandlebarsAJAX');
add_action('wp_ajax_nopriv_get_handlebars_ajax', 'gethandlebarsAJAX');

function gethandlebarsAJAX()
{
  global $wpdb, $post;
  $cats = isset($_POST['cat']) ? $_POST['cat'] : 'all';

  $sort = $_POST['sort'];
  $loadMore = $_POST['loadMoreAmount'];
  
 if ($cats !== 'all') {
    if (is_string($cats)) {
        $cats = explode(',', $cats);
    }
    $tax_array[] = array(
        'taxonomy' => 'case_studies_cat',
        'field'    => 'slug',
        'terms'    => $cats,
        'operator' => 'IN',
    );

    $args['tax_query'] = array(
        'relation' => 'AND',
        $tax_array
    );
}
  $args = array(
    'post_type' => 'case_studies',
    'posts_per_page' => $loadMore,
    'tax_query' => $tax_array,
    'order' => 'DESC',
    'orderby' => 'date',
  );

  $callback['handlebars'] = array();
  $callback['loadMoreNumber'] = 0;
  
  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
        $categories = get_the_terms( $post->id, 'case_studies_cat' );
        
        $callback['handlebars'][] = array(
          'title' => html_entity_decode(wp_trim_words(get_the_title(), 6, '...')),
          'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
          'link' => get_the_permalink(),
          'description' => wp_trim_words(get_the_content(), 15, '...'),
          'ID' => get_the_ID(),
          'location' => get_field('location',get_the_ID()),
          'categories' => $categories,
        );
      endwhile;
      $callback['loadMoreNumber'] = $the_query->found_posts;
      
  endif;

  echo json_encode($callback);

  wp_die();
}