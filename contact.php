<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email configurations
    $admin_email = "youradminemail@example.com"; // Your email address
    $subject_to_admin = "New Contact Form Submission";
    $subject_to_sender = "Thank you for contacting us!";

    // Message for the admin
    $message_to_admin = "
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    // Message for the sender
    $message_to_sender = "
    <h2>Thank you, $name!</h2>
    <p>We have received your message and will get back to you as soon as possible.</p>
    <p><strong>Your Message:</strong><br>$message</p>
    <p>Best regards,<br>Your Company</p>
    ";

    // Email headers for the admin email
    $headers_admin = "MIME-Version: 1.0" . "\r\n";
    $headers_admin .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers_admin .= "From: $email" . "\r\n";

    // Email headers for the sender email
    $headers_sender = "MIME-Version: 1.0" . "\r\n";
    $headers_sender .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers_sender .= "From: $admin_email" . "\r\n";

    // Send email to admin
    $admin_mail_sent = mail($admin_email, $subject_to_admin, $message_to_admin, $headers_admin);

    // Send confirmation email to sender
    $sender_mail_sent = mail($email, $subject_to_sender, $message_to_sender, $headers_sender);

    // Redirect user with success or failure message
    if ($admin_mail_sent && $sender_mail_sent) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to send your message. Please try again later."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
