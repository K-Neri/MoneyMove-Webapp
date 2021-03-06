<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create accounts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href='images/transferlogo.png'>
	<link rel="stylesheet" type="text/css" href="css/admindashboard.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	
	<?php
		if(isset($_SESSION['admin']))
		{
			include "includes/dbh.inc.php";
			include "includes/login.php";
			include "admin.nav.php";

			if(isset($_GET['signup']))
			{
				$message= $_GET['signup'];

				if($message == 'empty')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>Please fill in all required input field</p>
						  </div>';	
				}
				elseif($message == 'invalidchar')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>Please use valid characters</p>
						  </div>';
				}
				elseif($message == 'invalidemail')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>Please use a valid Email</p>
						  </div>';
				}
				elseif($message == 'usernametaken')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>The username has already taken</p>
						  </div>';
				}
				elseif($message == 'success')
				{
					echo '<div class="alert alert-success">
							<p><strong>Success: </strong>The account has been created successfully</p>
						  </div>';
				}
			}

	?>	
			<div class="container">
			
						<div class="row" id="admincreate">
							<!-- EMPTY COLUMN FOR WELL ADJUSTING THE FORM -->
							<div class="col-md-2"></div>

							<!-- THE MAIN COLUMN CONTAINING THE FORM -->
							<div class="col-md-8">
								<?php
								echo'<h1>WELCOME '. $_SESSION['F_name']. '&nbsp' . $_SESSION['L_name'].'</h1>
								<h3>Create New Account </h3>' ?>
								<form action="includes/admin.inc.php" method="POST">
									<div class="form-group">
									<label>First Name</label>
									<input type="text" name="fname" placeholder="First Name" class="form-control">
									</div>

									<div class="form-group">
										<label>Last Name</label>
										<input type="text" name="lname" placeholder="last Name" class="form-control">
									</div>

									<div class="form-group">
										<label>User Name</label>
										<input type="text" name="username" placeholder="user Name" class="form-control">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" placeholder="email" class="form-control">
									</div>

									<div class="form-group">
										<label>Password</label>
									<input type="password" name="pwd" placeholder="password" class="form-control">
									</div>

									<div class="form-group">
										<label>Role</label>
										<select class="form-control"  name="role">
											<option></option>
											<option>Admin</option>
											<option>Teller</option>
										</select>
									</div>

									<div class="form-group">
										<label>Contact</label>
									<input type="text" name="phone" placeholder="phone number" class="form-control">
									</div>

									<div class="form-group">
										<label>Address</label>
									<input type="text" name="address" placeholder="address" class="form-control">
									</div>

									<div class="form-group">
										<button type="submit" name="signup" class="btn btn-primary btn-block"> REGISTER NEW TELLER</button>
									</div>					
								</form>
							</div>
						</div>
					</div>

	<?php
		include 'includes/footer.php';				
		}
		else
		{
			header("Location: ../index.php?banned");
		}
	?>

	
</body>
</html>