<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
        <link rel='icon' type='image/png' href='favicon.ico'>
    </head>
    <body>
        <div id="login">
            <br><br><br>
            <div id="login-form">
                <img src="img/logo.png"><br>
                <br>
                <form action="logging.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <p class="dberror"><?php echo $_GET['dberror']; ?></p>
                    <?php } ?>  
                    <input type="text" name="uname" placeholder="Nazwa użytkownika"><br>
                    <input type="password" name="password" placeholder=" Hasło"><br>
                    <button type="submit" class="make">Zaloguj się</button>
                </form>
                <br>Nie masz konta?<br> 
                <button class="register"><a href="reg.php">Zarejestruj się!</a></button><br>
                <i>Development Build 0.06.1.12 / AzureSQL Version</i><br>
            </div>
            </div>
    </body>
</html>