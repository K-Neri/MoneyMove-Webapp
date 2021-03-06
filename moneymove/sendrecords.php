<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPDATE SENDING TRANSACTION</title>
		<link rel="stylesheet" type="text/css" href="../css/transfer.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<div class='maincontent'>
		<?php

			if(isset($_SESSION['admin']))
			{
				include 'includes/dbh.inc.php';
				include 'includes/login.php';
				include 'admin.nav.php';

				if(isset($_GET['update']))
				{
					$message = $_GET['update'];

					if($message == 'invalidchar')
					{
						echo'<div class="alert alert-danger">
							<p><strong>Error: </strong> Please use valid characters</p>
						</div>';
					}

					elseif($message == 'empty')
					{
						echo'<div class="alert alert-danger">
							<p><strong>Error: </strong> Please fill in all required input fields</p>
						</div>';
					}

					elseif($message == 'invalidemail')
					{
						echo'<div class="alert alert-danger">
							<p><strong>Error: </strong> Please use a valid email</p>
						</div>';
					}

					elseif($message == 'success')
					{
						echo'<div class="alert alert-success">
							<p><strong>Success: </strong> The record has been updated succesfully</p>
						</div>';
					}
				}

			?>
		
			<div class="header">
				<h1>MONEY MOVE UPDATE SENDING RECORDS </h1>
			</div>
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="bg-primary">
						<td>Transaction number</td>
						<td>Sender name</td>
						<td>Sender contact</td>
						<td>Sender address</td>
						<td>ID Type</td>
						<td>ID number</td>
						<td>Origin</td>
						<td>Receiver name</td>
						<td>Receiver contact</td>
						<td>Destination</td>
						<td>Amount</td>
						<td>Currency</td>
						<td>Edit</td>
						
					</tr>
				</thead>
			

			<?php
				$sql = "SELECT * FROM send";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);


				if($resultcheck < 1)
				{
			?>

			<?php
				echo '<td colspan=15><h1 class="text-danger text-center">No Record has found</h1></td>';
				}
				else{
					while($row=mysqli_fetch_assoc($result))
					{
			?>

				<tr class="bg-info">
					<input type="hidden" name="id" value="<?php echo $row['id']?>">
					<td><?php echo $row['code'] ?></td>
					<td><?php echo $row['s_name'] ?></td>
					<td><?php echo $row['s_contact'] ?></td>
					<td><?php echo $row['s_address'] ?></td>
					<td><?php echo $row['s_idtype'] ?></td>
					<td><?php echo $row['s_idnum'] ?></td>
					<td><?php echo $row['origin'] ?></td>
					<td><?php echo $row['r_name'] ?></td>
					<td><?php echo $row['r_contact'] ?></td>
					<td><?php echo $row['destination'] ?></td>
					<td><?php echo $row['amount'] ?></td>
					<td><?php echo $row['currency'] ?></td>
					<td>
						<a href="sendupdating.php?update=<?php echo $row['id'] ?>" class= "btn btn-info">Update</a>
					</td>
				</tr>
			<?php
					}
				}
			?>

			</table>
</div>
			<?php
			include 'includes/footer.php';
			}
			else{
				header("Location: index.php");
			}
		?>

	

	</body>
</html>


