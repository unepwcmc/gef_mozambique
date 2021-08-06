<?php
  $thumbnail_url = get_the_post_thumbnail_url() != ''
    ? get_the_post_thumbnail_url()
    : get_stylesheet_directory_uri() . '/inc/img/card-placeholder.jpg';
?>

<article id="post-<?php the_ID(); ?>" class="listing-card__card">
	<header class="listing-card__header">
    <div class="listing-card__image-wrap">
      <img
        src="<?php echo $thumbnail_url; ?>"
        alt="<?php the_title(); ?>"
        class="listing-card__image"
      />
    </div>
	</header>
	<div class="listing-card__body">
		<div class="listing-card__content">
      <p class="listing-card__details"><?php the_time( 'd/m/y' ); ?></p>
      <h3 class="listing-card__title"><?php the_title(); ?></h3>
		</div>
	</div>
  <a class="listing-card__fauxlink" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
</article><!-- #post-## -->
