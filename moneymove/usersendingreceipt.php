<?php
	Session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>VIEW SENDING RECORDS</title>
		<link rel="stylesheet" type="text/css" href="css/adminpage.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<div class="maincontent">
		<?php

			include "includes/login.php";

			if(isset($_SESSION['teller']))
			{
				include "includes/dbh.inc.php";
				
				
				echo '<h1 style="font-family: georgian; text-align: center; padding:20px 0px">SENDING RECORDS</h1>';

				$sql = " SELECT * FROM send ORDER BY sending_time DESC";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				echo '
					
						<table class="table  table-condensed table-hover table-bordered" style="font-family: georgian">
								<thead style="text-align: center; color: red">
									<tr class="bg-primary">
										<th>ID</th>
										<th title="Sending time">Sending time</th>
										<th>Transaction Code</th>
										<th>Sender Names</th>
										<th>Origin</th>
										<th>Sender phone</th>
										<th>Sender address</th>
										<th>ID Type</th>
										<th>ID Number</th>									
										<th>Receiver names</th>
										<th>Receiver phone</th>
										<th>Destination</th>
										<th>Amount</th>
										<th>Currency</th>
										<th colspan="2">EDIT</th>	
									</tr>
								</thead>

				     ';

				     while($row = $result->fetch_assoc())
						{
							echo'
								<tbody style="font-weight: bold">
									<tr class="bg-success">
										<td title="id">'. $row["id"].'</td>
										<td title="sending time">'.$row["sending_time"].'</td>
										<td title="code">'.$row["code"].'</td>
										<td title="sendername">'.$row["s_name"].'</td>
										<td title="origin">'.$row["origin"].'</td>
										<td title="senderphone">'. $row["s_contact"].'</td>
										<td title="senderaddress">'. $row["s_address"].'</td>
										<td title="IDtype">'. $row["s_idtype"].'</td>
										<td title="IDnumber">'. $row["s_idnum"].'</td>
										<td title="receivername">'. $row["r_name"].'</td>
										<td title="receiverphone">'. $row["r_contact"].'</td>		
										<td title="destination">'. $row["destination"].'</td>
										<td title="amount">'. $row["amount"].'</td>
										<td title="currency">'. $row["currency"].'</td>
										<td>
											<a href="receipt.php?id='.$row['id'].'"  class="btn btn-warning btn-block">Print</a>
											
										</td>
										
										
									
							
							    ';

						}
						if($resultcheck < 1)
						{
							echo '<td colspan=15><h1 class="text-danger">No Record found</h1></td>';
						}

					echo '
									</tr>
								</tbody>
							</table>';

						   
			}
			elseif(isset($_SESSION['admin']))
			{
				include 'includes/dbh.inc.php';
				include "admin.nav.php";
				
				echo '<h1 style="font-family: georgian; text-align: center; padding:20px 0px">SENDING RECORDS</h1>';

				$sql = " SELECT * FROM send ORDER BY sending_time DESC";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				echo '
					
						<table class="table  table-condensed table-hover table-bordered" style="font-family: georgian">
								<thead style="text-align: center; color: red">
									<tr class="bg-primary">
										<th>ID</th>
										<th title="Sending time">Sending time</th>
										<th>Transaction Code</th>
										<th>Sender Names</th>
										<th>Origin</th>
										<th>Sender phone</th>
										<th>Sender address</th>
										<th>ID Type</th>
										<th>ID Number</th>									
										<th>Receiver names</th>
										<th>Receiver phone</th>
										<th>Destination</th>
										<th>Amount</th>
										<th>Currency</th>
										<th colspan="2">EDIT</th>	
									</tr>
								</thead>

				     ';

				     while($row = $result->fetch_assoc())
						{
							echo'
								<tbody style="font-weight: bold">
									<tr class="bg-success">
										<td title="id">'. $row["id"].'</td>
										<td title="sending time">'.$row["sending_time"].'</td>
										<td title="code">'.$row["code"].'</td>
										<td title="sendername">'.$row["s_name"].'</td>
										<td title="origin">'.$row["origin"].'</td>
										<td title="senderphone">'. $row["s_contact"].'</td>
										<td title="senderaddress">'. $row["s_address"].'</td>
										<td title="IDtype">'. $row["s_idtype"].'</td>
										<td title="IDnumber">'. $row["s_idnum"].'</td>
										<td title="receivername">'. $row["r_name"].'</td>
										<td title="receiverphone">'. $row["r_contact"].'</td>		
										<td title="destination">'. $row["destination"].'</td>
										<td title="amount">'. $row["amount"].'</td>
										<td title="currency">'. $row["currency"].'</td>
										<td>
											<a href="receipt.php?id='.$row['id'].'"  class="btn btn-warning btn-block">Print</a>
											
										</td>
										
										
									
							
							    ';

						}
						if($resultcheck < 1)
						{
							echo '<td colspan=15><h1 class="text-danger">No Record found</h1></td>';
						}

					echo '
									</tr>
								</tbody>
							</table>
					<!-- </div> -->
					';

						
			}
			else
			{
				header("Location:index.php?banned");
			}

			

		?>
		</div>
		<?php include "includes/footer.php";	?>
	</body>
</html>