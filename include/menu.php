<?php
$menu = array();
if (file_exists("data/menu.txt")) {
  $file = fopen("data/menu.txt", "r");
  while (!feof($file)) {
    $line = stream_get_line($file, PHP_INT_MAX, "\n");
    $menu_info = explode("|", $line);
    array_push($menu, $menu_info[0]);
  }
}
foreach ($menu as $item) {
  if (isset($_POST[$item])) {
    $_SESSION[$item."_count"]++;
  }
}
?>