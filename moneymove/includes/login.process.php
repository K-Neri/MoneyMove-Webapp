<?php

	session_start();
	
	if(isset($_POST['login']))
	{
		include "dbh.inc.php";

		$user_name= mysqli_real_escape_string($conn, $_POST['user']);
		$user_pwd= mysqli_real_escape_string($conn, $_POST['password']);

		if(empty($user_name)||empty($user_pwd))
		{ 
			$_SESSION['error']= 'Please fill in all input fields';
			header("Location: ../index.php?signin=empty");
			exit();
		}
		else
		{
			$sql= "SELECT * FROM users where email='$user_name' or username='$user_name' ";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if($resultcheck > 0)
			{
				
				if($row = mysqli_fetch_assoc($result))
				{
					if($row['role'] == 'Admin' && $user_pwd == $row['password'])
					{
						$_SESSION['admin'] = $row['role'];
						$_SESSION['user_uid'] = $row['username'];
						$_SESSION['email']= $row['email'];
						$_SESSION['F_name'] = $row['fname'];
						$_SESSION['L_name']= $row['lname'];
						
						header("Location:../admin.php?admin=success");
						exit();
					}
					elseif($row['role'] == 'Teller' && $user_pwd == $row['password'])
					{
						$_SESSION['teller'] = $row['id'];
						$_SESSION['uid'] = $row['username'];
						$_SESSION['email']= $row['email'];
						$_SESSION['F_name'] = $row['fname'];
						$_SESSION['L_name']= $row['lname'];

						header("Location:../selectoption.php?teller=success");
						exit();
					}
					elseif($user_pwd != $row['password'])
					{
						$_SESSION['error']= 'Your crendentials are not correct';
						header("Location:../index.php?signin=error");
						exit();
					}
					else{
						header("Location:../index.php?signin=error");
						exit();
					}
				}
			}
			else
			{
				$_SESSION['error']= "The User name or Email doesn't exist";
				header("Location:../index.php?signin=unavailable");
				exit();
			}
		}
	}
	else{
		header("Location:../index.php");
		exit();
	}
	
	
?>