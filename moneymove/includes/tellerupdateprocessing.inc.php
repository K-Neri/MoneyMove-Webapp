<?php

	session_start();
	include_once("dbh.inc.php");

	
	
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$confirmpwd = mysqli_real_escape_string($conn, $_POST['confirmpwd']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

	

	if(!isset($_POST['update']))
	{
		exit();
	}
	else{
		
	
		if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($pwd) || empty($confirmpwd) || empty($phone) || empty($address))
		{
			header("location: employee.inc.php?update=empty");
			exit();
		}
		else if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname))
		{
			header("location: employee.inc.php?update=invalidchar");
			exit();
		}
		else if(!filter_var("$email", FILTER_VALIDATE_EMAIL))
		{
			header("location: employee.inc.php?update=invalidemail");
			exit();
		}
		else if($pwd != $confirmpwd)
		{
			header("location: employee.inc.php?update=passwordunmatch");
			exit();
		}

		else{


			$sql = "SELECT * FROM employee where username='$username'";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if($resultcheck > 0)
			{
				header("location: employee.inc.php?update=usernametaken");
				exit();
			}

			else{

				$sql = " UPDATE employee SET fname='$fname', lname='$lname', username='$username', email='$email', password='$pwd', confirmpwd='$confirmpwd', contact='$phone', address='$address' where id='$id' ";

			mysqli_query($conn, $sql);

			header("location: employee.inc.php?update=success");

				
			}
		}
	
		


		
	}
?>

		

