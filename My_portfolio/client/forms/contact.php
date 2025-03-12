<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

$mail = new PHPMailer(true);

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Corrected concatenation with the dot (`.`) operator
$Total_message = "Name: " . $name . "<br>Email: " . $email . "<br>Subject: " . $subject . "<br>Message: " . $message . "<br>";

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'madhubalajapk@gmail.com';  // Your Gmail address
    $mail->Password = 'nroptijwnfjcfxgw';         // Your generated App Password here
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('madhubalajapk@gmail.com', 'Mailer');
    $mail->addAddress('ruthra040401@gmail.com', 'Ruthra'); 
    $mail->addAddress('madhuruthra2001@gmail.com', 'Madhuruthra'); // Added second recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from My Portfolio';
    $mail->Body    = $Total_message;
    $mail->AltBody = strip_tags($Total_message); // Plain-text version

    // Send the email
    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
