<?php
if(isset($_POST['submit'])) {

  // Get the form data
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Validate form data
  $errors = array();
  if(empty($firstName)) {
    $errors[] = "Please enter your first name";
  }
  if(empty($lastName)) {
    $errors[] = "Please enter your last name";
  }
  if(empty($email)) {
    $errors[] = "Please enter your email address";
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address";
  }
  if(empty($message)) {
    $errors[] = "Please enter a message";
  }

  // If there are no errors, send the email
  if(empty($errors)) {
    $to = "your_email@example.com"; // Replace with your email address
    $subject = "New message from ".$firstName." ".$lastName;
    $body = "Name: ".$firstName." ".$lastName."\n";
    $body .= "Phone: ".$phone."\n";
    $body .= "Email: ".$email."\n";
    $body .= "Message:\n".$message;
    $headers = "From: ".$email."\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    if(mail($to, $subject, $body, $headers)) {
      echo "Message sent successfully";
    } else {
      echo "Message could not be sent";
    }
  } else {
    // If there are errors, display them to the user
    foreach($errors as $error) {
      echo $error."<br>";
    }
  }
}
?>
