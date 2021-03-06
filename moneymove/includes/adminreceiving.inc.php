<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPDATE RECEIVE TRANSACTION</title>
		<link rel="stylesheet" type="text/css" href="../css/transfer.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		
		<?php

			if(isset($_SESSION['admin']))
			{
				include 'includes/dbh.inc.php';
				include 'includes/login.php';
				include 'admin.nav.php';

			?>

			<div class="header">
				<h1>MONEY MOVE DELETE RECEIVING RECORDS </h1>
			</div>
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="bg-primary">
						<td>Transaction number</td>
						<td>Receiver name</td>
						<td>Receiver contact</td>
						<td>Receiver address</td>
						<td>ID Type</td>
						<td>ID number</td>
						<td>Origin</td>
						<td>Sender name</td>
						<td>Sender contact</td>
						<td>Destination</td>
						<td>Amount</td>
						<td>Currency</td>
						<td>Edit</td>
						
					</tr>
				</thead>
			

			<?php
				$sql = "SELECT * FROM receive";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);


				if($resultcheck < 1)
				{
			?>

			<?php
				echo '<tr>
						<td class="text-danger">No records found</td>
					  </tr>';
				}
				else{
					while($row=mysqli_fetch_assoc($result))
					{
			?>

				<tr class="bg-info">
					<td><?php echo $row['code'] ?></td>
					<td><?php echo $row['r_name'] ?></td>
					<td><?php echo $row['r_contact'] ?></td>
					<td><?php echo $row['r_address'] ?></td>
					<td><?php echo $row['r_idtype'] ?></td>
					<td><?php echo $row['r_idnum'] ?></td>
					<td><?php echo $row['origin'] ?></td>
					<td><?php echo $row['s_name'] ?></td>
					<td><?php echo $row['s_contact'] ?></td>
					<td><?php echo $row['destination'] ?></td>
					<td><?php echo $row['amount'] ?></td>
					<td><?php echo $row['currency'] ?></td>
					<td>
						<a href="" class= "btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php
					}
				}
			?>

			</table>

			<?php
			include 'includes/footer.php';
			}
			else{
				header("Location: index.php");
			}
		?>

	

	</body>
</html>


