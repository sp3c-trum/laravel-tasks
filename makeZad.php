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
                <a class="navButton current" href="zadania.php">Zadania</a>
                <a class="navButton" href="zaproszenia.php">Zaproszenia</a>
                <a class="greet"><?php echo "Witaj, ".$_SESSION['username']; ?></a>
                <a class="loginButton" href="logout.php">Wyloguj się</a>
        </div><br>
        <h1>Stwórz zadanie:</h1>
            <form action="task.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label>Do jakiej grupy chcesz utworzyć zadanie?</label><br>
                <select name="groupselect" class="gselect">
                <?php include("showGroupsInSelect.php");?>
                </select><br>
                <label>Nazwa zadania:</label><br>
                <input type="text" name="taskName" class="gselect"><br>
                <label>Opis zadania:</label><br>
                <textarea name="taskDesc" rows="4" cols="60" class="gselect">Opis zadania</textarea><br>
                <label>Do kiedy jest to zadanie?</label><br>
                <input type="date" name="dueDate" class="gselect"><br>
                <button type="submit" class="make">Stwórz</button>
            </form>

    </body>
</html>