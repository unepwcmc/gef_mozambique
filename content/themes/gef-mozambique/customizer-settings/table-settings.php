<?php
function table_customizer_settings($wp_customize) {
  // Add Table Settings Section
  $wp_customize->add_section( 'table_settings', array (
  'title' => 'Table Settings',
  'description' => 'Settings for the filterable tables',
  'priority' => 100
  ) );

    // Table Progress Indicator Text - Amber
    $wp_customize->add_setting('table_indicator_text_ambar');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'table_indicator_text_ambar',
    array(
    'label' => 'Table Progress Indicator Text - Âmbar',
    'section' => 'table_settings',
    'type' => 'textarea',
    'settings' => 'table_indicator_text_ambar'
    ) ) );

    // Table Progress Indicator Text - Red
    $wp_customize->add_setting('table_indicator_text_vermelho');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'table_indicator_text_vermelho',
    array(
    'label' => 'Table Progress Indicator Text - Vermelho',
    'section' => 'table_settings',
    'type' => 'textarea',
    'settings' => 'table_indicator_text_vermelho'
    ) ) );

}
add_action('customize_register', 'table_customizer_settings');
