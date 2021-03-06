
<!DOCTYPE html>
<html>
	<head>
		<title>VIEW RECEIVING RECORDS</title>
		<link rel="stylesheet" type="text/css" href="../css/adminpage.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
		
		<?php include "login.php"; ?>
		
		
			<h1 style="font-family: georgian; text-align: center">RECEIVING RECORDS</h1>
			
			<div class="dbrecords">
				<?php

					

					$sql = "SELECT * FROM receive ORDER BY receiving_time DESC";
					$result = mysqli_query($conn, $sql);

					$resultcheck = mysqli_num_rows($result)
					

				?>
					<table class="table  table-condensed table-hover table-bordered" style="font-family: georgian;">
						<thead style="text-align: center; color: red">
							<tr class="bg-primary">
								<th>ID</th>
								<th title="Sending time">Receiving time</th>
								<th>Transaction Code</th>
								<th>Receiver Names</th>
								<th>Origin</th>
								<th>Receiver phone</th>
								<th>Receiver address</th>
								<th>ID Type</th>
								<th>ID Number</th>
								<th>Sender names</th>
								<th>Sender phone</th>
								<th>Destination</th>
								<th>Amount</th>
								<th>Currency</th>
								<th colspan="2">EDIT</th>	
							</tr>
						</thead>

				<?php

					while($row = $result->fetch_assoc())
					{
				?>
		
				<tbody style="font-weight: bold">
					<tr class="bg-success">
						<td title="id"><?php echo $row['id']?></td>
						<td title="sending time"><?php echo $row['receiving_time']?></td>
						<td title="code"><?php echo $row['code']?></td>
						<td title="sendername"><?php echo $row['r_name']?></td>
						<td title="Origin"><?php echo $row['origin']?></td>
						<td title="receiverphone"><?php echo $row['r_contact']?></td>
						<td title="receiveraddress"><?php echo $row['r_address']?></td>
						<td title="IDtype"><?php echo $row['r_idtype']?></td>
						<td title="IDnumber"><?php echo $row['r_idnum']?></td>
						<td title="Sendername"><?php echo $row['s_name']?></td>
						<td title="Senderphone"><?php echo $row['s_contact']?></td>
						<td title="destination"><?php echo $row['destination']?></td>
						<td title="amount"><?php echo $row['amount']?></td>
						<td title="currency"><?php echo $row['currency']?></td>
						<td>
							<!-- <a href="receiveupdating.php?id=<?php echo $row['id']?>" class="btn btn-info btn-block">Update</a>
							<a href="receivedeleting.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-block">Delete</a> -->
							<a href="receiptreceiving.php?id=<?php echo $row['id']?>;" class='btn btn-warning btn-block' value='print'>Print</a>
						</td>
					</tr>
				</tbody>
		
				<?php } ?>
						
					</table>
			</div>
		
				
		<div class="footer">
			<div class="container">
				<h3>Me To You money transfer &copy Copyright reserved 2019</h3>
				<p>Designed by N Lee </p>
			</div>
		</div>

	</body>
</html>