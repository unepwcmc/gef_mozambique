<?php
  /*
    Download Tiles Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
  // Variables
  $section_title = block_value( 'section-title' );
?>

<div class="link-tiles">
  <div class="link-tiles__inner">
    <?php if ($section_title): ?>
      <div class="link-tiles__header">
        <h3 class="link-tiles__title">
          <?php echo $section_title; ?>
        </h3>
      </div>
    <?php endif; ?>

    <div class="link-tiles__body">

      <?php if ( block_rows( 'download-tiles' ) ) : ?>

        <div class="link-tiles__content">
          <ul class="link-tiles__items">

            <?php while ( block_rows( 'download-tiles' ) ) : block_row( 'download-tiles' ); ?>

              <?php
                $image = block_sub_value( 'image', false );
                $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
                $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);

                $title = block_sub_value( 'title', false );
                $text = block_sub_value( 'text', false );
                $file_url = block_sub_value( 'file-url', false );
                $external_link = block_sub_value( 'external-link', false );
              ?>

              <li class="link-tiles__item">

                <div class="link-tile">
                  <div class="link-tile__header">
                    <div class="link-tile__image-wrap">
                      <img
                        class="link-tile__image"
                        src="<?php echo $image_url; ?>"
                        alt="<?php echo $image_alt; ?>"
                      >
                    </div>
                  </div>

                  <div class="link-tile__body">
                    <?php if ( $title ) : ?>
                      <h3 class="link-tile__title">
                        <?php echo $title; ?>
                      </h3>
                    <?php endif; ?>

                    <?php if ( $text ) : ?>
                      <p class="link-tile__text">
                        <?php echo $text; ?>
                      </p>
                    <?php endif; ?>

                    <?php if ( !empty( $file_url ) ): ?>
                      <a
                        href="<?php echo $file_url; ?>"
                        title="<?php echo $title; ?>"
                        <?php if( $external_link ) echo 'target="_blank"'; ?>
                        class="link-tile__button link-tile__button--download"
                        <?php if( !$external_link ) echo 'download'; ?>
                      >
                        <?php _e( 'Download', 'wcmc' ); ?>
                        <?php get_template_part( 'template-parts/icons/icon', 'download' ); ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>

              <?php endwhile; ?>
              <?php reset_block_rows( 'download-tiles' ); ?>

            </li>
          </ul>
        </div>

      <?php endif; ?>

    </div>
  </div>
</div>
