<?php
$partial = $_GET["partial"];
if ($partial):
  if ( have_posts() ):
    while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
        <?php require($DOCUMENT_ROOT . "post.php");?>
        <?php if ( is_single() ) { ?>
          <?php require($DOCUMENT_ROOT . "contact-form.php");?>
        <?php } ?>
        <?php wp_link_pages(); ?>
      </article>
    <?php endwhile;
  endif;
  exit();
endif;
