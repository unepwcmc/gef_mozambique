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
  $lazy_load = block_field( 'lazy-load', false );
  $hide_search = block_field( 'hide-search', false );
  $hide_reset = block_field( 'hide-reset', false );

  $table_shortcode = '[posts_table post_type="' . $post_type . '" ';

  $table_shortcode .= 'columns="' . $columns . '"';

  if ($filters) {
    $table_shortcode .= ' filters="' . $filters . '"';
  }

  if ($widths) {
    $table_shortcode .= ' widths="' . $widths . '"';
  }

  if ($lazy_load) {
    $table_shortcode .= ' lazy_load';
  }

  if ($hide_search) {
    $table_shortcode .= ' search_box="false"';
  }

  if ($hide_reset) {
    $table_shortcode .= ' reset_button="false"';
  }

  $table_shortcode .= ']';


  // [posts_table columns="cf:text,cf:compliance_percentage:% of fulfillment by evaluating the respective indicators,cf:progress_ranking,cf:shortcode:blank" filters="tax:nbsap_goals_compliance_percent,tax:nbsap_goals_progress_ranking,tax:nbsap_goals_date_evaluation" lazy_load]
?>

<?php echo do_shortcode( $table_shortcode ); ?>

<table-modal post-type="<?php echo $post_type; ?>"><table-modal />
