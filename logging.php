<?php 

$connectionInfo = array("UID" => "p!nk", "pwd" => "{P!ec23dekassojune16}", "Database" => "syntaskdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqlserverua7t63ihbdkxo.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if ( isset ( $_POST['uname'] ) && isset ( $_POST['password'] ) ) {

    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    $result = sqlsrv_query($conn,"SELECT * FROM [dbo].[syntaskuser] WHERE username='$uname' AND pass='$pass'");
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