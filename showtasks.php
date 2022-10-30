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
"SELECT taskname, taskdesc, duedate, groupname, teamname FROM task
JOIN grouptask ON task.taskID = grouptask.taskid
JOIN xgroup ON xgroup.groupid = grouptask.groupid
JOIN teamgroup ON teamgroup.groupid = xgroup.groupid
JOIN team on teamgroup.teamid = team.teamid
JOIN member ON team.teamID = member.teamID
JOIN syntaskuser ON syntaskuser.userid = member.userid
WHERE member.userid = ".$_SESSION['userID']);

while ($row = $retval->fetch_assoc()) {
echo "<li><h1>".$row["taskname"]."</h1><button type='button' class='collapsible'>Rozwiń</button>
<div class='content'>".$row["taskdesc"]."<br><br>Termin wykonania: ".$row["duedate"]."<br>Zadanie należy do grupy ".$row["groupname"]." z zespołu ".$row["teamname"]."</div></li>
      ";
}
?>