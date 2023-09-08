<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Recipient's email address
    $to = "vunoahcladera@gmail.com"; // Replace with the recipient's email address
    
    // Compose the email message
    $email_subject = "Contact Form Submission: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message";
    
    // Create a new instance of PHPMailer
    $mail = new PHPMailer;
    
    // Configure SMTP settings (for Gmail with TLS)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noahcladera.portfolio@gmail.com'; // Replace with your Gmail email address
    $mail->Password = 'iownnvpgzcbtivnx'; // Replace with your Gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    // Set the sender and recipient
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    
    // Set the subject and body of the email
    $mail->Subject = $email_subject;
    $mail->Body = $email_body;
    
    // Send the email using PHPMailer
    if ($mail->send()) {
        // Email sent successfully
        echo "Message sent successfully!";
    } else {
        // Email sending failed
        echo "Error sending message.";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo "Form submission failed.";
}
?>
