<?php
function archive_settings_customizer_settings($wp_customize) {
  // Add Archive Settings Section
  $wp_customize->add_section( 'archive_settings', array (
  'title' => 'Archive Settings',
  'description' => 'Settings for the archive/listing pages',
  'priority' => 100
  ) );

    // Public Consultations Intro Text
    $wp_customize->add_setting('public_consultations_intro_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'public_consultations_intro_text',
    array(
    'label' => 'Public Consultations Intro Text',
    'section' => 'archive_settings',
    'type' => 'textarea',
    'settings' => 'public_consultations_intro_text'
    ) ) );

    // International Conventions Intro Text
    $wp_customize->add_setting('international_conventions_intro_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'international_conventions_intro_text',
    array(
    'label' => 'International Conventions Intro Text',
    'section' => 'archive_settings',
    'type' => 'textarea',
    'settings' => 'international_conventions_intro_text'
    ) ) );

}
add_action('customize_register', 'archive_settings_customizer_settings');
