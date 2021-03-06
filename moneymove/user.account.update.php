<?php

if(isset($_POST['update']))
{
	include "includes/dbh.inc.php";

	$id= mysqli_real_escape_string($conn, $_POST['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$userrole = mysqli_real_escape_string($conn, $_POST['role']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

	


		
	
		if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($pwd) || empty($userrole) || empty($phone) || empty($address))
		{

			header("location: accounts.update.php?update=empty");
			exit();
		}
		else if(!preg_match("/^[a-zA-Z]*$/", $fname))
		{
			header("location: accounts.update.php?update=invalidchar");
			exit();
		}
		else if(!filter_var("$email", FILTER_VALIDATE_EMAIL))
		{
			header("location: accounts.update.php?update=invalidemail");
			exit();
		}
		

		else{


			$sql="UPDATE users SET fname='$fname', lname='$lname', username='$username', email='$email', password='$pwd', role='$userrole', contact='$phone', address='$address' WHERE id='$id'";

			mysqli_query($conn, $sql);

			header("Location: accounts.update.php?update=success");
			
		}


}
else{
	header("Location: user.update.php");
}


?>