<?php
  /*
    Filterable Table Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
    Using Posts Table Pro plugin - https://barn2.com/wordpress-plugins/posts-table-pro/
  */

  // Variables
  $post_type = block_field( 'post-type', false );
  $columns = block_field( 'columns', false );
  $filters = block_field( 'filters', false );
  $widths = block_field( 'widths', false );
  $sort_by = block_field ( 'sort-by', false );
  $reverse_order = block_field ( 'reverse-order', false );
  $lazy_load = block_field( 'lazy-load', false );
  $hide_search = block_field( 'hide-search', false );
  $hide_reset = block_field( 'hide-reset', false );


  // Create the shortcode

  // Start of shortcode
  $table_shortcode = '[posts_table ';

  // Define post type
  $table_shortcode .= ' post_type="' . $post_type . '" ';

  // Define columns of table
  $table_shortcode .= 'columns="' . $columns . '"';

  // Define filters for table
  if ($filters) {
    $table_shortcode .= ' filters="' . $filters . '"';
  }

  // Define widths of columns visible
  if ($widths) {
    $table_shortcode .= ' widths="' . $widths . '"';
  }

  // Define how table is sorted
  if ($sort_by) {
    $table_shortcode .= ' sort_by="' . $sort_by . '"';
  }

  // Reverse order table is displayed in
  if ($reverse_order) {
    $table_shortcode .= ' sort_order="asc"';
  }

  // Hide the search bar
  if ($hide_search) {
    $table_shortcode .= ' search_box="false"';
  }

  // Hide the reset button
  if ($hide_reset) {
    $table_shortcode .= ' reset_button="false"';
  }

  // Lazy load each page of the table
  $table_shortcode .= ' lazy_load="true"';

  // Pull through all posts for table, with no max limit
  $table_shortcode .= ' post_limit="-1"';

  // Do not wrap text on columns
  $table_shortcode .= ' wrap="false"';

  // Open extra columns in modal
  $table_shortcode .= ' responsive_display="modal"';

  // Show modal trigger in own column at start of table
  $table_shortcode .= ' responsive_control="column"';

  // Remove links to the posts page
  $table_shortcode .= ' links="none"';

  // End of shortcode
  $table_shortcode .= ' ]';
?>

<div
  id="filterableTable"
  class="blk-Filterable-Table blk-Filterable-Table--<?php echo $post_type; ?>"
>
  <?php echo do_shortcode( $table_shortcode ); ?>
</div>
<?php /*
<table-modal
  post-type="<?php echo $post_type; ?>"
  restricted-columns="<?php echo strip_tags($restricted_columns); ?>"
><table-modal />
*/ ?>
