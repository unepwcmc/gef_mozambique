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
  $expandable = block_field( 'expandable', false );
?>

<div class="block">
  <expandable-text
    content="<?php echo htmlentities($text); ?>"
    :expandable="<?php echo json_encode($expandable); ?>"
    toggle-text="<?php echo $toggle_text; ?>"
  />
</div>
