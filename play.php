<?php
  session_start();
  include 'functions.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>rock paper sciccors</title>
  </head>
  <body>
    <h2> <?php displayScore();?> </h2>
    <form action="process.php" method="post">
      <input type="submit" name="submit" value="rock">
      <input type="submit" name="submit" value="paper">
      <input type="submit" name="submit" value="sciccor">
    </form>
  </body>
</html>
