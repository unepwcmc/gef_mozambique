<?php
/**
 * Customiser Settings
 *
 * @link https://developer.wordpress.org/themes/customize-api/
 *
 */

/*-------------------------------------------------------------------------------
	Remove Unnecessary Settings
-------------------------------------------------------------------------------*/

function remove_customizer_settings() {
  global $wp_customize;

  $wp_customize->remove_panel( 'themes' ); // Theme change settings
  $wp_customize->get_panel( 'nav_menus' )->active_callback = '__return_false'; // Navigation Menus
  $wp_customize->remove_panel( 'widgets' ); // Widgets
  $wp_customize->remove_section( 'static_front_page' ); // Homepage Settings
  $wp_customize->remove_section( 'custom_css' ); // Additional CSS
  $wp_customize->add_panel( 'hero_settings',
    array(
      'title' => __( 'Hero Settings' ),
      'description' => esc_html__( 'Adjust your Hero settings.' ),
      'priority' => 100,
      'capability' => 'edit_theme_options'
    )
  );
}

add_action( 'customize_register', 'remove_customizer_settings', 11 );

/*-------------------------------------------------------------------------------
  Language Switcher Customiser Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/language-switcher.php' );

/*-------------------------------------------------------------------------------
  Header Button Customiser Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/header-button.php' );

/*-------------------------------------------------------------------------------
	Social Media Links
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/social-media-links.php' );

/*-------------------------------------------------------------------------------
  Default Hero Customiser Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/heroes.php' );

/*-------------------------------------------------------------------------------
  Archive Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/archive-settings.php' );

/*-------------------------------------------------------------------------------
  Table Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/table-settings.php' );

/*-------------------------------------------------------------------------------
  CTA Block Customiser Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/cta-block.php' );

/*-------------------------------------------------------------------------------
  Footer Customiser Settings
-------------------------------------------------------------------------------*/

require_once( 'customizer-settings/footer.php' );
