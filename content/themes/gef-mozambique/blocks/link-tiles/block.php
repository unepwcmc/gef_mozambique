<?php
  /*
    Latest Posts Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
?>

<div class="listing-grid">
  <div class="listing-grid__inner">
    <div class="listing-grid__header">
      <h3 class="listing-grid__title"><?php _e( 'Latest' ) ?> <?php echo $post_label; ?></h3>
      <?php if ($link_url !== '') : ?>
        <a href="<?php echo $link_args['url']; ?>" class="listing-grid__link">
          <?php echo $link_args['text']; ?>
          <?php get_template_part('template-parts/icons/icon', 'angle-right'); ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="listing-grid__body">

      <div class="listing-grid__content">
        <ul class="listing-grid__items">
          <li class="listing-grid__item">

            <ListingCard
              :id="index"
              :config="post"
              :modal="modal"
              :post-type="postType"
            />

          </li>
        </ul>
      </div>

    </div>
  </div>
</div>
