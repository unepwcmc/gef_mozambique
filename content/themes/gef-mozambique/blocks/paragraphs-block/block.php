<?php
  /*
    Paragraphs Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  $section_title = block_value( 'section-title' );
?>

<?php if ( block_rows( 'paragraph' ) ) : ?>

  <div class="block-paragraphs">
    <div class="block-paragraphs__header">
      <h3 class="block-paragraphs__title">
        <?php echo $section_title; ?>
      </h3>
    </div>

    <div class="block-paragraphs__body">

      <ul class="block-paragraphs__items">

        <?php while ( block_rows( 'paragraph' ) ) : block_row( 'paragraph' );?>

          <?php
            $heading = block_sub_value( 'heading' );
            $text = block_sub_value( 'text' );
            $link_url = block_sub_value( 'link-url' );
            $link_text = block_sub_value( 'link-text' );
            $external_link = block_sub_value( 'external-link' );
          ?>

          <li class="block-paragraphs__item">
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

            </div>
          </li>

        <?php endwhile; ?>

      </ul>
    </div>
  </div>

<?php endif;?>
