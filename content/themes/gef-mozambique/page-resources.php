<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php
	// Page Hero

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			/* Variables */
			set_query_var( 'hero-title', get_theme_mod( 'resources_hero_title' ) != ''
				? get_theme_mod( 'resources_hero_title' )
				: get_the_title() );
			set_query_var( 'hero-background-image', get_theme_mod( 'resources_hero_image' ) );
			set_query_var( 'hero-opacity', get_theme_mod( 'resources_hero_overlay_opacity' ) );

			get_template_part( 'template-parts/components/heroes/hero', 'large' );

		endwhile; // End of the loop.
	endif;
?>

<div class="layout-container">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content/content', 'page' );

							endwhile; // End of the loop.
						else :
								get_template_part( 'template-parts/content/content', 'none' );
						endif;
					?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
