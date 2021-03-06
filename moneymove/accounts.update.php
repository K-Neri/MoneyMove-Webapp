<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPDATE TELLER ACCOUNT</title>
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="../css/adminpage.css">
		<link rel="stylesheet" type="text/css" href=" ../css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href=" bootstrap/css/bootstrap.min.css">

	</head>
	<body>
		<div class="maincontent">
		<?php 
		if(isset($_SESSION['admin']))
		{
			include_once 'includes/login.php';
			include "admin.nav.php";
			if(isset($_GET['update'])) 
			{
				$message= $_GET['update'];

				if($message=='empty')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>Please fill in all required input fields</p>
						  </div>';	
				}
				if($message=='invalidchar')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>Please use valid characters</p>
						  </div>';	
				}
				if($message=='invalidemail')
				{
					echo '<div class="alert alert-danger">
							<p><strong>Error: </strong>Please use valid Email</p>
						  </div>';	
				}
				if($message=='success')
				{
					echo '<div class="alert alert-success">
							<p><strong>Success: </strong>The account has been updated successfully</p>
						  </div>';	
				}
			}
		?>
			
		
			<div class="records">
				<h1 style="font-family: georgian; text-align: center">USERS ACCOUNTS</h1>

				<table class="table table-hover table-bordered" style="font-family: georgian;">
					<thead style="text-align: center">
						<tr class="bg-primary" >
							<th>First Name</th>
							<th>Last Name</th>
							<th>User Name</th>
							<th>Email </th>
							<th>Role </th>
							<th>Password</th>
							<th>contact</th>
							<th>Address</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
					<?php

						include "includes/dbh.inc.php";

						$sql = "SELECT * FROM users";
						$result = mysqli_query($conn, $sql);

						while($row = $result->fetch_assoc())
						{

					?>
					<tr class="bg-success">
						<td><?php echo $row['fname']?></td>
						<td><?php echo $row['lname']?></td>
						<td><?php echo $row['username']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['role']?></td>
						<td><?php echo $row['password']?></td>
						<td><?php echo $row['contact']?></td> 
						<td><?php echo $row['address']?></td>
						<td>
							<a href="user.update.php?update=<?php echo $row['id']?> " class="btn btn-info" name="update">Update</a>
						</td>
					</tr>
				<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

			<?php 
			include_once 'includes/footer.php';
		}
		else
		{
			header("Location: ../index.php?banned");
			exit();
		}
	?>

		
	</body>
</html>