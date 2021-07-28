<?php
  /*
    Expandable Text Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */

  // Variables

  $text = block_field( 'text', false );
  $toggle_text = block_field( 'toggle-text', false );
  $initial_height = block_field( 'initial-height', false );
?>

<div class="block">
  <expandable-text
    content="<?php echo htmlentities($text); ?>"
    toggle-text="<?php echo $toggle_text; ?>"
  />
</div>
