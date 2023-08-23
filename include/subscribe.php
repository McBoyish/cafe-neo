<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
$message = "";
if (isset($_POST["submitemail"])) {
    $email = $_POST["email"];
    if(empty($email)) {
        $message="Please fill the input field";
    } else if(emailExists($email)) {
        $message="Email is already subscribed";
    } else {
        $message="Thank you for subscribing";
        if (file_exists("data/subs.txt")) {
              $myfile=fopen("data/subs.txt","a");
              fwrite($myfile,$email."\n");
              fclose($myfile);
        }
        date_default_timezone_set('Etc/UTC');
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'cafeneo.noreply@gmail.com';
        $mail->Password = 'CafeNeo287!';
        $mail->setFrom('cafeneo.noreply@gmail.com', 'Cafe Neo');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'You have subscribed to Cafe Neo';
        $mail->Body = "<p>Dear Client,</p
                       <p>Thank you for subscribing to our website!<br>
                       We will keep you updated about our company.</p>
                       <p>Best regards,</p><p>Cafe Neo Team</p>";
        $mail->send();
    }
}

function emailExists($email) {
    if (!file_exists("data/subs.txt")) {  
        return false;
    }
    $handle=fopen("data/subs.txt","r");
    while(!feof($handle)){
        $line=stream_get_line($handle,PHP_INT_MAX,"\n");
        if (empty($line)) {
          fclose($handle);
          return false;
        }
        if($email==$line) {
            fclose($handle);
            return true;
        }
    }
    fclose($handle);
    return false;
} 
?>