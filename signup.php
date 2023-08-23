<?php 
session_start(); 
$_SESSION["logged"] = isset($_SESSION["logged"]) ? $_SESSION["logged"] : false;
$_SESSION["fn"] = isset($_POST["fn"]) ? $_POST["fn"] : "";
$_SESSION["ln"] = isset($_POST["ln"]) ? $_POST["ln"] : "";
$_SESSION["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
$_SESSION["addr"] = isset($_POST["addr"]) ? $_POST["addr"] : "";
$_SESSION["pass"] = isset($_POST["pass"]) ? $_POST["pass"] : "";
$_SESSION["conf"] = isset($_POST["conf"]) ? $_POST["conf"] : "";
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="altstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <?php  
    include("include/subscribe.php");
    include("include/signup.php");
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
        <div class="signup">
          <form method="post">
            <h3>Enter the required information</h3>
            <table class="form">
              <tr>
                <td id="message" class="center"><small><?php echo $signupmsg; ?></small></td>
              </tr>
            </table>
            <table class="form" id="form">
              <tr>
                <td colspan="3"><input class="text" id="fn" value="<?php echo $_SESSION["fn"]; ?>" type="text" name="fn" placeholder="First name"/></td>
              </tr>
              <tr>
                <td colspan="3"><input class="text" id="ln" value="<?php echo $_SESSION["ln"]; ?>" type="text" name="ln" placeholder="Last name"/></td>
              </tr>
              <tr>
                <td colspan="3"><input class="text" id="email" value="<?php echo $_SESSION["email"]; ?>" type="text" name="email" placeholder="Email"/></td>
              </tr>
              <tr>
                <td colspan="3"><input class="text" id="addr" value="<?php echo $_SESSION["addr"]; ?>" type="text" name="addr" placeholder="Address"/></td>
              </tr>
              <tr>
                <td colspan="3">
                  <input class="text" type="password" id="pass" value="<?php echo $_SESSION["pass"]; ?>" name="pass" placeholder="Password"/>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <input class="text" type="password" id="conf" value="<?php echo $_SESSION["conf"]; ?>" name="conf" placeholder="Confirm password"/>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td class="submit">
                  <input type="submit" value="Sign up" name="signup" id="submitbutton">
                  <input type="button" onclick="location.href='signin.php'" value="Back" id="submitbutton">
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