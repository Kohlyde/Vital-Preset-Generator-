<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "jsnchase@gmail.com";
    $subjectLine = "Contact Form: " . $subject;

    $body = "You have received a new message from the contact form on your website.\n\n";
    $body .= "First Name: " . $firstName . "\n";
    $body .= "Last Name: " . $lastName . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Subject: " . $subject . "\n";
    $body .= "Message:\n" . $message . "\n";

    $headers = "From: noreply@yourdomain.com\n";
    $headers .= "Reply-To: " . $email;

    if (mail($to, $subjectLine, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
}
?>