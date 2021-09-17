<?php
  /*
    Modal Tiles Block
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

      <?php if ( block_rows( 'modal-tiles' ) ) : ?>

        <div class="link-tiles__content">
          <ul class="link-tiles__items">

            <?php while ( block_rows( 'modal-tiles' ) ) : block_row( 'modal-tiles' );?>

              <?php
                $image = block_sub_value( 'image', false );
                $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
                $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);

                $title = block_sub_value( 'title', false );
                $text = block_sub_value( 'text', false );
                $button_text = block_sub_value( 'button-text', false );

                $modal_title = block_sub_value( 'modal-title', false );
                $modal_text = block_sub_value( 'modal-text', false );
                $modal_downloads = array(
                  array (
                    'title' => block_sub_value( 'download-title', false ),
                    'description' => block_sub_value( 'download-description', false ),
                    'file' => block_sub_value( 'download-url', false )
                  )
                );
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
                    <?php endif;?>

                    <?php if ( $text ) : ?>
                      <p class="link-tile__text">
                        <?php echo $text; ?>
                      </p>
                    <?php endif;?>

                    <?php if (!empty($modal_downloads)): ?>
                      <modal-downloads
                        title='<?php echo $modal_title; ?>'
                        text='<?php echo htmlentities($modal_text); ?>'
                        :downloads='<?php echo json_encode($modal_downloads); ?>'
                        custom-button="true"
                        trigger-text="<?php echo block_sub_value( 'button-text' ); ?>"
                      ></modal-downloads>
                    <?php endif; ?>
                  </div>
                </div>

              <?php endwhile;?>

            </li>
          </ul>
        </div>

      <?php endif;?>

    </div>
  </div>
</div>
