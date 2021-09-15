<?php
  /*
    Latest Posts Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $section_title = block_value( 'section-title' );

  $post_type = block_value( 'post-type' );

  $post_type_class = 'latest-posts--' . $post_type;

  $link_url = $post_type == 'posts'
    ? get_post_type_archive_link( 'post' )
    : get_post_type_archive_link($post_type);

  $link_args = array(
    'text' => block_field( 'link-text', false ),
    'url' => $link_url
  );
?>

<div class="latest-posts <?php echo $post_type_class; ?>">
  <div class="latest-posts__inner">
    <div class="latest-posts__header">
      <h3 class="latest-posts__title"><?php echo $section_title; ?></h3>
      <?php if ($link_url !== '') : ?>
        <a href="<?php echo $link_args['url']; ?>" class="latest-posts__link">
          <?php echo $link_args['text']; ?>
          <?php get_template_part('template-parts/icons/icon', 'angle-right'); ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="latest-posts__body">

      <latest-posts
        post-type="<?php echo $post_type; ?>"
      />

    </div>
  </div>
</div>
