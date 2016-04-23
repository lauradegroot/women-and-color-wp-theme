<div class="speaker-contact-form">
  <h3 class="contact-title">Contact <?php echo get_post_meta($post->ID, 'first_name', true); ?></h3>
  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' id="contact-speaker">
    <input type="hidden" name="id" value="<?php echo $post->ID ?>" />
    <p class="input-group">Your info</p>
    <input type='text' name='name' placeholder="Name" class="inline-input"/>
    <input type='text' name='email' placeholder="Email" class="inline-input"/>
    <p class="input-group">Event info</p>
    <input type='text' name='organization' placeholder="Organization" />
    <input type='text' name='location' placeholder="Location" />
    <input type='text' name='date' placeholder="Date" class="inline-input" id="datepicker"/>
    <input type='text' name='time' placeholder="Time" class="inline-input"/>
    <textarea name="info" form="contact-speaker" placeholder="Additional info"></textarea>
    <input type='submit' value='Send Message' class="send-input"/>
  </form>
</div>
