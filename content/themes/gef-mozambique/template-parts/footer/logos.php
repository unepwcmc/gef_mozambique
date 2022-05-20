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
        <a
          href="https://www.thegef.org"
          target="_blank"
          title="GEF"
          class="footer-logos__link"
        >
          <img
            src="<?php echo get_stylesheet_directory_uri() . '/dist/img/GEF-logo.png'; ?>"
            alt="GEF logo"
            class="footer-logos__logo footer-logos__logo--gef"
          >
        </a>
      </li>
      <li class="footer-logos__item">
        <h6><?php _e( 'Liderado por:' ); ?></h6>
        <a
          href="https://www.unep.org"
          target="_blank"
          title="UN Environment Program"
          class="footer-logos__link"
        >
          <img
            src="<?php echo get_stylesheet_directory_uri() . '/dist/img/UN-Environment-logo.png'; ?>"
            alt="UN Environment Program logo"
            class="footer-logos__logo footer-logos__logo--un-environment"
          >
        </a>
      </li>
      <li class="footer-logos__item footer-logos__item--large">
        <h6><?php _e( 'Em parceria com:' ); ?></h6>
        <ul class="footer-logos__logo-items">
          <li class="footer-logos__logo-item">
            <a
              href="https://www.unep-wcmc.org"
              target="_blank"
              title="UN Environment Program - World Conservation Monitoring Centre"
              class="footer-logos__link"
            >
              <img
                src="<?php echo get_stylesheet_directory_uri() . '/dist/img/UNEP-WCMC-logo.png'; ?>"
                alt="UNEP-WCMC logo"
                class="footer-logos__logo footer-logos__logo--unep-wcmc"
              >
            </a>
          </li>
          <li class="footer-logos__logo-item">
            <a
              href="https://mozambique.wcs.org"
              target="_blank"
              title="Wildlife Conservation Society"
              class="footer-logos__link"
            >
              <img
                src="<?php echo get_stylesheet_directory_uri() . '/dist/img/WCS-logo.png'; ?>"
                alt="Wildlife Conservation Society logo"
                class="footer-logos__logo footer-logos__logo--wcs"
              >
            </a>
          </li>
          <li class="footer-logos__logo-item">
            <a
              href="http://combo-africa.org"
              target="_blank"
              title="The Conservation, Mitigation and Biodiversity Offsets (COMBO) Program"
              class="footer-logos__link"
            >
              <img
                src="<?php echo get_stylesheet_directory_uri() . '/dist/img/COMBO-logo.png'; ?>"
                alt="COMBO logo"
                class="footer-logos__logo footer-logos__logo--combo"
              >
            </a>
          </li>
          <li class="footer-logos__logo-item">
            <a
              href="https://www.usaid.gov"
              target="_blank"
              title="USAID"
              class="footer-logos__link"
            >
              <img
                src="<?php echo get_stylesheet_directory_uri() . '/dist/img/USAid-logo.png'; ?>"
                alt="USAID logo"
                class="footer-logos__logo footer-logos__logo--usaid"
              >
            </a>
          </li>
          <li class="footer-logos__logo-item">
            <a
              href="https://www.afd.fr"
              target="_blank"
              title="Agence Française de Développement"
              class="footer-logos__link"
            >
              <img
                src="<?php echo get_stylesheet_directory_uri() . '/dist/img/AFD-logo.png'; ?>"
                alt="Agence Française de Développement logo"
                class="footer-logos__logo footer-logos__logo--afd"
              >
            </a>
          </li>
          <li class="footer-logos__logo-item">
            <a
              href="https://www.ffem.fr"
              target="_blank"
              title="Fonds Français pour l'Environnement Mondial"
              class="footer-logos__link"
            >
              <img
                src="<?php echo get_stylesheet_directory_uri() . '/dist/img/FFEM-logo.png'; ?>"
                alt="Fonds Français pour l'Environnement Mondial logo"
                class="footer-logos__logo footer-logos__logo--ffem"
              >
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
