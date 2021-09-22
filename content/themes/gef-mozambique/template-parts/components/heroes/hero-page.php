<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );

  $text = get_query_var( 'hero-text' );

  $background_colour = get_query_var( 'hero-background-colour' ) ? get_query_var( 'hero-background-colour' ):  '#000000';
  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );

  $overlay_opacity = (get_query_var( 'hero-opacity' ) * 0.1);

  $table_page = get_query_var( 'table-page' );
  $database_last_updated = get_query_var( 'database-last-updated' );
?>

<div
  class="hero"
  style="background-color: <?php echo $background_colour; ?>"
>
  <div class="hero__inner">
    <div class="hero__body">
      <div class="hero__content">
        <?php if ($title != ''): ?>
          <h2 class="hero__title"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($text != ''): ?>
          <p class="hero__text"><?php echo $text; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if ($table_page) : ?>
    <div class="hero__summary">
      <?php if ($database_last_updated) : ?>
        <h4 class="hero__summary-heading">
          <?php _e( 'Database Last Updated:', 'wcmc' ); ?>
        </h4>
        <h5 class="hero__summary-date">
          <?php echo $database_last_updated; ?>
        </h5>
      <?php endif; ?>
      <table-jump-link
        id="filterableTable"
      />
    </div>
  <?php endif; ?>
  <img
    src="<?php echo $background_image_url; ?>"
    alt="<?php echo $title; ?>"
    <?php if ($overlay_opacity != 1) echo 'style="opacity: ' . $overlay_opacity . ';"'; ?>
    class="hero__background-image"
  >
</div>
