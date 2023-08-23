<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
$message = "";
if (isset($_POST["send"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $request = str_replace("\n", " ", $_POST["request"]);
  $request = str_replace("\r", "", $request);
  if (empty($name) || empty($email) || empty($request)) {
    $message = "Please fill all the fields";
  } else if (!validEmail($email)) {
    $message = "Please enter a valid email";
    $semail = "";
  } else {
    if (file_exists("data/requests.txt")) {
      $file = fopen("data/requests.txt", "a");
      fwrite($file, $name."|".$email."|".$request."\n");
      fclose($file);
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
    $mail->Subject = 'Thank you for your feedback';
    $mail->Body = "<p>Dear ".$name.",</p
                   <p>We will carefully consider your request.</p>
                   <p>Best regards,</p><p>Cafe Neo Team</p>";
    $mail->send();
    $sname = "";
    $semail = "";
    $srequest = "";
    $message = "Request has been sent";
  }
}

function validEmail($email) {
    return preg_match("/[a-zA-Z0-9.]+@[a-z]+.[a-z]{2,}/", $email);
}
?>