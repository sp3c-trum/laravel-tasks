<?php 
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borowieckoperwojcikowska1p";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

    $taskname = $_POST['taskName'];
    $taskDesc = $_POST['taskDesc'];
    $dueDate = $_POST['dueDate'];
    $group = $_POST['groupselect'];
    $username = $_SESSION['username'];

    if (empty($taskname)) {
        header("Location: makeZad.php?error=Task name is required");
        exit();
    }else if(empty($taskDesc)){
        header("Location: makeZad.php?error=Task description is required");
        exit();
    }else if(empty($dueDate)){
        header("Location: makeZad.php?error=Due date is required");
        exit();
    }
    else{

        $sql = "INSERT INTO task VALUES (null, '$taskname', '$taskDesc', null, '$dueDate')";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM xgroup WHERE groupName = '$group'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $groupid = $row['groupID'];

        $sql = "SELECT * FROM task WHERE taskname = '$taskname'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $taskid = $row['taskID'];

        $sql = "INSERT INTO grouptask VALUES (null, '$groupid', '$taskid')";
        $result = mysqli_query($conn, $sql);

        header("Location: makeZad.php?error=Pomyślnie stworzono Zadanie!");
    }
?>