<h1 class="header__title"><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></h1>
<div class="header-logos">
  <ul class="header-logos__items">
    <li class="header-logos__item">
      <a class="header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo('name'); ?>">
        <span class="utility__screen-reader-only"><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></span>
        <?php get_template_part( 'template-parts/global/logo', 'main' ); ?>
      </a>
    </li>

    <li class="header-logos__item">
      <a
        href="https://www.mta.gov.mz"
        target="_blank"
        title="Ministério da Terra e Ambiente"
        class="header-logo"
      >
        <img
          src="<?php echo get_stylesheet_directory_uri() . '/dist/img/Mozambique-logo.png'; ?>"
          alt="Ministério da Terra e Ambiente logo"
          class="header-logo__logo header-logo__logo--mozambique"
        >
      </a>
    </li>
  </ul>
</div>
