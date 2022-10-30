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
"SELECT username FROM syntaskuser
JOIN member ON member.userid = syntaskuser.userid
JOIN team ON team.teamID = member.teamID
WHERE team.teamName = '".$_SESSION['tname']."';");

while ($row = $retval->fetch_assoc()) {
echo "<h2 class='member'><i class='fa-solid fa-user'></i> ".$row["username"]."</h2><br>";
}
?>