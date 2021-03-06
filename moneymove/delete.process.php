<?php
	session_start();

	if(isset($_GET['delete']))
	{
		include 'includes/dbh.inc.php';
		$id = $_GET['delete'];

		$sql="DELETE FROM receive where id='$id'";
		mysqli_query($conn, $sql);
		header("Location: receivedeleting.php?delete=success");
	}
	else{
		header("Location: receivedeleting.php");
	}