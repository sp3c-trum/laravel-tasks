<?php 

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "/home/site/wwwroot/ssl/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "msdocs-laravel-mysql-syn-server.mysql.database.azure.com", "yvztuwpien", "3FF78J778P585S76$", "syntaskdb", 3306, MYSQLI_CLIENT_SSL);

if ( isset ( $_POST['uname'] ) && isset ( $_POST['password'] ) ) {

    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    $result = sqlsrv_query($conn,"SELECT * FROM syntaskuser WHERE username='$uname' AND pass='$pass'");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['pass'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['userID'] = $row['userID'];
                header("Location: zesp.php");
                exit();
                
        }else{
            header("Location: index.php?error=Incorect User name or password");
            mysqli_close($conn);
            exit();
        }
    }else{
    header("Location: index.php");
    mysqli_close($conn);
    exit();
}
?>