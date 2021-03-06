<?php

	session_start();

	include_once("dbh.inc.php");

	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$confirmpwd = mysqli_real_escape_string($conn, $_POST['confirmpwd']);
	$userrole = mysqli_real_escape_string($conn, $_POST['role']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

	

	if(!isset($_POST['signup']))
	{
		header("location:../admin.create.php");
		exit();
	}
	else{
		
	
		if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($pwd) || empty($userrole) || empty($phone) || empty($address))
		{
			header("location: ../admin.create.php?signup=empty");
			exit();
		}
		else if(!preg_match("/^[a-zA-Z]*$/", $fname))
		{
			header("location: ../admin.create.php?signup=invalidchar");
			exit();
		}
		else if(!filter_var("$email", FILTER_VALIDATE_EMAIL))
		{
			header("location: ../admin.create.php?signup=invalidemail");
			exit();
		}
		

		else{


			$sql = "SELECT * FROM users where username='$username'";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if($resultcheck > 0)
			{
				header("location: ../admin.create.php?signup=usernametaken");
				exit();
			}

			else{

				$sql = "INSERT INTO users (fname, lname, username, email, password, role, contact, address) VALUES ('$fname', '$lname', '$username', '$email', '$pwd', '$userrole', '$phone', '$address');";

				mysqli_query($conn, $sql);

				header("location: ../admin.create.php?signup=success");
				exit();
			}
		}
	
		


		
	}
?>