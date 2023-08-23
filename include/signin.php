<?php
$signinmsg = "";
if (isset($_POST["signin"])) {
  $email = $_POST["email"];
  $pass = $_POST["password"];
  if (empty($email) || empty($pass)) {
    $signinmsg = "Please fill all the fields";
  } else {
    $code = accountExists($email, $pass);
    if ($code == -1) {
      $signinmsg = "This account does not exist";
      $_SESSION["email"] = "";
      $_SESSION["password"] = "";
    } else if ($code == 0) {
      $signinmsg = "Invalid password";
      $_SESSION["password"] = "";
    } else if ($code == 1) {
      session_destroy();
      session_start();
      initSession($email);
      $_SESSION["logged"] = true;
      header("Location:home.php");
      exit();
    }
  }
}
             
function accountExists($email, $pass) {
  if (!file_exists("data/accounts.txt")) {
    return -1;
  }
  $file = fopen("data/accounts.txt", "r");
  while (!feof($file)) {
    $line = stream_get_line($file, PHP_INT_MAX, "\n");
    if (empty($line)) {
      fclose($file);
      return -1;
    }
    $info = explode("|", $line);
    if ($info[3] == $email && $info[4] != $pass) {
      fclose($file);
      return 0;
    } else if ($info[3] == $email && $info[4] == $pass) {
      fclose($file);
      return 1;
    }
  }
  fclose($file);
  return -1;
}

function initSession($email) {
  $file = fopen("data/accounts.txt", "r");
  while (!feof($file)) {
    $line = stream_get_line($file, PHP_INT_MAX, "\n");
    if (empty($line)) {
      break;
    }
    $info = explode("|", $line);
    if ($info[3] == $email) {
      $_SESSION["s_fn"] = $info[0];
      $_SESSION["s_ln"] = $info[1];
      $_SESSION["s_address"] = $info[2];
      $_SESSION["s_email"] = $info[3];
      $_SESSION["s_pass"] = $info[4];
      break;
    }
  }
  fclose($file);
  $menu = fopen("data/menu.txt", "r");
  while (!feof($menu)) {
    $item = stream_get_line($menu, PHP_INT_MAX, "\n");
    if (empty($item)) {
      break;
    }
    $item_info = explode("|", $item);
    $_SESSION[$item_info[0]] = $item_info[1];
    $_SESSION[$item_info[0]."_count"] = 0;
  }
  fclose($menu);
  return;
}
?>