<?php
/**
* Dazzling functions and definitions
*
* @package dazzling
*/

function wd_hierarchical_tags_register() {

  // Maintain the built-in rewrite functionality of WordPress tags

  global $wp_rewrite;

  $rewrite =  array(
    'hierarchical'              => false, // Maintains tag permalink structure
    'slug'                      => get_option('tag_base') ? get_option('tag_base') : 'tag',
    'with_front'                => ! get_option('tag_base') || $wp_rewrite->using_index_permalinks(),
    'ep_mask'                   => EP_TAGS,
  );

  // Override structure of built-in WordPress tags

  register_taxonomy( 'post_tag', 'post', array(
    'hierarchical'              => true, // Was false, now set to true
    'query_var'                 => 'tag',
    'rewrite'                   => $rewrite,
    'public'                    => true,
    'show_ui'                   => true,
    'show_admin_column'         => true,
    '_builtin'                  => true,
  ) );

}
add_action('init', 'wd_hierarchical_tags_register');

//

if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    function wpex_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "0.64em 0.73em 0.82em 0.91em 1.00em 1.09em 1.18em 1.27em 1.36em 1.45em 1.54em 1.63em";
        return $initArray;
    }
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

// Custom Tinymce Styles

add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );
function my_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri().'/tinymce_custom_editor.css' );
}

// Custom Admin-Panel Styles

add_action('admin_head', 'my_custom_admin_styles');

function my_custom_admin_styles() {
  echo '<style>
    body#tinymce.wp-editor {
      background-color:rgb(128,128,128) !important;
    } 
    #qtranxs-meta-box-lsb,
	.qtranxs-lang-switch-wrap{
		display:none;
    } 
	.qtranxs-lang-switch-wrap:first-child{
		display:block;
    }
  </style>';
}

//

function portfolio_tag( $query ) {
    if ( is_tag() && $query->is_main_query() ) {
        $query->set( 'post_type', 'project' );
    }
}
add_action( 'pre_get_posts', 'portfolio_tag' );

//

add_action('after_setup_theme','magnat_bw_size');
function magnat_bw_size() {
    add_image_size('magnat-bw-image', 201, 201, false);
    add_image_size('magnat-orig-image', 200, 200, false);
}

add_filter('wp_generate_attachment_metadata','magnat_bw_filter');
function magnat_bw_filter($meta) {
    $file = wp_upload_dir();
    $file = trailingslashit($file['path']).$meta['sizes']['magnat-bw-image']['file'];
    list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
    $image = wp_load_image($file);
    imagefilter($image, IMG_FILTER_GRAYSCALE);
    switch ($orig_type) {
        case IMAGETYPE_GIF:
            imagegif( $image, $file );
            break;
        case IMAGETYPE_PNG:
            imagepng( $image, $file );
            break;
        case IMAGETYPE_JPEG:
            imagejpeg( $image, $file );
            break;
    }
    return $meta;
}

function create_post_type_taxonomy() {
    register_post_type( 'project',
        array(
            'labels' => array(
                'name' => __('Projects','dazzling'),
                'singular_name' => __('Project','dazzling'),
                'add_new' => __('Add project','dazzling'),
                'add_new_item' => __('Add project','dazzling'),
                'edit' => __('Edit project','dazzling'),
                'edit_item' => __('Project','dazzling'),
                'new_item' => __('New project','dazzling'),
                'view' => __('View project','dazzling'),
                'view_item' => __('View project','dazzling'),
                'search_items' => __('Search project','dazzling'),
                'not_found' => __('Projects not found','dazzling'),
                'not_found_in_trash' => __('Projects not found in trash','dazzling'),
                'parent' => __('Parent project','dazzling'),
            ),
            'taxonomies' => array( 'post_tag' ),
            'public' => true,
            'menu_position' => 4,
            'supports' => array( 'title','editor' ),
            'menu_icon' => 'dashicons-portfolio',
            'has_archive' => true
        )
    );
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __('News','dazzling'),
                'singular_name' => __('News','dazzling'),
                'add_new' => __('Add news','dazzling'),
                'add_new_item' => __('Add news','dazzling'),
                'edit' => __('Edit news','dazzling'),
                'edit_item' => __('Edit news','dazzling'),
                'new_item' => __('New news','dazzling'),
                'view' => __('View news','dazzling'),
                'view_item' => __('View news','dazzling'),
                'search_items' => __('Find news','dazzling'),
                'not_found' => __('Not found','dazzling'),
                'not_found_in_trash' => __('Trash is empty','dazzling'),
                'parent' => __('Parent news','dazzling'),
            ),
            'public' => true,
            'menu_position' => 4,
            'supports' => array( 'title','thumbnail','editor' ),
            'menu_icon' => 'dashicons-format-aside',
            'has_archive' => true
        )
    );
}
add_action( 'init', 'create_post_type_taxonomy' );

function ae_detect_ie_edge(){
    if (isset($_SERVER['HTTP_USER_AGENT']) && (
			(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) ||
			(strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') !== false)
		)
    )
        return true;
    else
        return false;
}
function ae_detect_ie(){
    if (isset($_SERVER['HTTP_USER_AGENT']) &&
		(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
    )
        return true;
    else
        return false;
}

function enqueue_script(){
	wp_enqueue_script( 'script', get_template_directory_uri() . '/inc/js/script.js', '', '1.0.0', false);
	wp_enqueue_script( 'rotate', get_template_directory_uri() . '/inc/js/jQueryRotate.js', '', '2.3.0', false);
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/inc/js/jquery.masonry.min.js', '', '4.2.1', false);
	
	wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/inc/js/jquery.lazyload.min.js', '', '1.9.3', false);
	wp_enqueue_script( 'scrollstop', get_template_directory_uri() . '/inc/js/jquery.scrollstop.min.js', '', '1.9.3', false);
	
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/inc/js/waypoints.min.js', '', '1.1.4', false);
	
	// wp_enqueue_script( 'swipeupdown', get_template_directory_uri() . '/inc/js/jquerymobile-swipeupdown.js', '', filemtime( get_stylesheet_directory() . '/inc/js/jquerymobile-swipeupdown.js' ), false);	
}
add_action( 'wp_enqueue_scripts', 'enqueue_script', 20 );

//

function lang_switcher() {	
	$languages = pll_the_languages( array( 'raw' => 1 ) );
	$num = 0;
	foreach($languages as $language) {
		$num++;
		$n = 1.8+0.1*$num;
		echo '<div id="lang-'.$language['slug'].'" class="m-slide-items-nav-item m-slide-items-nav-lang" style="animation-delay:'.$n.'s"><a href="'.$language['url'].'"';
		if($language['current_lang']) echo ' class="active"';
		echo '>'.$language['slug'].'</a></div>';
	}
}

//

add_action( 'init', 'unregister_category');
function unregister_category(){
	global $wp_taxonomies;
	$taxonomies = array( 'category' );
	foreach( $taxonomies as $taxonomy ) {
		if ( taxonomy_exists( $taxonomy) ) unset( $wp_taxonomies[$taxonomy]);
	}
	global $wp_rewrite;
	$rewrite =  array(
		'hierarchical'              => false, // Maintains tag permalink structure
		'slug'                      => get_option('post_tag') ? get_option('post_tag') : 'tag',
		'with_front'                => ! get_option('post_tag') || $wp_rewrite->using_index_permalinks(),
		'ep_mask'                   => EP_TAGS,
	);
}

//

/*function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = __('News','dazzling');
    $submenu['edit.php'][5][0] = __('News','dazzling');
    $submenu['edit.php'][10][0] = __('Add news','dazzling');
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('News','dazzling');
    $labels->singular_name = __('News','dazzling');
    $labels->add_new = __('Add news','dazzling');
    $labels->add_new_item = __('Add news','dazzling');
    $labels->edit_item = __('Edit news','dazzling');
    $labels->new_item = __('Add news','dazzling');
    $labels->view_item = __('View news','dazzling');
    $labels->search_items = __('Find news','dazzling');
    $labels->not_found = __('Not found','dazzling');
    $labels->not_found_in_trash = __('Trash is empty','dazzling');
}
add_action( 'init', 'change_post_object_label' );*/

//

add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );
function remove_default_stylesheet() {
    wp_dequeue_style( 'dazzling-style' );
    wp_deregister_style( 'dazzling-style' );
    wp_register_style( 'dazzling-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
    wp_enqueue_style( 'dazzling-style' );
    wp_register_style( 'siteorigin-style', get_stylesheet_directory_uri() . '/inc/css/front-flex.min.css', array(), filemtime( get_stylesheet_directory() . '/inc/css/front-flex.min.css' ) );
    wp_enqueue_style( 'siteorigin-style' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_customs', 20 );
function enqueue_customs() {
    wp_register_style( 'owl-carousel-style', get_stylesheet_directory_uri() . '/inc/css/owl.carousel.min.css', array(), filemtime( get_stylesheet_directory() . '/inc/css/owl.carousel.min.css' ) );
    wp_enqueue_style( 'owl-carousel-style' );
    wp_register_style( 'owl-theme-default-style', get_stylesheet_directory_uri() . '/inc/css/owl.theme.default.min.css', array(), filemtime( get_stylesheet_directory() . '/inc/css/owl.theme.default.min.css' ) );
    wp_enqueue_style( 'owl-theme-default-style' );
	
	wp_register_script( 'lightslider', get_stylesheet_directory_uri() . '/inc/js/lightslider.js', false, filemtime( get_stylesheet_directory() . '/inc/js/lightslider.js' ) );
	wp_enqueue_script( 'lightslider' );
	
    wp_register_style( 'lightslider-style', get_stylesheet_directory_uri() . '/inc/css/lightslider.css', array(), filemtime( get_stylesheet_directory() . '/inc/css/lightslider.css' ) );
    wp_enqueue_style( 'lightslider-style' );
	
	wp_register_script( 'owl-carousel', get_stylesheet_directory_uri() . '/inc/js/owl.carousel.js', false, filemtime( get_stylesheet_directory() . '/inc/js/owl.carousel.js' ) );
	wp_enqueue_script( 'owl-carousel' );
	
	wp_register_script( 'footer-script', get_stylesheet_directory_uri() . '/inc/js/footer-script.js', false, filemtime( get_stylesheet_directory() . '/inc/js/footer-script.js' ), true );
	wp_enqueue_script( 'footer-script' );
	
	wp_register_script( 'ua-parser', get_stylesheet_directory_uri() . '/inc/js/ua-parser.js', false, filemtime( get_stylesheet_directory() . '/inc/js/ua-parser.js' ), true );
	wp_enqueue_script( 'ua-parser' );
	
	wp_register_script( 'documentsize', get_stylesheet_directory_uri() . '/inc/js/jquery.documentsize.js', false, filemtime( get_stylesheet_directory() . '/inc/js/jquery.documentsize.js' ), true );
	wp_enqueue_script( 'documentsize' );
	
	wp_register_script( 'page-script', get_stylesheet_directory_uri() . '/inc/js/page-script.js', false, filemtime( get_stylesheet_directory() . '/inc/js/page-script.js' ) );
	wp_enqueue_script( 'page-script' );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 730; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function dazzling_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1110; /* pixels */
  }
}
add_action( 'template_redirect', 'dazzling_content_width' );

if ( ! function_exists( 'dazzling_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dazzling_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Dazzling, use a find and replace
   * to change 'dazzling' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'dazzling', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'dazzling-featured', 730, 410, true );
  add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary'      => __( 'Primary Menu', 'dazzling' ),
    'footer-links' => __( 'Footer Links', 'dazzling' ) // secondary menu in footer
  ) );

  // Enable support for Post Formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

  // Setup the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'dazzling_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );
}
endif; // dazzling_setup
add_action( 'after_setup_theme', 'dazzling_setup' );

include(get_template_directory() . "/inc/widgets/widget-popular-posts.php");
include(get_template_directory() . "/inc/widgets/widget-social.php");


/**
 * Enqueue scripts and styles.
 */
function dazzling_scripts() {

  wp_enqueue_style( 'dazzling-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

  wp_enqueue_style( 'dazzling-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

  if( ( is_home() || is_front_page() ) && of_get_option('dazzling_slider_checkbox') == 1 ) {
    wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/inc/css/flexslider.css' );
  }

  if ( class_exists( 'jigoshop' ) ) { // Jigoshop specific styles loaded only when plugin is installed
    wp_enqueue_style( 'jigoshop-css', get_template_directory_uri().'/inc/css/jigoshop.css' );
  }

  wp_enqueue_style( 'dazzling-style', get_stylesheet_uri() );

  wp_enqueue_script('dazzling-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

  if( ( is_home() || is_front_page() ) && of_get_option('dazzling_slider_checkbox') == 1 ) {
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/inc/js/flexslider.min.js', array('jquery'), '2.5.0', true );
  }

  wp_enqueue_script( 'dazzling-main', get_template_directory_uri() . '/inc/js/main.js', array('jquery'), '1.5.4', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'dazzling_scripts' );

/**
 * Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
 */
function dazzling_ie_support_header() {
  echo '<!--[if lt IE 9]>'. "\n";
  echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/html5shiv.min.js' ) . '"></script>'. "\n";
  echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/respond.min.js' ) . '"></script>'. "\n";
  echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'dazzling_ie_support_header', 11 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';

if ( class_exists( 'woocommerce' ) ) {
/**
 * WooCommerce related functions
 */
require get_template_directory() . '/inc/woo-setup.php';
}

if ( class_exists( 'jigoshop' ) ) {
/**
 * Jigoshop related functions
 */
require get_template_directory() . '/inc/jigoshop-setup.php';
}

/**
 * Metabox file load
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * TGMPA
 */
require get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
 * Register Social Icon menu
 */
add_action( 'init', 'register_social_menu' );

function register_social_menu() {
  register_nav_menu( 'social-menu', _x( 'Social Menu', 'nav menu location', 'dazzling' ) );
}

/* Globals variables */
global $options_categories;
$options_categories = array();
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
}

// Typography Options
global $typography_options;
$typography_options = array(
        'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18px'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
        'faces' => array(
                'arial'          => 'Arial,Helvetica,sans-serif',
                'verdana'        => 'Verdana,Geneva,sans-serif',
                'trebuchet'      => 'Trebuchet,Helvetica,sans-serif',
                'georgia'        => 'Georgia,serif',
                'times'          => 'Times New Roman,Times, serif',
                'tahoma'         => 'Tahoma,Geneva,sans-serif',
                'Open Sans'      => 'Open Sans,sans-serif',
                'palatino'       => 'Palatino,serif',
                'helvetica'      => 'Helvetica,Arial,sans-serif',
                'helvetica-neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
        ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
        'color'  => true
);

// Typography Defaults
global $typography_defaults;
$typography_defaults = array(
        'size'  => '14px',
        'face'  => 'helvetica-neue',
        'style' => 'normal',
        'color' => '#6B6B6B'
);

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

  $option_name = '';
  // Get option settings from database
  $options = get_option( 'dazzling' );

  // Return specific option
  if ( isset( $options[$name] ) ) {
    return $options[$name];
  }

  return $default;
}
endif;

/**/

if(!function_exists ( ctl_sanitize_title ) && !is_admin()){
	function ctl_sanitize_title($title) {
		global $wpdb;

		$iso9_table = array(
			'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G',
			'Ґ' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
			'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'J',
			'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K',
			'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
			'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
			'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
			'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '',
			'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
			'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
			'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'j',
			'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
			'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
			'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
			'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
			'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'shh', 'ъ' => '',
			'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
		);
		$geo2lat = array(
			'ა' => 'a', 'ბ' => 'b', 'გ' => 'g', 'დ' => 'd', 'ე' => 'e', 'ვ' => 'v',
			'ზ' => 'z', 'თ' => 'th', 'ი' => 'i', 'კ' => 'k', 'ლ' => 'l', 'მ' => 'm',
			'ნ' => 'n', 'ო' => 'o', 'პ' => 'p','ჟ' => 'zh','რ' => 'r','ს' => 's',
			'ტ' => 't','უ' => 'u','ფ' => 'ph','ქ' => 'q','ღ' => 'gh','ყ' => 'qh',
			'შ' => 'sh','ჩ' => 'ch','ც' => 'ts','ძ' => 'dz','წ' => 'ts','ჭ' => 'tch',
			'ხ' => 'kh','ჯ' => 'j','ჰ' => 'h'
		);
		$iso9_table = array_merge($iso9_table, $geo2lat);

		$locale = get_locale();
		switch ( $locale ) {
			case 'bg_BG':
				$iso9_table['Щ'] = 'SHT';
				$iso9_table['щ'] = 'sht'; 
				$iso9_table['Ъ'] = 'A';
				$iso9_table['ъ'] = 'a';
				break;
			case 'uk':
			case 'uk_ua':
			case 'uk_UA':
				$iso9_table['И'] = 'Y';
				$iso9_table['и'] = 'y';
				break;
		}

		$is_term = false;
		$backtrace = debug_backtrace();
		foreach ( $backtrace as $backtrace_entry ) {
			if ( $backtrace_entry['function'] == 'wp_insert_term' ) {
				$is_term = true;
				break;
			}
		}

		$term = $is_term ? $wpdb->get_var("SELECT slug FROM {$wpdb->terms} WHERE name = '$title'") : '';
		if ( empty($term) ) {
			$title = strtr($title, apply_filters('ctl_table', $iso9_table));
			if (function_exists('iconv')){
				$title = iconv('UTF-8', 'UTF-8//TRANSLIT//IGNORE', $title);
			}
			$title = preg_replace("/[^A-Za-z0-9'_\-\.]/", '-', $title);
			$title = preg_replace('/\-+/', '-', $title);
			$title = preg_replace('/^-+/', '', $title);
			$title = preg_replace('/-+$/', '', $title);
		} else {
			$title = $term;
		}

		return $title;
	}
}
