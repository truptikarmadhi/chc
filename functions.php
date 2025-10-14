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


function cc_mime_types($mimes) {
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
            'rewrite' => array('slug' => 'case_study', 'with_front' => false),
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

add_image_size( 'gallery-thumb', 400, 0, true );
add_image_size( 'medium', 1200, 0, true );
add_image_size( 'fullscreen', 2700, 0, true );