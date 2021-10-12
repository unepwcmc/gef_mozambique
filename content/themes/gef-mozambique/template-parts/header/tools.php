<div class="header-tools">
  <div class="header-tools__items">
    <?php if ( get_theme_mod( 'enable_language_switcher' ) ) : ?>
      <div class="header-tools__item header-tools__item--language-switcher">
        <?php do_action( 'wpml_add_language_selector' ); ?>
      </div>
    <?php endif; ?>

    <div class="header-tools__item header-tools__item--menu-toggle">
      <drawer-trigger
        class="header-tools__nav-toggle"
        controls="navigation"
        drawer="menu"
        label="<?php _e( 'Menu Toggle', 'wcmc' ); ?>"
      >
        <?php _e( 'Menu', 'wcmc' ); ?>
        <?php get_template_part( 'template-parts/icons/icon', 'menu' ); ?>
      </drawer-trigger>
    </div>
  </div>
</div>
