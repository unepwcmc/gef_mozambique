<?php
  /*
    Filterable Table Preview Block
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
?>

<div
  id="filterableTable"
  class="blk-Filterable-Table blk-Filterable-Table--<?php echo $post_type; ?>"
>
  <div class="blk-Filterable-Table_Header">
    <h2 class="blk-Filterable-Table_Title">
      Posts Table Pro
    </h2>
    <h3 class="blk-Filterable-Table_Subtitle">
      Filterable Table
    </h3>
  </div>
  <div class="blk-Filterable-Table_Body">
    <ul class="blk-Filterable-Table_List-Items">
      <!-- Post Type -->
      <?php if ($post_type) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Post Type:
          </h4>
          <?php echo $post_type; ?>
        </li>
      <?php endif; ?>

      <!-- Columns -->
      <?php if ($columns) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <?php $columnsStrings = explode(",", strip_tags($columns)); ?>
          <h4 class="blk-Filterable-Table_Heading">
            Columns:
          </h4>
          <ul class="blk-Filterable-Table_SubList-Items">
            <?php foreach ($columnsStrings as &$value) {
              echo '<li class="blk-Filterable-Table_SubList-Item">' . $value  . '</li>';
            } ?>
          </ul>
        </li>
      <?php endif; ?>

      <!-- Filters -->
      <?php if ($filters) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <?php $filtersStrings = explode(",", strip_tags($filters)); ?>
          <h4 class="blk-Filterable-Table_Heading">
            Filters:
          </h4>
          <ul class="blk-Filterable-Table_SubList-Items">
            <?php foreach ($filtersStrings as &$value) {
              // Remove 'tax:' from beginning of values
              $value = preg_replace('/^' . preg_quote('tax:', '/') . '/', '', $value);
              echo '<li class="blk-Filterable-Table_SubList-Item">' . $value  . '</li>';
            } ?>
          </ul>
        </li>
      <?php endif; ?>

      <!-- Widths -->
      <?php if ($widths) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Widths:
          </h4>
          <?php echo $widths; ?>
        </li>
      <?php endif; ?>

      <!-- Sort By -->
      <?php if ($sort_by) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Sort By:<h4 class="blk-Filterable-Table_Head
            ing">

              
          <?php echo $sort_by; ?>
        </li>
      <?php endif; ?>

      <!-- Reverse Order -->
      <?php if ($reverse_order) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Reverse Order:
          </h4>
          <?php echo $reverse_order ? 'true' : 'false'; ?>
        </li>
      <?php endif; ?>

      <!-- Lazy Load -->
      <?php if ($lazy_load) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Lazy Load:
          </h4>
          <?php echo $lazy_load ? 'true' : 'false'; ?>
        </li>
      <?php endif; ?>

      <!-- Hide Search -->
      <?php if ($hide_search) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Hide Search:
          </h4>
          <?php echo $hide_search ? 'true' : 'false'; ?>
        </li>
      <?php endif; ?>

      <!-- Hide Reset -->
      <?php if ($hide_reset) : ?>
        <li class="blk-Filterable-Table_List-Item">
          <h4 class="blk-Filterable-Table_Heading">
            Hide Reset Button:
          </h4>
          <?php echo $hide_reset ? 'true' : 'false'; ?>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</div>
