<?php
include_once "partial.php";
include_once "email.php";
?>

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
    <div class="articles">
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
      <?php endwhile; ?>
    </div><?php
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
<?php get_footer(); ?>
