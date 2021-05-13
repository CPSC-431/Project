 <?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $mailFrom=$_POST['mail'];
    $message=$_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host= 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'te242911@gmail.com';
        $mail->Password = 'RandomPassword1';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('te242911@gmail.com');
        $mail->addAddress('te242911@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Contact Page)';
        $mail->Body = "<h3>Name : $name <br>Email: $mailFrom <br>Message: $message </h3>";

        $mail->send();
        $alert = '<div class="alert-success">
                    <span>Message Sent!</span>
                  </div>';

    } catch(Exception $e){
        $alert = '<div class="alert-error">
                    <span>'.$e->getMessage().'</span>
                  </div>';
    }

}


