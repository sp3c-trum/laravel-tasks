<?php
session_start();
?>
<html>
    <head>
        <title>Grupy - Syntask</title>
        <link rel="stylesheet" href="styles1.css">
        <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Staatliches&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    </head>

    <body>
        <div id="topbar">
                <a class="navButton" href="zesp.php">Zespoły</a>
                <a class="navButton current" href="grupy.php">Grupy</a>
                <a class="navButton" href="zadania.php">Zadania</a>
                <a class="navButton" href="zaproszenia.php">Zaproszenia</a>
                <a class="greet"><?php echo "Witaj, ".$_SESSION['username']; ?></a>
                <a class="loginButton" href="logout.php">Wyloguj się</a>
        </div><br>

        <h1>Grupy do których należysz:</h1>
        <?php include("showGroups.php");?>

    </body>
</html>