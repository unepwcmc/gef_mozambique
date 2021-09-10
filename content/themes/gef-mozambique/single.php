<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

<?php
	// Page Hero

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			/* Variables */
			$hero_title = get_field( 'hero_title' ) != '' ? get_field( 'hero_title' ) : get_the_title();
			set_query_var('hero-title', $hero_title);
			set_query_var('hero-text', get_field( 'hero_text' ));
			set_query_var('hero-background-colour', get_field( 'hero_background_colour' ));
			set_query_var('hero-background-image', get_post_thumbnail_id(get_the_id()));
			set_query_var('hero-opacity', get_field( 'hero_opacity' ));

			get_template_part( 'template-parts/components/heroes/hero', 'large' );

		endwhile; // End of the loop.
	endif;
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary layout-primary--restrained">
				<div class="layout-primary__body">
					<?php $fields = get_fields(); ?>
					<?php if( $fields ): ?>
				    <ul>
			        <?php foreach( $fields as $name => $value ): ?>
		            <li><strong><?php echo $name; ?></strong> <?php echo $value; ?></li>
			        <?php endforeach; ?>
				    </ul>
					<?php endif; ?>
					<?php
						/* Start the Loop */
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'single' );
							endwhile;
						endif; wp_reset_query(); // End of the loop.
					?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
