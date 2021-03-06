<?php
	session_start();
	if(isset($_GET['delete']))
	{
		include "includes/dbh.inc.php";
		$id=$_GET['delete'];
		
		$sql=" DELETE FROM send WHERE id='$id'";
		mysqli_query($conn, $sql);

		$_SESSION['deletion']= 'The Record has been removed successfully';

		header("Location: senddeleting.php?delete=success");
	}
	else{
		header("Location: senddeleting.php");
	}


?>