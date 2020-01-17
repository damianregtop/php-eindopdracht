<?php
  include 'functions.php';
  session_start();
  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="styles.css">

  <title>rock paper scissors</title>
</head>
<body>
  <?php generateOutcome(); ?>
  <?php showHighscore(); ?>
</body>
</html>
