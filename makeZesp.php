<?php
session_start();
?>

<html>
    <head>
        <title>Stwórz zespół - Syntask</title>
        <link rel="stylesheet" href="styles1.css">
        <link rel="stylesheet" href="main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Staatliches&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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
        <h1>Stwórz zespół:</h1>
            <form action="makeTeam.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label>Nazwa Zespołu:</label>
                <input type="text" name="name" class="zespName" placeholder="Nazwa"><br>
                <button type="submit" class="make"><i class="fa-solid fa-square-plus"></i> Stwórz</button>
            </form>

    </body>
</html>