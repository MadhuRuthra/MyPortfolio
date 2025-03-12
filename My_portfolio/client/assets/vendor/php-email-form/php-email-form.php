private function send_via_smtp($email_content) {
    require __DIR__ . '/PHPMailer/src/PHPMailer.php';
    require __DIR__ . '/PHPMailer/src/SMTP.php';
    require __DIR__ . '/PHPMailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = $this->smtp['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $this->smtp['username'];
    $mail->Password = $this->smtp['password'];
    $mail->SMTPSecure = $this->smtp['encryption'];
    $mail->Port = $this->smtp['port'];

    $mail->setFrom($this->from_email, $this->from_name);
    $mail->addAddress($this->to);
    $mail->Subject = $this->subject;
    $mail->Body = $email_content;

    return $mail->send() ? 'OK' : 'Message could not be sent via SMTP.';
}
