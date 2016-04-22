<?php include_once "email.php"; ?>

<?php get_header(); ?>
<div id="content" class="site-content">
  <section id="primary" class="content-area">
    <main id="main" class="site-main">
    <p class="current-tag-page">
    <?php
      $tag_title = single_tag_title("", false);
      if ($tag_title) {
        echo $tag_title;
      } else {
        echo 'All Topics';
      }
    ?></p>
    <?php if ( have_posts() ) {
      // display posts (all or single)
      while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
          <?php require($DOCUMENT_ROOT . "post.php");?>
          <?php if ( is_single() ) { ?>
            <!-- if we're on an individual speaker page, show the contact form -->
            <?php require($DOCUMENT_ROOT . "contact-form.php");?>
          <?php } ?>
          <?php wp_link_pages(); ?>
        </article>
      <?php endwhile;
    } else { ?>
      <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
          <h1><?php _e( 'Page not found', 'womenandcolor' ); ?></h1>
        </header>
        <div class="entry-content">
          <p><?php _e( 'Please select a topic from the menu to find speakers.', 'womenandcolor' ); ?></p>
        </div>
      </article>
    <?php } ?>
    </main>
  <?php womenandcolor_post_navigation(); ?>
  </section>
</div>
<script>
;(function($) {
  $('.send-input').on('click', function(event) {
    event.preventDefault();
    var form = $('#contact-speaker');
    if (form.length) {
      $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize(),
        success: function(data) {
          var res = data.responseText;
          if (res === 'bail') {
            console.log('Please fill out the required fields!');
          } else if (res === '1') {
            console.log('Success!');
          } else {
            console.log('error!');
          }
        }
      });
    }
  });
}(jQuery));
</script>
<?php get_footer(); ?>
