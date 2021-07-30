<?php
  /*
    Expandable Text Preview Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables

  $text = block_field( 'text', false );
  $toggle_text = block_field( 'toggle-text', false );
  $initial_height = block_field( 'initial-height', false );
  $expandable = block_field( 'expandable', false );
?>

<div
  class="block-expandable<?php if ($expandable) echo " block-expandable--active"; ?>"
>
  <div class="block-expandable__inner">
    <div class="block-expandable__body">
      <div class="block-expandable__content">
        <?php echo $text; ?>
      </div>
      <?php if ($expandable): ?>
        <button class="block-expandable__toggle">
          <?php echo $toggle_text; ?>
          <IconAngle class="block-expandable__toggle-icon" />
        </button>
      <?php endif; ?>
    </div>
  </div>
</div>
