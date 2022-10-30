<?php
session_start();
?>

<html>
    <head>
        <title>Serwer</title>
        <link rel="stylesheet" href="styles1.css">
        <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Staatliches&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="topbar">
                <a class="navButton" href="zesp.php">Zespoły</a>
                <a class="navButton" href="grupy.php">Grupy</a>
                <a class="navButton current" href="zadania.php">Zadania</a>
                <a class="navButton" href="zaproszenia.php">Zaproszenia</a>
                <a class="greet"><?php echo "Witaj, ".$_SESSION['username']; ?></a>
                <a class="loginButton" href="logout.php">Wyloguj się</a>
        </div><br>
        <h1>Zadania do wykonania:</h1>
        <ol class="diamond">
            <?php include("showtasks.php");?>
        </ol><br>

        <a href="makeZad.php"><button class="make">Stwórz zadania</button></a>

    </body>
</html>

<script type="text/javascript">
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}</script>