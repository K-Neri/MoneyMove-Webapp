<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User account update</title>
	<link rel="icon" href='images/transferlogo.png'>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style>
		#admincreate{
			padding: 50px 0px;
		}
	</style>
</head>
<body>
	
	<?php 
	if(isset($_SESSION['admin']))
	{	
		include "includes/dbh.inc.php";
		include "includes/login.php";
		include "admin.nav.php";

		
	?>

	<div class="container">
		
		<div class="row" id="admincreate">
							<!-- EMPTY COLUMN FOR WELL ADJUSTING THE FORM -->
							<div class="col-md-2"></div>

							<!-- THE MAIN COLUMN CONTAINING THE FORM -->
							<div class="col-md-8">
								
								<form action="user.account.update.php" method="POST">


									<?php 
										$id=$_GET['update'];

										$sql="SELECT * FROM users WHERE id='$id'";
										$result=mysqli_query($conn, $sql);

										if($row= mysqli_fetch_assoc($result))
										{
									?>

									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $row['id']?>">
									<label>First Name</label>
									<input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo $row['fname']?>">
									</div>

									<div class="form-group">
										<label>Last Name</label>
										<input type="text" name="lname" placeholder="last Name" class="form-control" value="<?php echo $row['lname']?>">
									</div>

									<div class="form-group">
										<label>User Name</label>
										<input type="text" name="username" placeholder="user Name" class="form-control" value="<?php echo $row['username']?>">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" placeholder="email" class="form-control" value="<?php echo $row['email']?>">
									</div>

									<div class="form-group">
										<label>Password</label>
									<input type="password" name="pwd" placeholder="password" class="form-control">
									</div>

									<div class="form-group">
										<label>Role</label>
										<select class="form-control"  name="role">
											<option><?php echo $row['role']?></option>
											<option>Admin</option>
											<option>Teller</option>
										</select>
									</div>

									<div class="form-group">
										<label>Contact</label>
									<input type="text" name="phone" placeholder="phone number" class="form-control" value="<?php echo $row['contact']?>">
									</div>

									<div class="form-group">
										<label>Address</label>
									<input type="text" name="address" placeholder="address" class="form-control" value="<?php echo $row['address']?>">
									</div>

									<div class="form-group">
										<button type="submit" name="update" class="btn btn-warning btn-block"> UPDATE USER ACCOUNT</button>
									</div>
									<?php } ?>					
								</form>
							</div>
						</div>
	</div>
	<?php include "includes/footer.php"; 
	}
	else{
		header(("Location: ../index.php?banned"));
		exit();
	}
	?>
</body>
</html>