<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$retval = mysqli_query($conn, 
"SELECT teamName FROM team
JOIN member ON team.teamID = member.teamID
JOIN syntaskuser ON syntaskuser.userid = member.userid
WHERE member.userid = ".$_SESSION['userID']);



while ($row = $retval->fetch_assoc()) {

$letters = explode(" ", $row["teamName"]);
$acronym = "";

foreach ($letters as $l) {
  $acronym .= strtoupper($l[0]);
}

echo "<div class='team' style='font-size:30px;''>
            <div class='team-items'><i class='fa-solid fa-people-group icon'></i>
            <form method='get' action='members.php'>
                <input type='submit' name='tname' class='Tmake' value='".$row["teamName"]."'>
            </form>
            </div>
        </div>";
}

?>