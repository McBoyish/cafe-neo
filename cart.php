<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <header>
    <div class="navbar">
      <div class="container">
        <a class="navbar-brand">
          <i class="fas fa-mug-hot"></i>
        </a>
        <nav>
          <a href="home.php">Home</a>
          <a href="menu.php">Menu</a>
          <a href="reservation.php">Reservation</a>
          <a href="contactus.php">Contact us</a>
          <a href="about.php">About</a>
          <?php 
          echo (!$_SESSION["logged"] ? 
                "<a href=\"signin.php\">Sign in</a>" : "<a href=\"account.php\">".$_SESSION["s_fn"]."</a>"); 
          ?>
        </nav>
      </div>
    </div>
  </header>
  
  <body>
    <div>
      <form method="post">
        <table class="menutable">
          <tr>
            <td colspan="2"><h1 class="middle">My cart</h1></td>
          </tr>
          <tr>
            <th>Item</th>
            <th>Price</th>
          </tr>
          <?php
          $total = 0;
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
            if ($_SESSION[$item."_count"] > 0) {
              $product = str_replace("_", " ", $item);
              $total += floatval($_SESSION[$item."_count"]) * floatval($_SESSION[$item]);
              echo "<tr>
                      <th>".$_SESSION[$item."_count"]." ".$product."</th>
                      <th>".$_SESSION[$item]."</th>
                    </tr>";
            }
          }
          ?>
          <tr>
            <th>Total</th>
            <th><?php echo $total; ?></th>
          </tr>
          <tr>
            <td colspan="2" class="center">
              <input type="<?php echo (($_SESSION["logged"] && $total > 0) ? "button" : "hidden"); ?>" onclick="location.href='order.php'" value="Submit order" id="submitbutton">
              <input type="<?php echo ($_SESSION["logged"] ? "button" : "hidden"); ?>" onclick="location.href='account.php'" value="Back" id="submitbutton">
            </td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>