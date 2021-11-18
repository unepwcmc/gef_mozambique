<?php
/**
* Displays partner logos in footer
**/
?>

<div class="footer-logos">
  <div class="footer-logos__inner">
    <ul class="footer-logos__items">
      <li class="footer-logos__item">
        <h6><?php _e( 'Apoiado por:' ); ?></h6>
        <img
          src="<?php echo get_stylesheet_directory_uri() . '/dist/img/GEF-logo.png'; ?>"
          alt="GEF logo"
          class="footer-logos__logo footer-logos__logo--gef"
        >
      </li>
      <li class="footer-logos__item">
        <h6><?php _e( 'Liderado por:' ); ?></h6>
        <img
          src="<?php echo get_stylesheet_directory_uri() . '/dist/img/UN-Environment-logo.png'; ?>"
          alt="UN Environment Program logo"
          class="footer-logos__logo footer-logos__logo--un-environment"
        >
      </li>
      <li class="footer-logos__item footer-logos__item--large">
        <h6><?php _e( 'Em parceria com:' ); ?></h6>
        <ul class="footer-logos__logo-items">
          <li class="footer-logos__logo-item">
            <img
              src="<?php echo get_stylesheet_directory_uri() . '/dist/img/Mozambique-logo.png'; ?>"
              alt="Mozambique logo"
              class="footer-logos__logo footer-logos__logo--mozambique"
            >
          </li>
          <li class="footer-logos__logo-item">
            <img
              src="<?php echo get_stylesheet_directory_uri() . '/dist/img/WCS-logo.png'; ?>"
              alt="WCS logo"
              class="footer-logos__logo footer-logos__logo--wcs"
            >
          </li>
          <li class="footer-logos__logo-item">
            <img
              src="<?php echo get_stylesheet_directory_uri() . '/dist/img/COMBO-logo.png'; ?>"
              alt="COMBO logo"
              class="footer-logos__logo footer-logos__logo--combo"
            >
          </li>
          <li class="footer-logos__logo-item">
            <img
              src="<?php echo get_stylesheet_directory_uri() . '/dist/img/USAid-logo.png'; ?>"
              alt="USAid logo"
              class="footer-logos__logo footer-logos__logo--usaid"
            >
          </li>
          <li class="footer-logos__logo-item">
            <img
              src="<?php echo get_stylesheet_directory_uri() . '/dist/img/UNEP-WCMC-logo.png'; ?>"
              alt="UNEP-WCMC logo"
              class="footer-logos__logo footer-logos__logo--unep-wcmc"
            >
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
