<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format";
        exit;
    }
    
    // Create email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message:\n$message";
    
    // Set email headers
    $headers = "From: $email";
    
    // Set recipient email address
    $to = "your@email.com"; // Change this to your email address
    
    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: Message could not be sent.";
    }
} else {
    // If form is not submitted, redirect to the contact form page
    header("Location: contact_form.html"); // Change this to your contact form page
    exit;
}

?>
