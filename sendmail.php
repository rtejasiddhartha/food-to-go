<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "rtejasiddhartha18@gmail.com";  // Replace with your email address
    $subject = "New Contact Form Submission";
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $body = "You have received a new message from Food-To-Go website:

";
        $body .= "Name: $name
";
        $body .= "Email: $email

";
        $body .= "Message:
$message
";

        $headers = "From: $name <$email>";

        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Message delivery failed. Please try again.";
        }
    } else {
        echo "Invalid input. Please fill out the form correctly.";
    }
} else {
    echo "Invalid request.";
}
?>
