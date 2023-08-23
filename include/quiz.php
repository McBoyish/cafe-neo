<?php
$message = "";
$error = false;
if (isset($_POST["submit"])){
  $coffee = $_POST["coffee"];
  $type = $_POST["type"];
  $milk = $_POST["milk"];
  $temp = $_POST["temp"];
  if (empty($coffee) || empty($type) || empty($milk) || empty($temp)) {
    $message = "Please answer all the questions";
  } else {
    // process the choices and choose a suitable coffee
    header("Location: result.php");
    exit();
  }
}
?>