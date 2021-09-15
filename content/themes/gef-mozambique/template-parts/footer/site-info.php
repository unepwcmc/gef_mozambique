<?php
/**
* Displays footer site info
**/
?>
<?php if ( get_theme_mod( 'enable_footer_tagline' ) ): ?>
  <p class="footer__text" ><em><?php echo get_theme_mod( 'footer_tagline' ); ?></em></p>
<?php endif; ?>

<p class="footer__text"><?php _e( 'Copyright Mozambique Biodiversity', 'wcmc' ); ?> <?php echo date("Y"); ?></p><!-- .site-info -->
