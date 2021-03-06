<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


	get_header();

	$post_type = get_queried_object()->name;
	$post_type_singular_name = strtolower(get_queried_object()->labels->singular_name);

	// Page Hero
	set_query_var( 'hero-title', get_theme_mod( 'multimedia_hero_title' ) != ''
		? get_theme_mod( 'multimedia_hero_title' )
		: get_the_archive_title() );

	set_query_var( 'hero-background-image', get_theme_mod( 'multimedia_hero_image') );
	set_query_var( 'hero-opacity', get_theme_mod( 'multimedia_hero_overlay_opacity' ) );

	get_template_part( 'template-parts/components/heroes/hero', 'simple' );

?>

<div class="layout-container layout-container--full-width">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<div class="layout-primary__body layout-primary__body--archive">

					<listing-grid
						post-type="<?php echo $post_type; ?>"
						post-singular="<?php echo $post_type_singular_name; ?>"
						:modal="true"
					/>

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
