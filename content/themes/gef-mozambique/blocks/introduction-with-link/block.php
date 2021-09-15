<?php
  /*
    Introduction Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  $text = block_value( 'text' );
  $link_text = block_value( 'link-text' );
  $link_url = block_value( 'link-url' );
  $external_link = block_value( 'external-link' );

  $featured_logo  = block_value( 'featured-logo' );
  $featured_logo_url = wp_get_attachment_image_src( $featured_logo, 'full-size' )[0];
  $featured_heading  = block_value( 'featured-heading' );
  $featured_description  = block_value( 'featured-description' );
  $featured_link_text  = block_value( 'featured-link-text' );
  $featured_link_url  = block_value( 'featured-link-url' );
  $featured_external_link  = block_value( 'featured-external-link' );

  $modal_text = get_field( 'modal_text' );
  $modal_downloads = get_field( 'modal_downloads' );
?>

<div class="block-introduction">
  <div class="block-introduction__inner">

    <div class="block-introduction__body">

      <div class="block-introduction__columns">

          <div class="block-introduction__column">
            <div class="block-introduction__content">

              <?php if ( $text ) : ?>
                <div class="block-introduction__text">
                  <?php echo $text; ?>
                </div>
              <?php endif;?>

              <?php if ($link_url && $link_text): ?>
                <a
                  href="<?php echo $link_url; ?>"
                  title="<?php echo $link_text; ?>"
                  <?php if ($external_link) echo ' target="_blank"'; ?>
                  class="block-introduction__link<?php if ($external_link) echo ' block-introduction__link--external'; ?>"
                >
                  <?php echo $link_text; ?>
                  <?php if ($external_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
                </a>
              <?php endif; ?>

              <?php if ($modal_downloads): ?>
                <modal-downloads
                  text='<?php echo htmlentities($modal_text); ?>'
                  :downloads='<?php echo json_encode($modal_downloads); ?>'
                ></modal-downloads>
              <?php endif; ?>

            </div>
          </div>

          <div class="block-introduction__column">
            <div class="block-introduction__featured-link">
              <?php if ( $featured_logo ) : ?>
                <img
                  src="<?php echo $featured_logo_url; ?>"
                  alt="<?php echo $featured_heading; ?>"
                  class="block-introduction__logo"
                />
              <?php endif;?>
              <?php if ( $featured_heading ) : ?>
                <h4 class="block-introduction__heading">
                  <?php echo $featured_heading; ?>
                </h4>
              <?php endif;?>

              <?php if ( $featured_description ) : ?>
                <p class="block-introduction__description">
                  <?php echo $featured_description; ?>
                </p>
              <?php endif;?>

              <?php if ($featured_link_url && $featured_link_text): ?>
                <a
                  href="<?php echo $featured_link_url; ?>"
                  title="<?php echo $featured_link_text; ?>"
                  <?php if ($featured_external_link) echo ' target="_blank"'; ?>
                  class="block-introduction__link block-introduction__link--text<?php if ($featured_external_link) echo ' block-introduction__link--external'; ?>"
                >
                  <?php echo $featured_link_text; ?>
                  <?php if ($featured_external_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
                </a>
              <?php endif; ?>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
