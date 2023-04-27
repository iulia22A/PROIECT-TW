<?php
// check if the form has been submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect data from the form
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $phone = test_input($_POST["phone"]);
  $email = test_input($_POST["email"]);
  $message = test_input($_POST["message"]);

  // validate the input data
  if (empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($message)) {
    echo "All fields are required.";
    exit;
  }

  // validate email format using a regular expression
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    exit;
  }

  // send the data via email
  $to = "your-email@example.com"; // the email address to which the message will be sent
  $subject = "New message from your website.";
  $body = "You have received a new message from $fname $lname.\n\nContact details:\nPhone: $phone\nEmail: $email\n\nMessage:\n$message";
  $headers = "From: $email\r\nReply-To: $email\r\n"; // set the sender and recipient email address

  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message! We will get back to you as soon as possible.";
  } else {
    echo "The message could not be sent. Please try again later.";
  }
}

// function to test input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>