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
        </head>
    <body>
        <div id="topbar">
                <a class="navButton" href="zesp.php">Zespoły</a>
                <a class="navButton" href="grupy.php">Grupy</a>
                <a class="navButton" href="zadania.php">Zadania</a>
                <a class="navButton current" href="zaproszenia.php">Zaproszenia</a>
                <a class="greet"><?php echo "Witaj, ".$_SESSION['username']; ?></a>
                <a class="loginButton" href="logout.php">Wyloguj się</a>
        </div><br>
        <h1>Stwórz zaproszenie:</h1>
            <form action="makeInv.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label>Do jakiego zespołu chcesz utworzyć zaproszenie?</label>
                <select name="team" class="selectTeam">
                <?php include("showTeamInSelect.php");?>
                </select><br>
                <label>Zaproszenie:</label>
                <input type="text" name="invite" class="selectTeam"><br>
                <label>Liczba użyć:</label>
                <input type="number" name="uses" class="selectTeam"><br>
                <label>Do kiedy może zostać użyte to zaproszenie?</label>
                <input type="date" name="expDate" class="selectTeam"><br>
                <button type="submit" class="make">Stwórz</button>
            </form>

    </body>
</html>