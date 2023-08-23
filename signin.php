<?php 
session_start(); 
$_SESSION["logged"] = isset($_SESSION["logged"]) ? $_SESSION["logged"] : false;
$_SESSION["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
$_SESSION["password"] = isset($_POST["password"]) ? $_POST["password"] : "";
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Sign in</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="altstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <?php  
    include("include/subscribe.php");
    include("include/signin.php");
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
                "<a href=\"signin.php\">Sign in</a>" : "<a href=\"account.php\">".$_SESSION["s_fn"]."</a>"); 
          ?>
        </nav>
      </div>
    </div>
  </header>
  
  <body>
    <div class="banner">
      <div class="banner-content">
        <div class="signin">
          <form method="post">
            <h3>Enter the login information</h3>
            <table class="form">
              <tr>
                <td id="message" class="center"><small><?php echo $signinmsg; ?></small></td>
              </tr>
            </table>
            <table class="form" id="form">
              <tr>
                <td colspan="3"><input class="text" id="email" value="<?php echo $_SESSION["email"]; ?>" type="text" name="email" placeholder="Email"/></td>
              </tr>
              <tr>
                <td colspan="3"><input class="text" id="password" value="<?php echo $_SESSION["password"]; ?>" type="password" name="password" placeholder="Password"/></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td class="submit">
                  <input type="submit" value="Sign in" name="signin" id="submitbutton">
                  <input type="button" onclick="location.href='signup.php'" value="Sign up" id="submitbutton">
                </td>
              </tr>
            </table>
          </form>
        </div>
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
              <span class="black"><?php echo $message ?></span>
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