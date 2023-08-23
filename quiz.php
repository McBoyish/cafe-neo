<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Quiz</title>
      <link rel="stylesheet"  type="text/css" href="quiz.css">
      <meta charset="UTF-8">
      <?php  
      include("include/quiz.php");
      ?>
  </head>
  <body>
    <form method="post" action="">
      <h2 class="title">Answer the questions and we will choose for you</h2>
      <div class="center">
        <label><h2>Are you...</h2></label>
        <input type="hidden" name="coffee" value="">
        <input type="radio" name="coffee" value="yes">
        <label>...adventurous? You like to try new flavors?</label><br>
        <input type="radio" name="coffee" value="no">
        <label>...looking for a comforting morning ritual. You prefer having a coffee that is flavorful but not too wild?</label><br>
      </div>
      <div class="center">
        <label><h2>You best enjoy your coffee...</h2></label>
        <input type="hidden" name="type" value="">
        <input type="radio" name="type" value="espresso">
        <label>...as espresso beverages.</label><br>
        <input type="radio" name="type" value="drip">
        <label>...as drip coffee.</label><br>
      </div>
      <div class="center">
        <label><h2>Do you prefer your coffee with milk?</h2></label>
        <input type="hidden" name="milk" value="">
        <input type="radio" name="milk" value="nomilk">
        <label>Black or white with little milk.</label><br>
        <input type="radio" name="milk" value="milk">
        <label>Lattes all the way.</label><br>
      </div>
      <div class="last">
        <label><h2>You prefer your coffee...</h2></label>
        <input type="hidden" name="temp" value="">
        <input type="radio" name="temp" value="hot">
        <label>...hot!</label><br>
        <input type="radio" name="temp" value="cold">
        <label>...cold!</label><br>
      </div>
      <div class="button">
        <input type="submit" name="submit" value="Submit"><br/>
        <small><?php echo $message; ?></small>
      </div>
    </form>
  </body>
</html>