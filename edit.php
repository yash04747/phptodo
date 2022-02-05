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
$id=$_GET['id'];
$sql="SELECT * FROM tasks WHERE id=".$id;

      $result = mysqli_query($db, $sql);

if($result){   
    $row=mysqli_fetch_assoc($result);

       $task=$row['task'];


}


	
	 
?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application </title>
</head>
<body>

<style>
	.heading
	{
	width: 50%;
	margin: 30px auto;
	text-align: center;
	color: 	white;
	background:  black;
	border: 2px solid #6B8E23;
	border-radius: 20px;
}
form {

	width: 50%; 
	margin: 30px auto; 
	border-radius: 5px; 
	padding: 10px;
	background: black;
	border: 1px solid black;
}
form p {
	color: red;
	margin: 0px;
}
.task_input {
	width: 75%;
	height: 15px; 
	padding: 10px;
	border: 2px solid ;
}
.add {
	height: 39px;
	background: white;
	color: 	black;
	border: 2px solid black;
	border-radius: 5px; 
	padding: 5px 20px;
}

table {
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
}

tr {
	border-bottom: 1px solid #cbcbcb;
}

th {
	font-size: 19px;
	color: #6B8E23;
}

th, td{
	border: none;
    height: 30px;
    padding: 2px;
}

tr:hover {
	background: #E9E9E9;
}

.task {
	text-align: left;
}


.delete a{
	color: white;
	background: #a52a2a;
	padding: 1px 5px;
	border-radius: 3px;
	text-decoration: none;
}
</style>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application </h2>
	</div>                                                                                        
	<form method="post" action="editable.php" class="input_form">
		<input type="text" name="task" class="task_input" value="<?php global $task; echo $task ?>" >
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

		<button type="submit" name="submit" id="add_btn" class="add">Add Task</button>
	</form>
	
	</tbody>
	</table>
</body>
</html>