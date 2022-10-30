<?php 
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['name'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $name = validate($_POST['name']);
    $invite = $generatedlink;
    $uses = $_SESSION['username'];
    $username = $_SESSION['username'];
    $expdate = $_SESSION['username'];

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

        $sql = "INSERT INTO xgroup VALUES (null, '$name Administratorzy')";
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

<?php 
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";
$conn = new mysqli($servername, $username, $password, $dbname);

    $team = $_POST['team'];
    $invite = $_POST['invite'];
    $uses = $_POST['uses'];
    $username = $_SESSION['username'];
    $expdate = $_POST['expDate'];

    $query = mysqli_query($conn, "SELECT * FROM syntaskuser WHERE invite='$invite'");
    if(mysqli_num_rows($query) > 0){
        header("Location: tworzZapro.php?error=Ten invite już istnieje!");
        exit();
    }else{

        if (empty($invite)) {
            header("Location: tworzZapro.php?error=Invite is required");
            exit();
        }else if(empty($uses)){
            header("Location: tworzZapro.php?error=Number of uses is required");
            exit();
        }else if(empty($expdate)){
            header("Location: tworzZapro.php?error=Expiration date is required");
            exit();
        }
        else{

            $sql = "SELECT * FROM team WHERE teamName = '$team'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $teamid = $row['teamID'];

            $sql = "SELECT * FROM member JOIN syntaskuser ON member.userid = syntaskuser.userid WHERE username = '$username' AND teamID = '$teamid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $memberid = $row['memberID'];

            $sql = "INSERT INTO invite VALUES (null, '$teamid', '$invite', '$expdate', '$memberid', '$uses')";
            $result = mysqli_query($conn, $sql);
            header("Location: tworzZapro.php?error=Utworzono Invite!");
        }

    }
?>