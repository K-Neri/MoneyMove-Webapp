<?php
	Session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>VIEW RECEIVING RECORDS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="css/adminpage.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	</head>
	<body>
		<div class="maincontent">
		<?php 

			include "includes/login.php";
			include 'includes/dbh.inc.php';
			include 'admin.nav.php'; 


			if(isset($_SESSION['teller'])||isset($_SESSION['admin']))
			{
				echo '
						<h1 style="font-family: georgian; text-align: center">RECEIVING RECORDS </h1>
				     ';

				$sql = "SELECT * FROM receive ORDER BY receiving_time DESC";
				$result = mysqli_query($conn, $sql);

				$resultcheck = mysqli_num_rows($result);

				echo '
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
				     ';

				     if($resultcheck < 1)
										{
											echo '<td colspan=15>
												<h1 class="text-danger text-center">No records found</h1>
											</td>';
										}

				     while($row = $result->fetch_assoc())
					{
						echo '
								<tbody style="font-weight: bold">
									<tr class="bg-success">
										<td title="id">'.$row['id'].'</td>
										<td title="sending time">'.$row['receiving_time'].'</td>
										<td title="code">'.$row['code'].'</td>
										<td title="sendername">'.$row['r_name'].'</td>
										<td title="Origin">'.$row['origin'].'</td>
										<td title="receiverphone">'.$row['r_contact'].'</td>
										<td title="receiveraddress">'.$row['r_address'].'</td>
										<td title="IDtype">'.$row['r_idtype'].'</td>
										<td title="IDnumber">'.$row['r_idnum'].'</td>
										<td title="Sendername">'.$row['s_name'].'</td>
										<td title="Senderphone">'.$row['s_contact'].'</td>
										<td title="destination">'.$row['destination'].'</td>
										<td title="amount">'.$row['amount'].'</td>
										<td title="currency">'.$row['currency'].'</td>
										<td>
											
											<a href="receiptreceiving.php?id='.$row['id'].'" class="btn btn-warning btn-block" value="print">Print</a>
										</td>
									</tr>
								</tbody>
							 ';
					}
					echo '</table>';		
					
			}

			else
			{
				header("Location: index.php");
			}
			?>
		</div>
		<?php

			include 'includes/footer.php';

		?>
		
		
			

	</body>
</html>