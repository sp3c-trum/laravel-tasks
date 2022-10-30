<?php 
session_start(); 

$serverName = "tcp:sqlserverua7t63ihbdkxo.database.windows.net,1433";
$connectionOptions = array("Database"=>"syntaskdb",
                           "UID"=>"p!nk",
                           "PWD" => "P!ec23dekassojune16");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $sql = mysqli_query("SELECT * FROM syntaskuser WHERE username='$uname' AND pass='$pass'");
    $result = mysqli_query($conn, $sql);

    $query = mysqli_query($conn, "SELECT * FROM syntaskuser WHERE username='$uname'");
    if(mysqli_num_rows($query) > 0){
        header("Location: reg.php?error=Ta nazwa użytkownika już istnieje!");
        exit();
    }else{

        if (empty($uname)) {
            header("Location: reg.php?error=User Name is required");
            exit();
        }else if(empty($pass)){
            header("Location: reg.php?error=Password is required");
            exit();
        }else if(empty($pass_confirm)){
            header("Location: reg.php?error=Password confirm is required");
            exit();
        }
        else if(empty($email)){
            header("Location: reg.php?error=Email is required");
            exit();
        }
        else if($pass_confirm !== $pass){
            header("Location: reg.php?error=Passwords should match!");
            exit();
        }
        else{

            $sql = "INSERT INTO syntaskuser VALUES (null, '$uname', '$pass', '$email')";
            $result = mysqli_query($conn, $sql);
            header("Location: reg.php?error=Utworzono użytkownika!");
        }
        mysqli_close($conn);
    }
}
    mysqli_close($conn);
?>