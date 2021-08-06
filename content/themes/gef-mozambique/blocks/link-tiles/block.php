<?php
  /*
    Latest Posts Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
  // Variables
  $section_title = block_value( 'section-title' );

  $link_args = array(
    'text' => block_field( 'link-text', false ),
    'url' => block_field( 'link-url', false ),
  );
?>

<div class="link-tiles">
  <div class="link-tiles__inner">
    <?php if ($section_title): ?>
      <div class="link-tiles__header">
        <h3 class="link-tiles__title">
          <?php echo $section_title; ?>
        </h3>
        <?php if ($link_url !== '') : ?>
          <a href="<?php echo $link_args['url']; ?>" class="link-tiles__link">
            <?php echo $link_args['text']; ?>
            <?php get_template_part('template-parts/icons/icon', 'angle-right'); ?>
          </a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="link-tiles__body">

      <?php if ( block_rows( 'link-tiles' ) ) : ?>

        <div class="link-tiles__content">
          <ul class="link-tiles__items">

            <?php while ( block_rows( 'link-tiles' ) ) : block_row( 'link-tiles' );?>

              <?php
                $image = block_sub_value( 'image', false );
                $image_url = wp_get_attachment_image_src( $image, 'full-size' )[0];
                $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
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
                    <?php if ( block_sub_value( 'title' ) ) : ?>
                      <h3 class="link-tile__title">
                        <?php echo block_sub_value( 'title' ); ?>
                      </h3>
                    <?php endif;?>
                    <?php if ( block_sub_value( 'text' ) ) : ?>
                      <p class="link-tile__text">
                        <?php echo block_sub_value( 'text' ); ?>
                      </p>
                    <?php endif;?>

                    <?php if ( block_sub_value( 'link-url' ) ) : ?>
                      <p class="link-tile__button link-tile__button--external">
                        <?php echo block_sub_value( 'link-text' ); ?>
                        <?php get_template_part( 'template-parts/icons/icon', 'external' ); ?>
                      </p>
                      <a
                        href="<?php echo block_sub_value( 'link-url' ); ?>"
                        title="<?php echo block_sub_value( 'title' ); ?>"
                        target="_blank"
                        class="link-tile__fauxlink"
                      >
                        <?php echo block_sub_value( 'link-text' ); ?>
                      </a>
                    <?php endif;?>
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
