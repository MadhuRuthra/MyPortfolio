<?php
require '../assets/vendor/php-email-form/php-email-form.php';

$receiving_email_address = 'madhuruthra2001@gmail.com';

if (!file_exists('../assets/vendor/php-email-form/php-email-form.php')) {
    die('Error: Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Use SMTP for better reliability
$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'your-email@gmail.com', // Replace with your email
    'password' => 'your-app-password',    // Replace with your App Password
    'port' => '587',
    'encryption' => 'tls'
);

echo $contact->send();
?>
