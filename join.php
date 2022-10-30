<?php 
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['invite'])) {

    $invite = $_POST['invite'];
    $username = $_SESSION['username'];

    if (empty($invite)) {
        header("Location: joinZesp.php?error=Invite is required");
        exit();
    }
    else{
        $sql = "SELECT team.teamName FROM member 
        join team ON member.teamid = team.teamid
        join syntaskuser ON member.userid = syntaskuser.userid
        WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $state = $row['teamName'];

        header($state);
        header("test");

        $sql = "SELECT * FROM syntaskuser WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $userid = $row['userID'];

        $sql = "SELECT * FROM invite JOIN team ON invite.teamid = team.teamid WHERE inviteLink = '$invite'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $teamid = $row['teamID'];


        $sql = "INSERT INTO member VALUES (null, '$teamid', '$userid');";
        $result = mysqli_query($conn, $sql);

        header("Location: joinZesp.php?error=Dołączono do zespołu!");
        mysqli_close($conn);
    }
}
?>