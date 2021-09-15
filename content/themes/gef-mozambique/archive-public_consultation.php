<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */


	get_header();

	$post_type = get_queried_object()->name;
	$post_type_singular_name = 'public_consultation';

	// Page Hero
	set_query_var( 'hero-title', get_theme_mod( 'public_consultations_hero_title' ) != ''
		? get_theme_mod( 'public_consultations_hero_title' )
		: get_the_archive_title() );
	set_query_var( 'hero-text', get_theme_mod( 'public_consultations_hero_text' ) );
	$hero_link = get_theme_mod( 'public_consultations_hero_button_link' ) != 0
		? get_page_link( get_theme_mod( 'public_consultations_hero_button_link' ) )
		: '';
	set_query_var( 'hero-link-url', $hero_link );
	set_query_var( 'hero-link-text', get_theme_mod( 'public_consultations_hero_button_text' ) );
	set_query_var( 'hero-background-image', get_theme_mod( 'public_consultations_hero_image') );
	set_query_var( 'hero-opacity', get_theme_mod( 'public_consultations_hero_overlay_opacity' ) );

	get_template_part( 'template-parts/components/heroes/hero', 'large' );

	// Introduction for Public Consultations - Editable from WordPress Customizer settings
	$intro_text = get_theme_mod( 'public_consultations_intro_text' );
?>

<div class="layout-container layout-container--full-width">
	<div class="layout-container__inner">
		<div class="layout-container__body">
			<section class="layout-primary">
				<?php if ($intro_text) : ?>
					<div class="layout-primary__header">
						<div class="layout-primary__intro">
							<?php echo $intro_text; ?>
						</div>
					</div>
				<?php endif; ?>

				<div class="layout-primary__body layout-primary__body--archive">

					<listing-grid
						post-type="<?php echo $post_type; ?>"
						post-singular="<?php echo $post_type_singular_name; ?>"
					/>

				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer();
