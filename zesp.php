<?php
session_start();
?>

<html>
    <head>
        <title>Zespoły - Syntask</title>
        <link rel="stylesheet" href="styles1.css">
        <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Staatliches&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c0a17bb5fa.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="topbar">
                <a class="navButton current" href="zesp.php">Zespoły</a>
                <a class="navButton" href="grupy.php">Grupy</a>
                <a class="navButton" href="zadania.php">Zadania</a>
                <a class="navButton" href="zaproszenia.php">Zaproszenia</a>
                <a class="greet"><?php echo "Witaj, ".$_SESSION['username']; ?></a>
                <a class="loginButton" href="logout.php">Wyloguj się</a>
        </div><br>
        <h1>Zespoły do których należysz:</h1>
    <?php include("showteams.php");?>
    <div class="options">
        <a href="makeZesp.php"><button class="make"><i class="fa-solid fa-square-plus"></i> Stwórz własny</button></a><br> 
        <a href="joinZesp.php"><button class="make"><i class="fa-solid fa-person-circle-plus"></i> Dołącz do istniejącego zespołu</button></a>
    </div>


    </body>
</html>