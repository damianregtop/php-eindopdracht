<?php
function checkname(){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["name"] = $_POST["name"];
    header('Location: play.php');
    $_SESSION["score"] = 0;
  }
  elseif (isset($_SESSION["name"])) {
    $_SESSION["score"] = 0;
    header('Location: play.php');
  }
}

function displayScore(){
  echo "your score is " . $_SESSION["score"] . " points";
  echo "<br>";
}

function inputScore($name, $score){
  $conn = mysqli_connect("localhost", "root", "", "rps_scores");
  $sql = "INSERT INTO highscores (ID, name, score) VALUES ('', '$name' ,'$score')";

  mysqli_query($conn, $sql);
}

function showHighscore(){
  ?>
  <table>
    <tr>
      <th>name</th>
      <th>score</th>
    </tr>
    <?php

  $conn = mysqli_connect("localhost", "root", "", "rps_scores");
  $sql = "SELECT name, score FROM highscores ORDER BY score desc LIMIT 10";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["score"]; ?></td>
        </tr> <?php
    }
  echo "</table>";
  } else {
    echo "0 results";
  }
}

function generateOutcome(){
    $playerchoice = $_POST["submit"];

    $choices = array("rock", "paper", "sciccor");
    shuffle($choices);

    $serverchoice = $choices[0];

    echo "you chose " . $playerchoice . "<br>";
    echo "the computer chose " . $serverchoice . "<br>";

    if ($serverchoice == $playerchoice) {
      lose();
    }

    if ($playerchoice == "rock") {
      if ($serverchoice == "paper"){
        lose();
      }
      elseif ($serverchoice == "sciccor") {
        win();
      }
    }
    elseif ($playerchoice == "paper") {
      if ($serverchoice == "rock") {
        win();
      }
      elseif ($serverchoice == "sciccor") {
        lose();
      }
    }
    elseif ($playerchoice == "sciccor") {
      if ($serverchoice == "paper") {
        win();
    }
    elseif ($serverchoice == "rock") {
      lose();
    }
  }
}

function win(){
  $_SESSION["score"] = $_SESSION["score"] + 1;
  echo "you won <br>";
  displayScore();
  echo "<a href='play.php'>click for another round</a>";
}

function lose(){
  echo "you lost <br>";
  displayScore();
  if ($_SESSION["score"] >= 1) {
    inputScore($_SESSION['name'], $_SESSION['score']);
    echo "your score has been put in the leaderbord <br>";
  }
  echo "<a href='index.php'>click to try again</a>";
}
?>
