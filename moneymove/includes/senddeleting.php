<?php

	session_start();

	include "dbh.inc.php";

	$id = $_GET['id'];

	$sql = " DELETE FROM send where id='$id' ";

	mysqli_query($conn, $sql);

	header("location: adminsending.inc.php?delete=success");


?>
