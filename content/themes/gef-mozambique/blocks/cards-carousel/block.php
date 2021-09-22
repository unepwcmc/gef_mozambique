<?php
  /*
    Card Carousel Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
?>

<div class="cards-carousel">
  <div class="cards-carousel__inner">
    <div class="cards-carousel__body">

      <?php if ( block_rows( 'carousel-cells' ) ) : ?>

        <flickity-carousel
          :flickity-options="{
            cellAlign: 'left',
            cellSelector: '.cards-carousel__cell',
            contain: true,
            autoPlay: 8000
          }"
          class="cards-carousel__cells"
        >

          <?php while ( block_rows( 'carousel-cells' ) ) : block_row( 'carousel-cells' ); ?>

            <?php
              $image = block_sub_value( 'image', false );
              $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
              $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
            ?>

            <div class="cards-carousel__cell">

              <div class="card-carousel">
                <div class="card-carousel__body">
                  <div class="card-carousel__content">
                    <?php if ( block_sub_value( 'title' ) ) : ?>
                      <h3 class="card-carousel__title">
                        <?php echo block_sub_value( 'title' ); ?>
                      </h3>
                    <?php endif; ?>
                    <?php if ( block_sub_value( 'text' ) ) : ?>
                      <p class="card-carousel__text">
                        <?php echo block_sub_value( 'text' ); ?>
                      </p>
                    <?php endif; ?>

                    <?php if ( block_sub_value( 'link-url' ) ) : ?>
                      <p class="card-carousel__button card-carousel__button--external">
                        <?php echo block_sub_value( 'link-text' ); ?>
                        <?php get_template_part( 'template-parts/icons/icon', 'angle-right' ); ?>
                      </p>
                    <?php endif; ?>
                  </div>
                  <img
                    class="card-carousel__background-image"
                    src="<?php echo $image_url; ?>"
                    alt="<?php echo $image_alt; ?>"
                  >
                  <div class="card-carousel__overlay"></div>
                  <?php if ( block_sub_value( 'link-url' ) ) : ?>
                    <a
                      href="<?php echo block_sub_value( 'link-url' ); ?>"
                      title="<?php echo block_sub_value( 'title' ); ?>"
                      target="_blank"
                      class="card-carousel__fauxlink"
                      >
                      <?php echo block_sub_value( 'link-text' ); ?>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
          <?php reset_block_rows( 'carousel-cells' ); ?>

        </flickity-carousel>

      <?php endif; ?>

    </div>
  </div>
</div>
