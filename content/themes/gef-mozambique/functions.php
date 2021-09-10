<?php

/*-------------------------------------------------------------------------------------------------
Add Class to Body
------------------------------------------------------------------------------------------------- */

// Add specific CSS class by filter.

add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'layout__body' ) );
} );

/*-------------------------------------------------------------------------------------------------
Remove About Us
------------------------------------------------------------------------------------------------- */

function change_toolbar($wp_toolbar) {
	$wp_toolbar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'change_toolbar', 999);

/*-------------------------------------------------------------------------------------------------
  Remove Categories and Tags from default WP Posts
------------------------------------------------------------------------------------------------- */

function myprefix_remove_tax() {
    register_taxonomy('post_tag', array());
    register_taxonomy('post_format', array());
}
add_action('init', 'myprefix_remove_tax');

/*-------------------------------------------------------------------------------
GUTENBERG ADMIN SCRIPTS
-------------------------------------------------------------------------------*/

// add_action( 'admin_enqueue_scripts', 'mscfp_admin_style' );
// function mscfp_admin_style( $hook ) {
// 	   wp_enqueue_style( 'admin-gutenberg-style', get_stylesheet_directory_uri().'/dist/build/css/gutenberg.css' );
// }

/*-------------------------------------------------------------------------------
Gutenberg Colour Pallet
-------------------------------------------------------------------------------*/

// -- Disable Colors
add_theme_support( 'editor-color-palette', array() );
add_theme_support( 'disable-custom-colors' );


/*-------------------------------------------------------------------------------------------------
SHOW ADMIN FOR EDITOR
------------------------------------------------------------------------------------------------- */

if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

/*-------------------------------------------------------------------------------------------------
REPLACE EXCERPT
------------------------------------------------------------------------------------------------- */

function new_excerpt_more($more) {
	   global $post;
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*-------------------------------------------------------------------------------------------------
SETUP THEME
------------------------------------------------------------------------------------------------- */

add_action('after_setup_theme', 'custom_setup');


if (! function_exists('custom_setup')){

	function custom_setup() {

		global $wp_version, $wpdb;

		// Add styles for the visual editor
		add_editor_style();

		// Add default posts and comments RSS feed links to <head>.
		add_theme_support('automatic-feed-links');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu('primary', __('Primary Menu', 'wcmc'));
		register_nav_menu('mobile', __('Mobile Menu', 'wcmc'));
		register_nav_menu('footer', __('Footer Menu', 'wcmc'));
		register_nav_menu('social', __('Social Menu', 'wcmc'));

		// Add support for Featured Images
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(250, 250, true);
		add_image_size('banner', 1920, 456, true); // Banner Image
		add_image_size('featured', 500, 350, true); // Featured Image
		add_image_size('small-featured', 400, 260, true); // Featured Image
		add_image_size('logo', 300, 300, false); // Featured Image
		add_image_size('featured-portrait', 350, 500, true); // Featured Image

		// Disable default gallery css styles
		add_filter( 'use_default_gallery_style', '__return_false' );

		if (!is_admin()){
			add_action('wp_enqueue_scripts', 'custom_load_js');
		}
	}
}

/*-------------------------------------------------------------------------------------------------
LOAD STYLES
------------------------------------------------------------------------------------------------- */

function custom_styles(){
    wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
    wp_enqueue_style( 'main_css', get_stylesheet_directory_uri() . '/dist/build/css/main.css' );
    wp_enqueue_style( 'ie_css', get_stylesheet_directory_uri() . '/dist/build/css/ie.css' );
}

add_action( 'wp_enqueue_scripts', 'custom_styles' );

/*-------------------------------------------------------------------------------------------------
LOAD JS
------------------------------------------------------------------------------------------------- */

function load_js_with_hashes() {
  $dirJS = new DirectoryIterator(get_stylesheet_directory() . '/dist/build/js');
  $translation_array = include 'translations/wcmc-vue.php';

  foreach ($dirJS as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
      $fullName = basename($file);
      $name = substr(basename($fullName), 0, strpos(basename($fullName), '.'));

      switch($name) {
        case 'main':
          $deps = array('vendor');
          break;
        default:
          $deps = null;
          break;
      }

      wp_enqueue_script( $name, get_template_directory_uri() . '/dist/build/js/' . $fullName, $deps, null, true );
      wp_localize_script( $name, 'vue_translations', $translation_array );
    }
  }
}

function custom_load_js(){
	// Enqueue Javascript
	if(!is_admin()) {
    wp_enqueue_script( 'polyfill_js', 'https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise,fetch,Symbol,Array.prototype.@@iterator,Element.prototype.classList,Object.values,Object.entries,IntersectionObserver', '', '', true );
    load_js_with_hashes();
	}
}

/*-------------------------------------------------------------------------------------------------
SIDEBARS
------------------------------------------------------------------------------------------------- */

function wcmc_register_sidebar() {

	register_sidebar(array(
		'name' => __('Sidebar', 'wcmc'),
		'id' => 'sidebar',
		'before_widget' => '<li class="sidebar-widgets__item"><div class="sidebar-widget sidebar-widget-%1$s sidebar-widget-%2$s">',
		'after_widget' => "</div></li>",
		'before_title' => '<h3 class="sidebar-widget__title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('Header', 'wcmc'),
		'id' => 'header',
		'before_widget' => '<div class="header-widgets__item"><aside class="header-widget header-widget-%1$s header-widget-%2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="header-widget__title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('After Content', 'wcmc'),
		'id' => 'after-content',
		'before_widget' => '<div class="widgets__item"><aside class="widget widget-%1$s widget-%2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="widget__title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('Footer', 'wcmc'),
		'id' => 'footer',
		'before_widget' => '<div class="footer-widgets__item footer-widgets__item-%1$s footer-widgets__item-%2$s"><aside class="footer-widget footer-widget-%1$s footer-widget-%2$s">',
		'after_widget' => "</aside></div>",
		'before_title' => '<h3 class="footer-widget__title">',
		'after_title' => '</h3>'
	));
}

add_action('widgets_init', 'wcmc_register_sidebar');



/*-------------------------------------------------------------------------------------------------
EXCERPTS LENGTH & ADD ELLIPSIS
------------------------------------------------------------------------------------------------- */

function custom_get_the_excerpt($length=100, $end=' ...') {
	$out = get_the_excerpt();
	if (strlen($out) > $length)
		$out = substr($out, 0, $length).$end;

	return $out;
}

add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
	 add_post_type_support( 'page', 'excerpt' );
}

/*-------------------------------------------------------------------------------------------------
EXCERPT STRIP
------------------------------------------------------------------------------------------------- */

function excerpt_strip_tags( $content ) {
	return strip_tags($content);
}
add_filter( 'the_excerpt', 'excerpt_strip_tags' );

/*-------------------------------------------------------------------------------------------------
REMOVE ACCENTS FROM STRINGS
// https://stackoverflow.com/a/10790734/7450380
------------------------------------------------------------------------------------------------- */

function remove_accents_from_string_function ( $string ) {
  if ( !preg_match('/[\x80-\xff]/', $string) )
    return $string;

  $chars = array(
  // Decompositions for Latin-1 Supplement
  chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
  chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
  chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
  chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
  chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
  chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
  chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
  chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
  chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
  chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
  chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
  chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
  chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
  chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
  chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
  chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
  chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
  chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
  chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
  chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
  chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
  chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
  chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
  chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
  chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
  chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
  chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
  chr(195).chr(191) => 'y',
  // Decompositions for Latin Extended-A
  chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
  chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
  chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
  chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
  chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
  chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
  chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
  chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
  chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
  chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
  chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
  chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
  chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
  chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
  chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
  chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
  chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
  chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
  chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
  chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
  chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
  chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
  chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
  chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
  chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
  chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
  chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
  chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
  chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
  chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
  chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
  chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
  chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
  chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
  chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
  chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
  chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
  chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
  chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
  chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
  chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
  chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
  chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
  chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
  chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
  chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
  chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
  chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
  chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
  chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
  chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
  chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
  chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
  chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
  chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
  chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
  chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
  chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
  chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
  chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
  chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
  chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
  chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
  chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
  );

  return strtr($string, $chars);
}

add_filter( 'remove_accents_from_string', 'remove_accents_from_string_function' );

/*-------------------------------------------------------------------------------
ADD SUB PAGES
-------------------------------------------------------------------------------*/

// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );

// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
	$root_id = 0;
	// find the current menu item
	foreach ( $sorted_menu_items as $menu_item ) {
	  if ( $menu_item->current ) {
		// set the root id based on whether the current menu item has a parent or not
	  $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
	  break;
	}
  }
  // find the top level parent
  if ( ! isset( $args->direct_parent ) ) {
	$prev_root_id = $root_id;
	while ( $prev_root_id != 0 ) {
	  foreach ( $sorted_menu_items as $menu_item ) {
		if ( $menu_item->ID == $prev_root_id ) {
		  $prev_root_id = $menu_item->menu_item_parent;
		  // don't set the root_id to 0 if we've reached the top of the menu
		  if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
			break;
		  }
		}
	  }
	}
	$menu_item_parents = array();
	foreach ( $sorted_menu_items as $key => $item ) {
	  // init menu_item_parents
	  if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

	  if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
	  // part of sub-tree: keep!
		$menu_item_parents[] = $item->ID;
	  } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
	  // not part of sub-tree: away with it!
	  unset( $sorted_menu_items[$key] );
	}
  }
return $sorted_menu_items;
} else {
  return $sorted_menu_items;
}
}

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

/*-------------------------------------------------------------------------------
Save template part to variable
-------------------------------------------------------------------------------*/

function load_template_part($template_name, $part_name=null) {
  ob_start();
  get_template_part($template_name, $part_name);
  $var = ob_get_contents();
  ob_end_clean();
  return $var;
}

/*-------------------------------------------------------------------------------
Add logo to footer nav
-------------------------------------------------------------------------------*/

// Footer
add_filter( 'wp_nav_menu_items', 'footer_logo', 10, 2 );

function footer_logo( $items, $args ) {
  if ($args->theme_location == 'footer') {
    $logo = load_template_part('template-parts/global/logo', 'main');

    $items .= '<li class="menu-item menu-item--logo">';

    $items .= '<a class="nav-footer__logo" href="' . esc_url( home_url( '/' ) ) . '" title="' . get_bloginfo('name') . '">' . $logo . '</a>';

    $items .= '</li>';
  }
  return $items;
}

/*-------------------------------------------------------------------------------
	Add wrapper around header menu UL
-------------------------------------------------------------------------------*/

class submenuWrap extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<div class='nav-header__submenu'><ul class='sub-menu'>\n";
  }
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }
}

/*-------------------------------------------------------------------------------
	Remove P tags from Contact Form 7
-------------------------------------------------------------------------------*/

add_filter('wpcf7_autop_or_not', '__return_false');

/*-------------------------------------------------------------------------------
	Pagination Bar
-------------------------------------------------------------------------------*/

function pagination_bar() {
  global $wp_query;

  $total_pages = $wp_query->max_num_pages;

  if ($total_pages > 1){
    $current_page = max(1, get_query_var('paged'));

		echo '<div class="pagination__bar">';
			echo '<div class="pagination__nav">';

        global $template;
        // structure of "format" depends on whether we're using pretty permalinks
        basename( $template ) === 'search.php' ? $format = '&paged=%#%' : $format = 'page/%#%/';

  		  echo paginate_links(array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => $format,
          'current' => $current_page,
          'total' => $total_pages,
          'prev_next' => True,
          'prev_text' => __('<div class="pagination__number">&laquo;</div>'),
          'next_text' => __('<div class="pagination__number">&raquo;</div>'),
          'before_page_number' => '<div class="pagination__number">',
          'after_page_number' => '</div>'
  	    ));

			echo '</div>';
		echo '</div>';
  }
}

/*-------------------------------------------------------------------------------------------------
GET POST TYPE LABEL
------------------------------------------------------------------------------------------------- */

function get_post_type_label( $post_type_slug ) {
  $post_type = get_post_type_object( $post_type_slug );

  $post_type_singular_name = $post_type->labels->singular_name;

  return $post_type_singular_name == 'Post' ?
    __( 'News', 'wcmc' ) :
    $post_type_singular_name;
}

/*-------------------------------------------------------------------------------------------------
IMPORT CUSTOMIZER SETTINGS
------------------------------------------------------------------------------------------------- */
function get_wpml_translations_json() {
  // global $sitepress;


  // return json_encode(
  //   array(
  //     'current_language' => $sitepress->get_current_language()
  //   )
  // );
  return json_encode(
    array_values(
      array_map(
        function ($item) {
          return $item;
          return array (
            'string_language' => $item['string_language'],
            'context' => $item['context'],
            'value' => addslashes($item['value'])
          );
        },
        icl_get_string_translations()
      )
    )
  );
}

/*-------------------------------------------------------------------------------------------------
TABLE MODAL BUTTON SHORTCODE
------------------------------------------------------------------------------------------------- */

function table_modal_trigger_shortcode_function() {
  return '<table-modal-trigger>';
}

add_shortcode('table_modal_trigger', 'table_modal_trigger_shortcode_function');

/*-------------------------------------------------------------------------------------------------
TABLE INDICATOR SHORTCODES
------------------------------------------------------------------------------------------------- */

function table_modal_indicator_shortcode_function( $atts = array() ) {
  // set up default parameters
  extract(shortcode_atts(array(
    'colour' => ''
  ), $atts));

  $currentColor = strtolower( esc_attr( remove_accents_from_string_function($atts['colour']) ) );

  $result = '<div class="table-modal__indicator table-modal__indicator--' . $currentColor . '">';

  $result .= '<span class="table-modal__indicator-icon">' . $currentColor . '</span>';

  $result .= '<span class="table-modal__indicator-text">' . get_theme_mod( 'table_indicator_text_' . $currentColor ) . '</span>';

  $result .= '</div>';

  return $result;
}
add_shortcode('table_modal_indicator', 'table_modal_indicator_shortcode_function');

/*-------------------------------------------------------------------------------------------------
DISABLE SORTING OF SHORTCODE COLUMN ON FILTERABLE TABLE
------------------------------------------------------------------------------------------------- */

add_filter( 'posts_table_column_sortable_shortcode', '__return_false' );

add_filter( 'posts_table_search_filter_label', function( $label ) {
    return 'Filter:';
} );

add_filter( 'posts_table_reset_label', function( $label ) {
    return "Clear";
} );

add_filter( 'posts_table_language_defaults', function( $defaults ) {
    $defaults['totalsPlural'] = 'results';
    $defaults['totalsSingle'] = 'result';
    return $defaults;
} );

/*-------------------------------------------------------------------------------------------------
REDIRECT ON CERTAIN CPT SINGLE TEMPLATES - WHEN NO FRONT END AVAILABLE
------------------------------------------------------------------------------------------------- */

add_action( 'template_redirect', 'post_single_redirect' );

function post_single_redirect() {
  if ( is_singular( 'convention' ) ) {
    wp_redirect( home_url(), 301 );
    exit;
  }
}

/*-------------------------------------------------------------------------------------------------
IMPORT CUSTOMIZER SETTINGS
------------------------------------------------------------------------------------------------- */
require_once( 'customizer-settings.php' );

/*-------------------------------------------------------------------------------------------------
Relevanssi Rest API Support
------------------------------------------------------------------------------------------------- */
require_once( 'relevanssi-rest-api-support.php' );

/*-------------------------------------------------------------------------------------------------
Custom Rest API Settings
------------------------------------------------------------------------------------------------- */
require_once( 'rest-api-settings.php' );
