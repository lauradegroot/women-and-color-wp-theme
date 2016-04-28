<?php // ==== NAVIGATION ==== //

// Post navigation, a bare bones implementation
if ( !function_exists( 'womenandcolor_post_navigation' ) ) : function womenandcolor_post_navigation() {
  ?><nav class="nav-posts" role="navigation">
    <div class="nav-links">
    <?php if ( get_previous_posts_link() ) { ?>
    <?php } if ( get_next_posts_link() ) { ?>
      <div data-page="<?php
          $p = intval(get_query_var('paged'));
          $p = ($p === 0 || $p === 1) ? $p = 2 : $p = $p + 1;
          echo $p;
        ?>" class="nav-next next-page">
        <?php next_posts_link( __( 'Show More Speakers', 'womenandcolor' ) ); ?>
        <div class="loader"></div>
      </div>
    <?php } ?>
    </div>
  </nav><?php
} endif;
