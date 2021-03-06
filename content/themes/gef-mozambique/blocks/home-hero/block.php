<?php
  /*
    Home Hero Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables

  $title = block_field( 'title', false );
  $text = block_field( 'text', false );
  $dark_text = block_field( 'dark-text', false );

  $link_url = block_field( 'link-url', false );
  $link_url_external = block_field( 'link-url-external', false );
  $link_text = block_field( 'link-text', false );

  $background_colour = block_field( 'background-colour', false );
  $image = block_field( 'image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];

  $image_opacity = block_field( 'image-opacity', false );
?>

<div class="hero hero--large<?php if ($dark_text) echo ' hero--dark'; ?>">
  <div class="hero__inner">
    <div
      class="hero__body"
      <?php if ($background_colour) echo 'style="background-color: ' . $background_colour . ';"'; ?>
    >
      <div class="hero__content">
        <div class="hero__logo">
          <?php get_template_part( 'template-parts/global/logo', 'main' ); ?>
        </div>
        <?php if ($title): ?>
          <h2 class="hero__title">
            <?php echo $title; ?>
          </h2>
        <?php endif; ?>
        <?php if ($text): ?>
          <div class="hero__text">
            <?php echo $text; ?>
          </div>
        <?php endif; ?>

        <?php if ($link_url && $link_text): ?>
          <a
            href="<?php echo $link_url; ?>"
            class="hero__link<?php if ($link_url_external) echo ' hero__link--external'; ?>"
            title="<?php echo $link_text; ?>"
            <?php if ($link_url_external) echo ' target="_blank"'; ?>
          >
            <?php echo $link_text; ?>
            <?php if ($link_url_external) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
          </a>
        <?php endif; ?>
      </div>
      <?php if ($image_url): ?>
        <img
          src="<?php echo $image_url; ?>"
          alt="<?php echo $title; ?>"
          class="hero__background-image"
          style="opacity: <?php echo $image_opacity; ?>"
        >
      <?php endif; ?>
    </div>
  </div>
</div>
