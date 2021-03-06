<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="EN" dir="ltr" class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?><?php echo get_bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php
    wp_head();
    global $post;
    $body_base_class = is_single( $post ) ? 'single' : 'page';

    $body_class = $body_base_class;

    if ($post) {
      $body_class .= ' ' . $body_base_class . '-' . $post->post_name;

      if (is_page_template( 'page-no-hero.php' )) {
        $body_class .= ' no-hero';
      }
    }
    if ( get_theme_mod( 'enable_language_switcher' ) === true ) {
      $body_class .= ' language-switcher';
    }
  ?>
</head>

<body <?php body_class($body_class); ?>>
  <div id="v-app">
    <!-- Drawers -->
    <?php get_template_part( 'template-parts/drawers/drawers' ); ?>

    <!-- Header -->
    <main-header>
      <?php if ( get_theme_mod( 'enable_language_switcher' ) === true ) : ?>
        <div class="layout-topbar">
          <div class="layout-topbar__inner">
            <div class="layout-topbar__body">
              <?php do_action( 'wpml_add_language_selector' ); ?>
            </div>
          </div>
        </div>
      <?php endif; ?>


      <header class="header">
        <div class="header__top">
          <div class="header__inner">
            <div class="header__items">
              <div class="header__item header__item--logo">
                <!-- Site Name & Logo  -->
                <?php get_template_part( 'template-parts/header/logo' ); ?>
              </div>
              <div class="header__item header__item--tools">
                <!-- Header Tools -->
                <?php get_template_part( 'template-parts/header/tools' ); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="header__bottom">
          <div class="header__inner">
            <!-- Main (primary) Navigation -->
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
              <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            <?php endif; ?>
          </div>
        </div>
      </header>

    </main-header>

    <main class="layout-main" role="main">
