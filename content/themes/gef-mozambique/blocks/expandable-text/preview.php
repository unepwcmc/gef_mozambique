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
?>

<div
  class="block-expandable"
  :class="{ 'block-expandable--toggled': toggled }"
>
  <div class="block-expandable__inner">
    <div class="block-expandable__body">
      <div class="block-expandable__content">
        <?php echo $text; ?>
      </div>
      <button class="block-expandable__toggle">
        <?php echo $toggle_text; ?>
        <IconAngle class="block-expandable__toggle-icon" />
      </button>
    </div>
  </div>
</div>
