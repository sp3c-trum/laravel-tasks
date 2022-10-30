<?php 
$serverName = "tcp:sqlserverua7t63ihbdkxo.database.windows.net,1433";
$connectionOptions = array("Database"=>"syntaskdb",
                           "UID"=>"p!nk",
                           "PWD" => "P!ec23dekassojune16");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}

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
echo "      <div class='group'>
        <h2>".$row["groupName"]."</h2>
        Z zespołu: ".$row["teamName"]."
        </div>";
}
?>

