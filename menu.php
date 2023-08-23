<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Menu</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <?php include("include/menu.php"); ?>
  </head>
  <header>
    <div class="navbar">
      <div class="container">
        <a class="navbar-brand">
          <i class="fas fa-mug-hot"></i>
        </a>
        <nav>
          <a href="home.php">Home</a>
          <a class="active">Menu</a>
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
            <td colspan="2"><h1 class="middle">Menu</h1></td>
          </tr>
          <tr>
            <td>
              <table class="centre">
                <tr>
                  <th colspan="2">Coffee</th>
                </tr>
                <tr>
                  <td>Americano</td>
                  <td>$5.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Americano" value="Add"></td>
                </tr>
                <tr>
                  <td>Espresso</td>  
                  <td>$5.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Espresso" value="Add"></td>
                </tr>
                <tr>
                  <td>Mocha</td>
                  <td>$7.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Mocha" value="Add"></td>
                </tr>
                <tr>
                  <td>Cappuccino</td>
                  <td>$5.50</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Cappuccino" value="Add"></td>
                </tr>
                <tr>
                  <td>Latte</td>
                  <td>$6.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Latte" value="Add"></td>
                </tr>
                <tr>
                  <td>Cold drip</td>
                  <td>$7.70</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Cold drip" value="Add"></td>
                </tr>
              </table>
            </td>  
            <td>
              <table class="centre">
                <tr><th colspan="2">Cake</th></tr>
                <tr>
                  <td>Black Forest</td>
                  <td>$4.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Black forest cake" value="Add"></td>
                </tr>
                <tr>
                  <td>Carrot</td>
                  <td>$4.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Carrot cake" value="Add"></td>
                </tr>
                <tr>
                  <td>Chocolate Lava</td>
                  <td>$4.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Chocolate lava cake" value="Add"></td> 
                </tr>
                <tr>
                  <td>Green Tea</td>
                  <td>$4.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Green tea cake" value="Add"></td>
                </tr>
                <tr>
                  <td>Lemon Raspberry</td>
                  <td>$4.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Lemon raspberry cake" value="Add"></td>
                </tr>
                <tr>
                 <td>Velvet</td>
                 <td>$4.00</td>
                 <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Velvet cake" value="Add"></td>
                </tr> 
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table class="centre">
                <tr><th colspan="2">Cupcakes</th></tr>
                <tr>
                  <td>Blueberry</td>
                  <td>$2.50</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Blueberry cupcake" value="Add"></td>
                </tr>
                <tr>
                  <td>Red Velvet</td>
                  <td>$3.00</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Red velvet cupcake" value="Add"></td>
                </tr>
                <tr>
                  <td>Green Tea</td>
                  <td>$2.50</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Green tea cupcake" value="Add"></td>
                </tr>
              </table>
            </td>
            <td>
              <table class="centre">
                <tr><th colspan="2">Breakfast</th></tr>
                <tr>
                  <td>Croissant</td>
                  <td>$3.25</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Croissant" value="Add"></td>
                </tr>
                <tr>
                  <td>Muffin</td>
                  <td>$2.55</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Muffin" value="Add"></td>
                </tr>
                <tr>
                  <td>Sandwich</td>
                  <td>$4.75</td>
                  <td><input type="<?php echo ($_SESSION["logged"] ? "submit" : "hidden"); ?>" id="submitbutton" name="Sandwich" value="Add"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="2" class="center">
              <input type="<?php echo ($_SESSION["logged"] ? "button" : "hidden"); ?>" onclick="location.href='cart.php'" value="View cart" id="submitbutton">
            </td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>