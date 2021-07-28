<?php
  /* Variables */
  $title = get_query_var( 'hero-title' );

  $text = get_query_var( 'hero-text' );

  $background_colour = get_query_var( 'hero-background-colour' );
  $background_image = get_query_var( 'hero-background-image' );
  $background_image_url = $background_image != '' ? wp_get_attachment_image_src( $background_image, 'full-size' )[0] : get_theme_mod( 'default_hero_image' );

  $overlay_opacity = (get_query_var( 'hero-opacity' ) * 0.1);
?>

<div class="hero hero--large">
  <div class="hero__inner">
    <div
      style="background-color: <?php echo $background_colour; ?>"
      class="hero__body"
    >
      <img
        src="<?php echo $background_image_url; ?>"
        alt="<?php echo $title; ?>"
        <?php if ($overlay_opacity != 1) echo 'style="opacity: ' . $overlay_opacity . ';"'; ?>
        class="hero__background-image"
      >
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
</div>
