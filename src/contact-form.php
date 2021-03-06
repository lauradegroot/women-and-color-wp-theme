<div class="speaker-contact-form">
  <h3 class="contact-title">Contact <?php echo get_post_meta($post->ID, 'first_name', true); ?></h3>
  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' id="contact-speaker">
    <input type="hidden" name="id" value="<?php echo $post->ID ?>" />
    <p class="input-group">Your info</p>
    <input type='text' name='name' placeholder="Name" required class="inline-input"/>
    <input type='text' name='email' placeholder="Email" required class="inline-input"/>
    <p class="input-group">Event info</p>
    <input type='text' name='organization' required placeholder="Organization" />
    <input type='text' name='location' placeholder="Location" />
    <input type='text' name='date' placeholder="Date" class="inline-input" id="datepicker"/>
    <input type='text' name='time' placeholder="Time" class="inline-input time-input"/>
    <textarea name="info" form="contact-speaker" placeholder="Additional info"></textarea>
    <input type='submit' value='Send Message' class="send-input"/>
  </form>
  <div id="ajax-email-message"></div>
</div>
