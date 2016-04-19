<?php

// send emails pls
if($_POST):
  print_r($_POST);
  $to      = 'laurardegroot@gmail.com';
  $subject = 'test';
  $message = 'hello';
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $email = mail($to, $subject, $message, $headers);
  print_r($email);
  print_r(eroor_get_last());
  exit();
endif;

?>

<?php get_header(); ?>
<div id="content" class="site-content">
  <section id="primary" class="content-area">
    <main id="main" class="site-main">
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
<?php get_footer(); ?>
