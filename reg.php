<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="styles1.css">
        <link rel="stylesheet" href="login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="login">
            <br><br><br><br><br>
            <div class="registerform">
                <h1>Rejestracja</h1><br>
                <form action="register.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="dberror"><?php echo $_GET['dberror']; ?></p>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <input type="text" name="uname" placeholder="Nazwa użytkownika"><br>
                    <input type="email" name="email" placeholder="Email"><br>
                    <input type="password" name="password" placeholder="Hasło"><br>
                    <input type="password" name="password_confirm" placeholder="Powtórz hasło"><br>
                    <button type="submit" class="make">Zarejestruj</button>
                </form>
                <a href="index.php"><button class="back">Wróć</button></a>
            </div>
        </div>
    </body>
</html>