<?php
$conn= mysqli_connect("localhost", "root", "", "CRUD");

	if(isset($_GET['delete']))
	{
		

		$id=$_GET['delete'];

		$sql="DELETE FROM crud where id='$id'";
		mysqli_query($conn, $sql);

		header("Location: crud.php?delete=success");
	}

?>