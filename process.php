<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    $to = "ashfak121103@gmail.com";

    $email_subject = "New Contact Form Submission from Your Website";
    if(!empty($subject)) {
        $email_subject = ": $subject";
    }

    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    if (!empty($subject)) {
        $email_body .= "Subject: $subject\n";
    }
    $email_body .= "Message:\n $message\n";


    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header("location: thank_you.html");
        exit();
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    header("HTTP/1.0 403 Forbidden");
    echo "You cannot access this page directly.";
}
?>