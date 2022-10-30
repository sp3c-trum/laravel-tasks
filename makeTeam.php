<?php 
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

//Generowanie randomowych linków
$generated = '';
function getRandomLink(){
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    for ($i = 0; $i < 8; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
$generatedlink = getRandomLink();

if (isset($_POST['name'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $name = strtolower(validate($_POST['name']));
    $invite = $generatedlink;
    $uses = 99999;
    $username = $_SESSION['username'];
    $expdate = '2099-01-01';

    if (empty($name)) {
        header("Location: makeZesp.php?error=Name is required");
        exit();
    }
    else{
        $sql = "INSERT INTO team VALUES (null, '$name');";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM team WHERE teamName = '$name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $teamid = $row['teamID'];

        $sql = "SELECT * FROM syntaskuser WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $userid = $row['userID'];

        $sql = "INSERT INTO member VALUES (null, '$teamid', '$userid');";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM member JOIN syntaskuser ON member.userid = syntaskuser.userid WHERE username = '$username' AND teamID = '$teamid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $memberid = $row['memberID'];

        $sql = "INSERT INTO invite VALUES (null, '$teamid', '$invite', '$expdate', '$memberid', '$uses')";
        $result = mysqli_query($conn, $sql);

        $sql = "INSERT INTO xgroup VALUES (null, '$name administrator')";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT MAX(groupID) AS groupID from xgroup LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $groupid = $row['groupID'];

        $sql = "INSERT INTO teamGroup VALUES (null, '$teamid', '$groupid')";
        $result = mysqli_query($conn, $sql);

        $sql = "INSERT INTO permission VALUES (null, 'Admin', '$userid', '$teamid', '$groupid')";
        $result = mysqli_query($conn, $sql);

        header("Location: makeZesp.php?error=Pomyślnie stworzono zespół! Kod dołączenia to: ".$invite);
    }
}
?>