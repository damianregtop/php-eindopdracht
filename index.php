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
    <h1> welcome to rock paper sciccors</h1>
    <p> please enter a nickname (max 3 characters)</p>
    <form action="" method="post">
      <input type="text" name="name" maxlength="3">
      <input type="submit" value="play">
    </form>
    <?php checkname() ?>
    <?php showHighscore();?>
  </body>
</html>
