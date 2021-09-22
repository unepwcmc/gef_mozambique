<?php
/**
* Displays mobile navigation
**/
?>

<!-- navigation  -->
<menu-mobile>
	<nav class="nav-mobile" aria-hidden="true">
		<?php wp_nav_menu( array(
	    'theme_location' => 'mobile'
	  ) ); ?>
	</nav>
</menu-mobile>
