<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    // Your email address
    $to = "jazzy.alas@yahoo.com";  // 
    $subject = "New message from contact form";
    $headers = "From: $userEmail" . "\r\n" .
               "Reply-To: $userEmail" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $body = "You received a new message from your website contact form:\n\n";
    $body .= "Email: $userEmail\n\n";
    $body .= "Message:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Error sending message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
