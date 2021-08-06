<?php
  /*
    Latest Posts Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $section_title = block_value( 'section-title' );

  $post_type = block_value( 'post-type' );
  $post_type_class = 'listing-grid--' . $post_type;

  $link_url = $post_type == 'posts'
    ? get_post_type_archive_link( 'post' )
    : get_post_type_archive_link($post_type);

  $link_args = array(
    'text' => block_field( 'link-text', false ),
    'url' => $link_url
  );
?>

<div class="listing-grid <?php echo $post_type_class; ?>">
  <div class="listing-grid__inner">
    <div class="listing-grid__header">
      <h3 class="listing-grid__title"><?php echo $section_title; ?></h3>
      <?php if ($link_url !== '') : ?>
        <a href="<?php echo $link_args['url']; ?>" class="listing-grid__link">
          <?php echo $link_args['text']; ?>
          <?php get_template_part('template-parts/icons/icon', 'angle-right'); ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="listing-grid__body">

      <latest-posts
        post-type="<?php echo $post_type; ?>"
      />

    </div>
  </div>
</div>
