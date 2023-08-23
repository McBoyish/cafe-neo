<?php 
session_start(); 
$_SESSION["logged"] = isset($_SESSION["logged"]) ? $_SESSION["logged"] : false;
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>About</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <?php 
    include("include/subscribe.php"); 
    include("include/account.php");
    ?>
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
                "<a href=\"signin.php\">Sign in</a>" : "<a class=\"active\">".$_SESSION["s_fn"]."</a>"); 
          ?>
        </nav>
      </div>
    </div>
  </header>
  
  <body>
    <div class="banner">
      <div class="banner-content">
        <table class="nicefont">
          <tr>
            <th><h2>My Account</h2></th>
          </tr>
          <tr>
            <td><p><?php echo $_SESSION["s_fn"]." ".$_SESSION["s_ln"]; ?></p></td>
          </tr>
            <td><p><?php echo $_SESSION["s_email"]; ?></p></td>
          <tr>
          </tr>
            <td><p><?php echo $_SESSION["s_address"]; ?></p></td>
          <tr>
          <tr>
            <td class="center">
              <form method="post">
                <input type="button" onclick="location.href='cart.php'" id="submitbutton" value="View cart">
                <input type="submit" id="submitbutton" value="Log out" name="logout">
              </form>
            </td>
            <td>
          </tr>
        </table>
      </div>
    </div>
  </body>
  
  <footer>
    <div class="footer">
      <div class="container">
        <div class="section">
          <h5>Open hours</h5>
          <table>
            <tr>
              <td>Monday&nbsp;&nbsp;</td>
              <td>09:00am - 10:00pm</td>
            </tr>
            <tr>
              <td>Tuesday&nbsp;&nbsp;</td>
              <td>09:00am - 10:00pm</td>
            </tr>
            <tr>
              <td>Wednesday&nbsp;&nbsp;</td>
              <td>09:00am - 10:00pm</td>
            </tr>
            <tr>
              <td>Thursday&nbsp;&nbsp;</td>
              <td>09:00am - 10:00pm</td>
            </tr>
            <tr>
              <td>Friday&nbsp;&nbsp;</td>
              <td>09:00am - 10:00pm</td>
            </tr>
            <tr>
              <td>Saturday&nbsp;&nbsp;</td>
              <td>Closed</td>
            </tr>
              <tr>
              <td>Sunday&nbsp;&nbsp;</td>
              <td>Closed</td>
            </tr>
          </table>
        </div>
        <div class="section">
          <h5>Address</h5>
          <p>
            1455 De Maisonneuve Blvd. W. <br>
            Montreal, Quebec, Canada <br>
            H3G 1M8
          </p>
          <br>
          <h5>Contact info</h5>
          <p>
            Phone: +1 (514) 848-2424<br>
            Email: sample-email@concordia.ca
          </p>
        </div>
        <div class="section">
          <h5>Subscribe to our newsletter</h5>
          <div class="input-group">
            <form method="post" action="">
              <input class="form-input" type="email" name="email" id="newsletter" placeholder="Enter your email address">
              <input type="submit" name="submitemail" class="submit-button" value="Submit">
              <span class="black"><?php echo $message; ?></span>
            </form>
          </div>
          <div class="social-links">
            <a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.twitter.com/"><i class="fab fa-twitter-square"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram-square"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</html>