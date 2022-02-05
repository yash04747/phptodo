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
 
if (isset($_POST['submit']))

	{
		if (empty($_POST['task'])) {
			$errors = "Y    ou must fill in the task";
		
		}

		else
		{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: todolist.php');
		
			}
	
	}
	
     if(isset($_GET['deltask']))

	 {
		$id = $_GET['deltask'];
		mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
	header('location: todolist.php');
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
	<form method="post" action="todolist.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add">Add Task</button>
	</form>
	<table border = 1>
		<thead>
			<tr>
				<td>Number</td>
				<td>Tasks</td>
				<td>Operation</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		 
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>

			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task'];  ?> </td>
				<td class="delete"> 
					<a href="todolist.php? deltask=<?php echo $row['id'] ?>">x</a> 
				</td>
				<td class="delete"> 
					<a href="edit.php? id=<?php echo $row['id']  ?>">update</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
	</table>
</body>
</html>