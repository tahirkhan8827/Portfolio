<?php
// Define the recipient and subject
$to = 'tahirkhan8827@gmail.com';  // Your email address
$subject = $_POST['subject'];       // Subject from the form

// Sanitize and validate inputs
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Create the email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Create the email body
$body = "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n";
$body .= "Message:\n$message";

// Send the email
if (mail($to, $subject, $body, $headers)) {
    echo "Your message has been sent. Thank you!";
} else {
    echo "Failed to send the message. Please try again.";
}
?>
