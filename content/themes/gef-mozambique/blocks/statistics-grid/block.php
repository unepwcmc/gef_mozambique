<?php
  /*
    Statistics Grid Block
    Created by UNEP-WCMC
    With Block Lab for Gutenberg - https://getblocklab.com/
  */
?>

<?php if ( block_rows( 'statistic' ) ) : ?>
  <div class="stats-grid">
    <div class="stats-grid__inner">
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
              <?php if ( block_sub_value( 'tooltip' ) ) : ?>
                <div class="stats-tile__tooltip">
                  <div class="stats-tile__tooltip-icon">
                    <?php get_template_part( 'template-parts/icons/icon', 'info' ); ?>
                  </div>
                  <div class="stats-tile__tooltip-body">
                    <span class="stats-tile__tooltip-text">
                      <?php echo block_sub_value( 'tooltip' ); ?>
                    </span>
                  </div>
                </div>
              <?php endif;?>
            </div>
          </li>
        <?php endwhile; ?>
        <?php reset_block_rows( 'statistic' );?>
      </ul>
    </div>
  </div>
<?php endif;?>
