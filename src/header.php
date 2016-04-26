<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Women&amp;Color</title>
<meta name="description" content="Find talented women and people of color to speak at your tech-related event in Toronto" />

<meta property="og:title" content="Women and Color"/>
<meta property="og:url" content="http://womenandcolor.com"/>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg"/>
<meta property="og:description" content="Find talented women and people of color to speak at your tech-related event in Toronto"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="@womenandcolor"/>
<meta name="twitter:creator" content="@heymosef"/>
<meta name="twitter:title" content="Women and Color"/>
<meta name="twitter:description" content="Find talented women and people of color to speak at your tech-related event in Toronto"/>
<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg"/>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<?php wp_head(); ?>
</head>
<?php if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>
<body <?php body_class($page_slug); ?>>
  <div class="nav-icon">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="mobile-menu-tags">
    <div class="mobile-menu-tags-wrap tags-wrap">
      <p class="filter">Filter by topic</p>
      <p class="tag-all">
        <a href="#">All</a>
      </p>
      <?php $tags = get_tags();
      if ($tags) {
        foreach ($tags as $tag) {
        echo '<p class="tag-' . sprintf($tag->slug)  .'"><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> </p> ';
        }
      } ?>
    </div>
  </div>
  <div id="page" class="hfeed site">
    <div id="wrap-header" class="wrap-header">
      <header id="masthead" class="site-header">
        <div class="site-branding">
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
        <div class="main-category-menu">
          <div class="topics-wrap tags-wrap">
            <p class="tag-all"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">All Topics</a></p>
            <p class="tag-product-design"><a href="<?php echo esc_url( home_url( '/topic/product-design' ) ); ?>">Product Design</a></p>
            <p class="tag-web-development"><a href="<?php echo esc_url( home_url( '/topic/web-development' ) ); ?>">Web Development</a></p>
            <p class="tag-ios-development"><a href="<?php echo esc_url( home_url( '/topic/ios-development' ) ); ?>">iOS Development</a></p>
            <p class="tag-digital-marketing"><a href="<?php echo esc_url( home_url( '/topic/digital-marketing' ) ); ?>">Digital Marketing</a></p>
          </div>
          <div class="more closed">
            More
            <div class="triangle">
              <div class="empty"></div>
            </div>
          </div>
        </div>
        <div class="sub-category-menu speaker-tags">
          <div class="sub-category-menu-inner">
            <p class="filter">Filter by topic</p>
            <br/>
            <?php $tags = get_tags();
            if ($tags) {
              foreach ($tags as $tag) {
              echo '<p><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> </p> ';
              }
            } ?>
          </div>
        </div>
      </header>
    </div>
    <div id="wrap-main" class="wrap-main">
