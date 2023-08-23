<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
$signupmsg = "";
if (isset($_POST["signup"])) {
  $fn = trim($_POST["fn"]);
  $ln = trim($_POST["ln"]);
  $addr = trim($_POST["addr"]);
  $email = trim($_POST["email"]);
  $pass = $_POST["pass"];
  $conf = $_POST["conf"];
  if (empty($fn) || empty($ln) || empty($addr) || empty($email) || empty($pass) || empty($conf)) {
    $signupmsg = "Please fill all the fields";
  } else if (!validEmail($email)) {
    $signupmsg = "Invalid email";
    $_SESSION["email"] = "";
  } else if (!isPasswordValid($pass)) {
    $signupmsg = "Password must be alphanumeric and miminum length of 8";
    $_SESSION["pass"] = "";
  } else if (!checkConfirm($pass, $conf)) {
    $signupmsg = "The passwords do not match";
    $_SESSION["conf"] = "";
  } else if (accountExists($email)) {
    $signupmsg = "Email already exists, please login instead";
    $_SESSION["fn"] = "";
    $_SESSION["ln"] = "";
    $_SESSION["email"] = "";
    $_SESSION["pass"] = "";
    $_SESSION["conf"] = "";
  } else {
    if (file_exists("data/accounts.txt")) {
      $file = fopen("data/accounts.txt", "a");
      fwrite($file, $fn."|".$ln."|".$addr."|".$email."|".$pass."\n");
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
    $mail->Subject = 'You have registered to Cafe Neo';
    $mail->Body = "<p>Dear ".$fn." ".$ln.",</p
                   <p>Thank you for registering to our website!<br>
                   You can now enjoy several benefits.<br>Please visit the website for more details.</p>
                   <p>Best regards,</p><p>Cafe Neo Team</p>";
    $mail->send();
    session_destroy();
    header("Location:signin.php");
    exit();
  }
}

function validUsr($usr) {
  return preg_match("/[a-zA-Z0-9]{3,12}/", $usr);
}

function validEmail($email) {
    return preg_match("/[a-zA-Z0-9.]+@[a-z]+.[a-z]{2,}/", $email);
}
  
function checkConfirm($pass, $conf) {
  $pass = str_split($pass);
  $conf = str_split($conf);
  $passlength = count($pass);
  if ($passlength != count($conf)) {
    return false;
  }
  for ($i = 0; $i < $passlength; ++$i) {
    if ($pass[$i] != $conf[$i]) {
      return false;
    }
  }
  return true;
}

function isPasswordValid($pass) {
  $pass = str_split($pass);
  if (count($pass) < 8) {
    return false;
  }
  $upper = false;
  $lower = false;
  $digit = false;
  foreach ($pass as $ch) {
    if ($ch >= 'a' && $ch <= 'z') {
      $lower = true;
    } else if ($ch >= 'A' && $ch <= 'Z') {
      $upper = true;
    } else if ($ch >= '0' && $ch <= '9') {
      $digit = true;
    } else {
      return false;
    }
  }
  return (($upper || $lower) && $digit);
}

function accountExists($email) {
  if (!file_exists("data/accounts.txt")) {
    return false;
  }
  $file = fopen("data/accounts.txt", "r");
  while (!feof($file)) {
    $line = stream_get_line($file, PHP_INT_MAX, "\n");
    $info = explode("|", $line);
    if ($info[3] == $email) {
      fclose($file);
      return true;
    }
  }
  fclose($file);
  return false;
}
?>