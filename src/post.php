<div class="speaker-info">
  <div class="speaker-image">
    <?php
    $image = get_field('speaker_image');
    if( !empty($image) ): ?>
      <img src="<?php echo $image['url']; ?>" alt="Photo of <?php echo get_post_meta($post->ID, 'first_name', true); ?>" />
    <?php endif; ?>
  </div>
  <div class="speaker-items">
    <a href="<?php echo get_permalink(); ?>">
      <p class="speaker-name">
        <?php echo get_post_meta($post->ID, 'first_name', true); ?>
        <?php echo get_post_meta($post->ID, 'last_name', true); ?>
      </p>
    </a>
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
      <?php
      $twitter = get_post_meta($post->ID, 'twitter', true);
      if( !empty($twitter) ): ?>
        <a href="http://twitter.com/<?php echo get_post_meta($post->ID, 'twitter', true); ?>" target="_blank">@<?php echo get_post_meta($post->ID, 'twitter', true); ?></a>
      <?php endif; ?>
    </div>
  </div>
</div>
