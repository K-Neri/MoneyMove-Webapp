<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>DELETING SENDING TRANSACTION</title>
		<link rel="stylesheet" type="text/css" href="../css/transfer.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		
		<?php

			if(isset($_SESSION['admin']))
			{
				include 'includes/dbh.inc.php';
				include 'includes/login.php';
				include 'admin.nav.php';

				if(isset($_SESSION['deletion'])){
					
						echo '<div class="alert alert-danger"><strong> Delete: </strong>'.$_SESSION['deletion'].'</div>';
						unset($_SESSION['deletion']);
					}
					
				

			?>
			<div class="maincontent">
			<div class="header">
				<h1>MONEY MOVE DELETE SENDING RECORDS </h1>
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
				echo '<tr >
						<td colspan="13" class="text-danger text-center"><h1>No records found</h1></td>
					  </tr>';
				}
				else{
					while($row=mysqli_fetch_assoc($result))
					{
			?>

				<tr class="bg-info">
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
						<a href="senddeleting.process.php?delete=<?php echo $row['id']  ?>" class= "btn btn-danger">Delete</a>
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