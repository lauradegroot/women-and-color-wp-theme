<?php get_header(); ?>
  <div id="content" class="site-content">
    <section id="primary" class="content-area">
      <main id="main" class="site-main">
      <?php if ( have_posts() ) {
        while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
            <div class="speaker-info">
              <div class="speaker-image">
                <?php
                $image = get_field('speaker_image');
                if( !empty($image) ): ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
              </div>
              <div class="speaker-items">
                <p class="speaker-name">
                  <?php echo get_post_meta($post->ID, 'first_name', true); ?>
                  <?php echo get_post_meta($post->ID, 'last_name', true); ?>
                </p>
                <p class="speaker-title">
                  <?php echo get_post_meta($post->ID, 'title', true); ?>
                </p>
                <p class="speaker-org">
                  <?php echo get_post_meta($post->ID, 'organization', true); ?>
                </p>
                <div class="speaker-tags">
                  <?php the_tags( '', ' '); ?>
                </div>
                <div class="speaker-contact">
                  <a href="<?php echo get_permalink(); ?>">Contact <?php echo get_post_meta($post->ID, 'first_name', true); ?></a>
                </div>
                <div class="speaker-twitter">
                  <a href="http://twitter.com/<?php echo get_post_meta($post->ID, 'twitter', true); ?>" target="_blank">@<?php echo get_post_meta($post->ID, 'twitter', true); ?></a>
                </div>
              </div>
            </div>
            <div class="speaker-contact-form">
              <h3 class="contact-title">Contact <?php echo get_post_meta($post->ID, 'first_name', true); ?></h3>
              <?php the_content(); ?>
            </div>
            <?php wp_link_pages(); ?>
          </article>
        <?php endwhile;
      } else { ?>
        <article id="post-0" class="post no-results not-found">
          <header class="entry-header">
            <h1><?php _e( 'Not found', 'womenandcolor' ); ?></h1>
          </header>
          <div class="entry-content">
            <p><?php _e( 'Sorry, but your request could not be completed.', 'womenandcolor' ); ?></p>
            <?php get_search_form(); ?>
          </div>
        </article>
      <?php } ?>
      </main>
      <?php womenandcolor_post_navigation(); ?>
    </section>
    </div>
<?php get_footer(); ?>
