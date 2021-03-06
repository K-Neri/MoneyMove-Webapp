<?php

	session_start();

	if(isset($_GET['id'])){
		include "dbh.inc.php";

		$id = $_GET['id'];

		$sql = "DELETE FROM users where id='$id'";
		mysqli_query($conn, $sql);

		header("location: ../accounts.delete.php?delete=success");
	}
	else{
		header("location: ../accounts.delete.php");
	}

	

?>