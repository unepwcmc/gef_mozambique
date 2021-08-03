<?php
  /*
    Statistics Grid Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
?>

<?php if ( block_rows( 'statistic' ) ) : ?>
  <div class="stats-grid">
    <ul class="stats-grid__items">
      <?php while ( block_rows( 'statistic' ) ) : block_row( 'statistic' );?>
        <li class="stats-grid__item">
          <div class="stats-tile">
            <?php if ( block_sub_value( 'figure' ) ) : ?>
              <h4 class="stats-tile__heading">
                <?php echo block_sub_value( 'figure' ); ?>
              </h4>
            <?php endif;?>
            <?php if ( block_sub_value( 'text' ) ) : ?>
              <h5 class="stats-tile__subheading">
                <?php echo block_sub_value( 'text' ); ?>
              </h5>
            <?php endif;?>
          </div>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif;?>