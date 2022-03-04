<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'todolist') or die (mysqli_error($mysqli));

$id = 0;
$tasks ="";
$describe ="";
$completed =false;
$update =false;

if (isset($_POST['save'])){
    $tasks = $_POST['task'];
    $describe = $_POST['describe'];

    $mysqli->query("INSERT INTO todolist (tasks, describer) VALUES('$tasks', '$describe')") or die($mysqli->error);

    $_SESSION['message'] = "Task successfully added.";
    $_SESSION['msg_type'] = "sucess";

    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $mysqli->query("DELETE FROM todolist WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Task successfully removed.";
    $_SESSION['msg_type'] = "alert";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result =   $mysqli->query("SELECT * FROM todolist WHERE id=$id") or die($mysqli->error);
        $row = $result->fetch_array();
        $tasks = $row['tasks'];
        $describe = $row ['describer'];
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $tasks = $_POST['task'];
    $describe = $_POST['describe'];

    $mysqli->query("UPDATE todolist SET tasks='$tasks', describer='$describe' WHERE id=$id") or die($mysqli->error);
    header("location: index.php");
}

    
 if (isset($_GET['complete_id'])){
    $id = $_GET['complete_id']; 
    $completed = true;

     $mysqli->query("UPDATE todolist SET completed=$completed WHERE id=$id") or die($mysqli->error);
     header("location: index.php");
 }


?>