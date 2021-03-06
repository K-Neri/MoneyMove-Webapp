<?php

	session_start();

	include "dbh.inc.php";

	$id = $_GET['id'];

	$sql = " DELETE FROM receive where id='$id'";
	mysqli_query($conn, $sql);

	header("location: adminreceiving.inc.php?receivedeling=success");
?>