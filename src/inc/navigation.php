<?php // ==== NAVIGATION ==== //

// Post navigation, a bare bones implementation
if ( !function_exists( 'womenandcolor_post_navigation' ) ) : function womenandcolor_post_navigation() {
  ?><nav class="nav-posts" role="navigation">
    <div class="nav-links">
    <?php if ( get_previous_posts_link() ) { ?>
      <div class="nav-previous prev-page">
        <?php previous_posts_link( __( '<span class="nav-arrow">&larr; </span>Previous', 'womenandcolor' ) ); ?>
      </div>
    <?php } if ( get_next_posts_link() ) { ?>
      <div class="nav-next next-page">
        <?php next_posts_link( __( 'Next<span class="nav-arrow"> &rarr;</span>', 'womenandcolor' ) ); ?>
      </div>
    <?php } ?>
    </div>
  </nav><?php
} endif;
