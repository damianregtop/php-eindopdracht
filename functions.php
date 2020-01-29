<?php
//controleert als er al de gebruiker is ingelogd met een naam. zoja, stuur dan door naar de game. zonee, stuur hem naar de aanmeld pagina.
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

//een makkelijke manier om de score te laten zien van de huidige sessie
function displayScore(){
  echo "your score is " . $_SESSION["score"] . " points";
  echo "<br>";
}

//voegt de score toe aan het scorebord
function inputScore($name, $score){
  $conn = mysqli_connect("localhost", "root", "", "rps_scores");
  $sql = "INSERT INTO highscores (ID, name, score) VALUES ('', '$name' ,'$score')";

  mysqli_query($conn, $sql);
}

//laat alle highscores zien die in de database staan in een tabel form.
function showHighscore(){
  ?>
  <table>
    <tr>
      <th>name</th>
      <th>score</th>
    </tr>
    <?php

  //de sql query om de scores op te halen
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

//bepaalt als de speler heeft gewonnen of verloren
function generateOutcome(){
    $playerchoice = $_POST["submit"];

    $choices = array("rock", "paper", "scissor");
    shuffle($choices);

    $serverchoice = $choices[0];

    //laat zien wat beide partijen hebben gekozen
    echo "you chose " . $playerchoice . "<br>";
    echo "the computer chose " . $serverchoice . "<br>";

    if ($serverchoice == $playerchoice) {
      lose();
    }

    if ($playerchoice == "rock") {
      if ($serverchoice == "paper"){
        lose();
      }
      elseif ($serverchoice == "scissor") {
        win();
      }
    }
    elseif ($playerchoice == "paper") {
      if ($serverchoice == "rock") {
        win();
      }
      elseif ($serverchoice == "scissor") {
        lose();
      }
    }
    elseif ($playerchoice == "scissor") {
      if ($serverchoice == "paper") {
        win();
    }
    elseif ($serverchoice == "rock") {
      lose();
    }
  }
}

//functie om te laten zien dat je een ronde hebt gewonnen en geeft een link naar het dashboard
function win(){
  $_SESSION["score"] = $_SESSION["score"] + 1;
  echo "<h2>you won </h2><br>";
  displayScore();
  echo "<a href='play.php'>click for another round</a>";
}

//functie om te laten zien dat je de ronde hebt verloren. voegt score toe aan database en stuurt terug naar begin
function lose(){
  echo "<h2>you lost </h2><br>";
  displayScore();
  if ($_SESSION["score"] >= 1) {
    inputScore($_SESSION['name'], $_SESSION['score']);
    echo "your score has been put in the leaderbord <br>";
  }
  echo "<a href='index.php'>click to try again</a>";
}
?>
