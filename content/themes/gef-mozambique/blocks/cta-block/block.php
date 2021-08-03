<?php
  /*
    CTA Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $image = block_field( 'background-image', false );
  $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
  $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
?>

<div class="block-cta">
  <div class="block-cta__inner">
    <div class="block-cta__body">
      <div class="block-cta__content">

        <?php if ( block_rows( 'featured-links' ) ) : ?>

          <div class="block-cta__featured">
            <ul class="block-cta__featured-items">

              <?php while ( block_rows( 'featured-links' ) ) : block_row( 'featured-links' );?>

                <li class="block-cta__featured-item">
                  <div class="block-cta__featured-tile">

                    <?php if ( block_sub_value( 'title' ) ) : ?>
                      <h3 class="block-cta__title">
                        <?php block_sub_field( 'title' ); ?>
                      </h3>
                    <?php endif; ?>

                    <?php if ( block_sub_value( 'description' ) ) : ?>
                      <p class="block-cta__text">
                        <?php block_sub_field( 'description' ); ?>
                      </p>
                    <?php endif; ?>

                    <?php if ( block_sub_value( 'link-url' ) ) : ?>
                      <?php
                        $link_url = block_sub_value( 'link-url' );
                        $link_text = block_sub_value( 'link-text' );
                        $external_link = block_sub_value( 'external-link' );
                      ?>

                      <p
                        class="block-cta__link<?php if ($external_link) echo ' block-cta__link--external'; ?>"
                      >
                        <?php echo $link_text; ?>
                        <?php if ($external_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
                      </p>

                      <a
                        href="<?php echo $link_url; ?>"
                        <?php echo 'title="' . block_sub_value( 'link-text' ) . '"'; ?>
                        <?php if ($external_link) echo 'target="_blank"'; ?>
                        class="block-cta__fauxlink"
                      >
                        <?php echo $link_text; ?>
                      </a>
                    <?php endif; ?>

                  </div>
                </li>

              <?php endwhile; wp_reset_query(); ?>

            </ul>
          </div>
        <?php endif; ?>
      </div>
      <?php if ( block_rows( 'other-links' ) ) : ?>

        <aside class="block-cta__list">
          <h3 class="block-cta__list-title">
            <?php block_field('other-links-title'); ?>
          </h3>

          <ul class="block-cta__list-items">

            <?php while ( block_rows( 'other-links' ) ) : block_row( 'other-links' );?>

              <?php if ( block_sub_value( 'link-url' ) ) : ?>
                <?php
                  $link_url = block_sub_value( 'link-url' );
                  $link_text = block_sub_value( 'link-text' );
                  $external_link = block_sub_value( 'external-link' );
                ?>

                <li class="block-cta__list-item">
                  <a
                    href="<?php echo $link_url; ?>"
                    title="<?php echo $link_text; ?>"
                    <?php if ($external_link) echo 'target="_blank"'; ?>
                    class="block-cta__list-link<?php if ($external_link) echo ' block-cta__list-link--external'; ?>"
                  >
                    <?php echo $link_text; ?>
                    <?php if ($external_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
                  </a>
                </li>
              <?php endif; ?>

            <?php endwhile; wp_reset_query(); ?>

          </ul>
        </aside>

      <?php endif; ?>
      <img
        src="<?php echo $image_url; ?>"
        alt="<?php echo $image_alt; ?>"
        class="block-cta__background-image"
      >
    </div>
  </div>
</div>
