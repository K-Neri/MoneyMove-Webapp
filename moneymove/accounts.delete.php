<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPDATE TELLER ACCOUNT</title>
		<link rel="stylesheet" type="text/css" href="../css/adminpage.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href=" ../css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href=" bootstrap/css/bootstrap.min.css">

	</head>
	<body>
		<div class="maincontent">
		<?php 
		// GIVE ACCESS ONLY ON THE ADMINISTRATORS 
		if(isset($_SESSION['admin']))
		{	
			include 'includes/dbh.inc.php';
			include 'includes/login.php';
			include "admin.nav.php";

			if(isset($_GET['delete']))
			{
				$message= $_GET['delete'];

				if($message == "success")
				{
					echo '<div class="alert alert-danger">
							<p><strong>Delete: </strong> The account has been removed Successfully</p>
						</div>';		
				}
			}
		?>

		
			<div class="records">
				<h1 style="font-family: georgian; text-align: center">TELLER ACCOUNTS</h1>

				<table class="table table-hover table-bordered" style="font-family: georgian;">
					<thead style="text-align: center">
						<tr class="bg-primary" >
							<th>First Name</th>
							<th>Last Name</th>
							<th>User Name</th>
							<th>Email </th>
							<th>Role </th>
							<th>PASSWORD</th>
							<th>contact</th>
							<th>Address</th>
							<th colspan="2">Edit</th>
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
							<a href="includes/tellerdelete.inc.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
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
		// WHEN NOT LOGGED IN AS ADMIN THIS WILL BE EXECUTED
		else{
			header("LOcation: ../index.php?banned");
		}
		?>

		
	</body>
</html>