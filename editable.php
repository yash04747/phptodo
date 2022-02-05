<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

$db = mysqli_connect($servername, $username, $password,$dbname);


if (!$db) 
{
  die("Connection failed: " . mysqli_connect_error());
}
       $id=$_POST['id'];
       $title=$_POST['task'];
       
    $sql="UPDATE tasks SET task='$title' WHERE id=$id";
    $result=mysqli_query($db, $sql);

    header('location: todolist.php');

?>