<?php
  /*
    Paragraph Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  $heading = block_value( 'heading' );
  $text = block_value( 'text' );
  $link_text = block_value( 'link-text' );
  $link_url = block_value( 'link-url' );
  $external_link = block_value( 'external-link' );

  $modal_title = block_value( 'modal-title' );
  $modal_text = block_value( 'modal-text' );
  $modal_downloads = block_value( 'modal-downloads' );
?>

<div class="block-paragraph">
  <?php if ( $heading ) : ?>
    <h4 class="block-paragraph__heading">
      <?php echo $heading; ?>
    </h4>
  <?php endif;?>

  <?php if ( $text ) : ?>
    <div class="block-paragraph__text">
      <?php echo $text; ?>
    </div>
  <?php endif;?>

  <?php if ($link_url && $link_text): ?>
    <a
      href="<?php echo $link_url; ?>"
      title="<?php echo $link_text; ?>"
      <?php if ($external_link) echo ' target="_blank"'; ?>
      class="block-paragraph__link<?php if ($external_link) echo ' block-paragraph__link--external'; ?>"
    >
      <?php echo $link_text; ?>
      <?php if ($external_link) get_template_part( 'template-parts/icons/icon', 'external' ); ?>
    </a>
  <?php endif; ?>

  <?php if ( $modal_downloads ): ?>
    <div>
      <button class="block-paragraph__trigger">
        <?php _e( 'Documentos Relacionados', 'wcmc' ); ?>
      </button>
    </div>
  <?php endif; ?>

</div>
