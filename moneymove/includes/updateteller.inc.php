<?php

		session_start();
		include "dbh.inc.php";

		
		
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$confirmpwd = mysqli_real_escape_string($conn, $_POST['confirmpwd']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);

		$sql = " UPDATE employee SET fname='$fname', lname='$lname', username='$username', email='$email', password='$pwd', confirmpwd='$confirmpwd', contact='$phone', address='$address' where id='$id' ";

			mysqli_query($conn, $sql);

			header("location: employee.inc.php");
?>