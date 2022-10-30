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
"SELECT team.teamName, invite.* FROM invite
JOIN team on invite.teamid = team.teamid
JOIN member ON team.teamID = member.teamID
JOIN syntaskuser ON syntaskuser.userid = member.userid
WHERE member.userid = ".$_SESSION['userID']);

while ($row = $retval->fetch_assoc()) {
echo "<li><h1>".$row["inviteLink"]." - Do zespołu ".$row["teamName"]."</h1><button type='button' class='collapsible'>Rozwiń</button>
<div class='content'><br><br>Data ważności: ".$row["expDate"]."<br>Liczba użyć: ".$row["uses"]."</div></li>
      ";
}
?>