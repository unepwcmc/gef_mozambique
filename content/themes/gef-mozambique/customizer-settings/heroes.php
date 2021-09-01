<?php

function hero_customizer_settings($wp_customize) {

  /*-------------------------------------------------------------------------------
  	Default
  -------------------------------------------------------------------------------*/

  // Add Default Hero Section
  $wp_customize->add_section( 'default_hero', array (
  'title' => 'Default Hero Settings',
  'panel' => 'hero_settings',
  'description' => 'For all heroes on the site with no custom configuration',
  'priority' => 100
  ) );

    // Default background image
    $wp_customize->add_setting('default_hero_image');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default_hero_image', array(
      'label' => 'Default Background Image',
      'section' => 'default_hero',
      'settings' => 'default_hero_image'
    ) ) );

    // Default text
    $wp_customize->add_setting('default_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'default_hero_text',
    array(
    'label' => 'Default Text',
    'type' => 'textarea',
    'section' => 'default_hero',
    'settings' => 'default_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Events
  -------------------------------------------------------------------------------*/

  // Add Events Hero Section
  $wp_customize->add_section( 'events_hero', array (
    'title' => 'Events Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Events listing page',
    'priority' => 100
  ) );

    // Events Hero Title
    $wp_customize->add_setting('events_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_title',
    array(
    'label' => 'Title',
    'section' => 'events_hero',
    'settings' => 'events_hero_title'
    ) ) );

    // Events Hero Background Image
    $wp_customize->add_setting('events_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'events_hero_image', array(
      'label' => 'Background Image',
      'section' => 'events_hero',
      'settings' => 'events_hero_image'
    ) ) );

    // Events Hero Hero Overlay Opacity
    $wp_customize->add_setting('events_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'events_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'events_hero',
      'settings' => 'events_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

  /*-------------------------------------------------------------------------------
    News
  -------------------------------------------------------------------------------*/

  // Add News Hero Section
  $wp_customize->add_section( 'news_hero', array (
    'title' => 'News Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the News listing page',
    'priority' => 100
  ) );

    // News Hero Title
    $wp_customize->add_setting('news_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_title',
    array(
    'label' => 'Title',
    'section' => 'news_hero',
    'settings' => 'news_hero_title'
    ) ) );

    // News Hero Background Image
    $wp_customize->add_setting('news_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'news_hero_image', array(
      'label' => 'Background Image',
      'section' => 'news_hero',
      'settings' => 'news_hero_image'
    ) ) );

    // News Hero Hero Overlay Opacity
    $wp_customize->add_setting('news_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'news_hero',
      'settings' => 'news_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

  /*-------------------------------------------------------------------------------
  	Multimedia
  -------------------------------------------------------------------------------*/

  // Add Multimedia Hero Section
  $wp_customize->add_section( 'multimedia_hero', array (
    'title' => 'Multimedia Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Multimedia listing page',
    'priority' => 100
  ) );

    // Multimedia Hero Title
    $wp_customize->add_setting('multimedia_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'multimedia_hero_title',
    array(
    'label' => 'Title',
    'section' => 'multimedia_hero',
    'settings' => 'multimedia_hero_title'
    ) ) );

    // Multimedia Hero Background Image
    $wp_customize->add_setting('multimedia_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'multimedia_hero_image', array(
      'label' => 'Background Image',
      'section' => 'multimedia_hero',
      'settings' => 'multimedia_hero_image'
    ) ) );

    // Multimedia Hero Hero Overlay Opacity
    $wp_customize->add_setting('multimedia_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'multimedia_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'multimedia_hero',
      'settings' => 'multimedia_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

  /*-------------------------------------------------------------------------------
  	International Conventions
  -------------------------------------------------------------------------------*/

  // Add International Conventions Hero Section
  $wp_customize->add_section( 'conventions_hero', array (
    'title' => 'Conventions Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Conventions listing page',
    'priority' => 100
  ) );

    // Conventions Hero Title
    $wp_customize->add_setting('conventions_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'conventions_hero_title',
    array(
    'label' => 'Title',
    'section' => 'conventions_hero',
    'settings' => 'conventions_hero_title'
    ) ) );

    // Conventions Hero Background Image
    $wp_customize->add_setting('conventions_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'conventions_hero_image', array(
      'label' => 'Background Image',
      'section' => 'conventions_hero',
      'settings' => 'conventions_hero_image'
    ) ) );

    // Conventions Hero Hero Overlay Opacity
    $wp_customize->add_setting('conventions_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'conventions_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'conventions_hero',
      'settings' => 'conventions_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // Conventions Hero Text
    $wp_customize->add_setting('conventions_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'conventions_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'conventions_hero',
    'settings' => 'conventions_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Reports
  -------------------------------------------------------------------------------*/

  // Add Reports Hero Section
  $wp_customize->add_section( 'reports_publications_hero', array (
    'title' => 'Reports Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Reports listing page',
    'priority' => 100
  ) );

    // Reports Hero Title
    $wp_customize->add_setting('reports_publications_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'reports_publications_hero_title',
    array(
    'label' => 'Title',
    'section' => 'reports_publications_hero',
    'settings' => 'reports_publications_hero_title'
    ) ) );

    // Reports Hero Background Image
    $wp_customize->add_setting('reports_publications_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'reports_publications_hero_image', array(
      'label' => 'Background Image',
      'section' => 'reports_publications_hero',
      'settings' => 'reports_publications_hero_image'
    ) ) );

    // Reports Hero Overlay Opacity
    $wp_customize->add_setting('reports_publications_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'reports_publications_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'reports_publications_hero',
      'settings' => 'reports_publications_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // Reports Hero Text
    $wp_customize->add_setting('reports_publications_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'reports_publications_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'reports_publications_hero',
    'settings' => 'reports_publications_hero_text'
    ) ) );

  /*-------------------------------------------------------------------------------
  	Online Courses
  -------------------------------------------------------------------------------*/

  // Add Online Courses Hero Section
  $wp_customize->add_section( 'online_courses_hero', array (
    'title' => 'Online Courses Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Online Courses listing page',
    'priority' => 100
  ) );

    // Online Courses Hero Title
    $wp_customize->add_setting('online_courses_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'online_courses_hero_title',
    array(
    'label' => 'Title',
    'section' => 'online_courses_hero',
    'settings' => 'online_courses_hero_title'
    ) ) );

    // Online Courses Hero Background Image
    $wp_customize->add_setting('online_courses_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'online_courses_hero_image', array(
      'label' => 'Background Image',
      'section' => 'online_courses_hero',
      'settings' => 'online_courses_hero_image'
    ) ) );

    // Online Courses Hero Overlay Opacity
    $wp_customize->add_setting('online_courses_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'online_courses_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'online_courses_hero',
      'settings' => 'online_courses_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

  /*-------------------------------------------------------------------------------
  	Public Consultations
  -------------------------------------------------------------------------------*/

  // Add Public Consultations Hero Section
  $wp_customize->add_section( 'public_consultations_hero', array (
    'title' => 'Public Consultations Page',
    'panel' => 'hero_settings',
    'description' => 'Settings for the hero on the Public Consultations listing page',
    'priority' => 100
  ) );

    // Public Consultations Hero Title
    $wp_customize->add_setting('public_consultations_hero_title');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'public_consultations_hero_title',
    array(
    'label' => 'Title',
    'section' => 'public_consultations_hero',
    'settings' => 'public_consultations_hero_title'
    ) ) );

    // Public Consultations Hero Background Image
    $wp_customize->add_setting('public_consultations_hero_image');
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'public_consultations_hero_image', array(
      'label' => 'Background Image',
      'section' => 'public_consultations_hero',
      'settings' => 'public_consultations_hero_image'
    ) ) );

    // Public Consultations Hero Overlay Opacity
    $wp_customize->add_setting('public_consultations_hero_overlay_opacity');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'public_consultations_hero_overlay_opacity',
    array(
      'label' => 'Overlay Opacity',
      'type' => 'range',
      'section' => 'public_consultations_hero',
      'settings' => 'public_consultations_hero_overlay_opacity',
      'input_attrs' => array(
        'min' => 0,
        'max' => 10,
        'step' => 1,
      )
    ) ) );

    // Public Consultations Hero Text
    $wp_customize->add_setting('public_consultations_hero_text');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'public_consultations_hero_text',
    array(
    'label' => 'Text',
    'type' => 'textarea',
    'section' => 'public_consultations_hero',
    'settings' => 'public_consultations_hero_text'
    ) ) );
}

add_action('customize_register', 'hero_customizer_settings');
