<?php
	session_start();

	include "dbh.inc.php";

	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

	if(isset($_POST['update']))
		{
		if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($pwd) || empty($confirmpwd) || empty($phone) || empty($address))
			{
				header("location: employee.update.php?update=empty");
				
			}
		else if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname))
			{
				header("location: employee.update.php?update=invalidchar");
				
			}
		else if(!filter_var("$email", FILTER_VALIDATE_EMAIL))
			{
				header("location: employee.update.php?update=invalidemail");
				
			}
		else if($pwd != $confirmpwd)
			{
				header("location: employee.update.php?update=passwordunmatch");
				
			}

		else{

			$sql = "SELECT * FROM users where id='$id'";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if($resultcheck > 1)
				{
					header("location: employee.update.php?update=usernametaken");
					
				}

			else{
					$sql = "UPDATE users SET fname='$fname', lname='$lname', username='$username', email='$email', password='$pwd', contact='$phone', address='$address' where id='$id' ";

					mysqli_query($conn, $sql);

					header("location: employee.update.php?update=success");
					
				}
			}
				
		}

	

	$sql = "SELECT * FROM users where id='$id'";

	$result= mysqli_query($conn, $sql);
		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ADMIN UPDATE TELLER ACCOUNT</title>
		<link rel="stylesheet" type="text/css" href="../css/adminpage.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>

		<?php include 'login.php'; ?>
		

		<div class="maincontent">
				<div class="row">
					
					<div class="col-md-2"></div> <!-- this is an empty column -->

					<div class="col-md-6 ">
						<h1>Welcome ADMIN!</h1>

						<h3>Update Teller Accounts</h3>					
						<form  method="POST">

						<?php

							while($row = $result->fetch_array())
							{
						?>
							<label>First name</label>
							<input type="text" name="fname"  class="form-control" value="<?php echo $row['fname']?>">

							<label>Last name</label>
							<input type="text" name="lname"  class="form-control" value="<?php echo $row['lname']?>">

							<label>User name</label>
							<input type="text" name="username"  class="form-control" value="<?php echo $row['username']?>">

							<label>Email</label>
							<input type="text" name="email"  class="form-control" value="<?php echo $row['email']?>">

							<label>Password</label>
							<input type="password" name="pwd"  class="form-control" value="<?php echo $row['password']?>">

							<label>Contact</label>
							<input type="text" name="phone"  class="form-control" value="<?php echo $row['contact']?>">

							<label>Address</label>
							<input type="text" name="address"  class="form-control" value="<?php echo $row['address']?>">
							

							<button type="submit" name="update" class="btn btn-info btn-block"> UPDATE TELLER ACCOUNT</button>

						</form>
					<?php 
						} //this closes the while loop

					?>
					</div>

					<div class="col-md-3"></div>
			</div>
		</div>

		<?php include 'footer.php'; ?>

	</body>
</html>

