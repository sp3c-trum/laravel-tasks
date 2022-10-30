<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$retval = mysqli_query($conn, 
"SELECT * FROM xgroup
JOIN teamGroup ON xgroup.groupID = teamgroup.groupid
JOIN team ON team.teamID = teamgroup.teamid
JOIN member ON team.teamID = member.teamID
JOIN syntaskuser ON syntaskuser.userid = member.userid
WHERE member.userid = ".$_SESSION['userID']);

while ($row = $retval->fetch_assoc()) {
echo "<option value='".$row['groupName']."''>".$row["groupName"]." - z zespołu ".$row['teamName']."</option>";
}
?>