<?php

// send emails pls
if($_POST):
  if (empty($_POST["id"]) || empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["organization"])):
    print_r('bail');
    exit();
  endif;
  $to      = "womenandcolor@gmail.com"; // get_post_meta($_POST["email"], 'last_name', true)
  $subject = "Someone sent you a message from Women&Color";
  $message = "Hi " . get_post_meta($_POST["id"], 'first_name', true) . "\n\n";
  $message .= "Here’s the details of the message sent to you:\n\n";
  $message .= "Name: " . $_POST["name"] . "\n";
  $message .= "Email: " . $_POST["email"] . "\n";
  $message .= "Org: " . $_POST["organization"] . "\n";
  $message .= "Location: " . $_POST["location"] . "\n";
  $message .= "Date: " . $_POST["date"] . "\n";
  $message .= "Time: " . $_POST["time"] . "\n";
  $message .= "Additional information: " . $_POST["info"] . "\n";
  $message .= get_post_meta($_POST["id"], 'email', true);
  $email = wp_mail($to, $subject, $message);
  if ($email) {
    print_r('success');
    exit();
  }
  exit();
endif;
