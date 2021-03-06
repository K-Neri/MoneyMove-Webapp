<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/print.css">
		<link rel="styleshett" type="text/css" href="../css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
		<div class="container-fluid">

		<div class="receipt" onclick="window.print()">
			
			<div class="company">
				<?php

					include "dbh.inc.php";
					// $uname = mysqli_real_escape_string($conn, $_POST['user']);
					$id = mysqli_real_escape_string($conn, $_GET['id']);

					$sql = "SELECT * FROM send where id='$id'";
					$result = mysqli_query($conn, $sql);
				?>

				<table width="100%" >
					<?php
						while($row = $result->fetch_assoc()){
					?>
		 			<tr>
		 				<th colspan="5"><h3 class="companyname">MONEY MOVE TRANSFER SYSTEM</h3></th>
		 			</tr>
		 			<tr>
		 				<th colspan="5">
		 					<h3 class="center"> SENDING - Agent Receipt</h3>
		 				</th>
		 			</tr>

		 			<tr>
		 				<th >DATE : </th>
		 				<td><?php echo $row['sending_time']?></td>
		 				<td></td>
		 				<th >TRANSACTION CODE</th>
		 				<td><?php echo $row['code']?></td>
		 			</tr>

		 			<tr>
		 				<th class="center" colspan="3"> SENT BY</th>
		 				<th class="center" colspan="2"> RECEIVER</th>
		 			</tr>
		 			<tr>
		 				<th>Name : </th>
		 				<td><?php echo $row['s_name']?></td>
		 				<td></td>
		 				<th>Name : </th>
		 				<td><?php echo $row['r_name']?></td>
		 				
		 			</tr>
		 			<tr>
		 				<th>Address : </th>
		 				<td><?php echo $row['s_address']?></td>
		 				<td></td>
		 				
		 				
		 			</tr>
		 			<tr>
		 				<th>Phone : </th>
		 				<td><?php echo $row['s_contact']?></td>
		 				<td></td>
		 				<th>Phone : </th>
		 				<td><?php echo $row['r_contact']?></td>
		 				
		 			</tr>
		 			<tr>
		 				<th>Destination</th>
		 				<td><?php echo $row['destination']?></td>
		 				<td></td>
		 				<th>Origin</th>
		 				<td><?php echo $row['origin']?></td>
		 			</tr>
		 			<tr>
		 				<th>ID type</th>
		 				<td><?php echo $row['s_idtype']?></td>
		 			</tr>
		 			<tr>
		 				<th>ID num</th>
		 				<td><?php echo $row['s_idnum']?></td>
		 			</tr>

		 			<tr>
		 				<th class="center" colspan="3"> SENT </th>
		 				<th class="center" colspan="2"> RECEIVER</th>
		 			</tr>
		 			<tr>
		 				<th>Amount</th>
		 				<td><?php echo $row['amount']?></td>
		 				<td></td>
		 				<th>Amount</th>
		 				<td><?php echo $row['amount']?></td>
		 			</tr>
		 			<tr>
		 				<th>Currency</th>
		 				<td><?php echo $row['currency']?></td>
		 				<td></td>
		 				<th>Currency</th>
		 				<td><?php echo $row['currency']?></td>
		 			</tr>

		 			<tr>
		 				<th class="center" colspan="4"> OFFICE </th>
		 				<th class="center" > CUSTOMER SIGNATURE</th>
		 			</tr>
		 			<tr>
		 				<th colspan="2" class="subcenter">MONEY MOVE COMPANY</th>
		 				<th>Phone</th>
		 				<td>+2560000</td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<th>Address : </th>
		 				<td>Nsambya</td>
		 				<th>Fax : </th>
		 				<td>0000</td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<td>Kampala</td>
		 				<td></td>
		 				<th>Email : </th>
		 				<td>Moneymove@gmail.com</td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<th>UGANDA</th>
		 				<td></td>
		 				<td></td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<td><b><i>Paid by : <?php echo $_SESSION['F_name'] ."&nbsp". $_SESSION['L_name']?></i></b></td>
		 			</tr>
		 		<?php } ?>
		 		</table>
			</div>
		

		<!--CODE FOR PRINTING RECEIPT FOR THE CUSTOMER-->

		<div class="company">
				<?php

					include "dbh.inc.php";

					$id = mysqli_real_escape_string($conn, $_GET['id']);

					$sql = "SELECT * FROM send where id='$id'";
					$result = mysqli_query($conn, $sql);
				?>

				<table width="100%">
					<?php
						while($row = $result->fetch_assoc()){
					?>
		 			<tr>
		 				<th colspan="5"><h3 class="companyname">MONEY MOVE TRANSFER SYSTEM</h3></th>
		 			</tr>
		 			<tr>
		 				<th colspan="5">
		 					<h3 class="center"> SENDING - Customer Receipt</h3>
		 				</th>
		 			</tr>

		 			<tr>
		 				<th >DATE : </th>
		 				<td><?php echo $row['sending_time']?></td>
		 				<td></td>
		 				<th >TRANSACTION CODE</th>
		 				<td><?php echo $row['code']?></td>
		 			</tr>

		 			<tr>
		 				<th class="center" colspan="3"> SENT BY</th>
		 				<th class="center" colspan="2"> RECEIVER</th>
		 			</tr>
		 			<tr>
		 				<th>Name : </th>
		 				<td><?php echo $row['s_name']?></td>
		 				<td></td>
		 				<th>Name : </th>
		 				<td><?php echo $row['r_name']?></td>
		 				
		 			</tr>
		 			<tr>
		 				<th>Address : </th>
		 				<td><?php echo $row['s_address']?></td>
		 				<td></td>
		 				
		 				
		 			</tr>
		 			<tr>
		 				<th>Phone : </th>
		 				<td><?php echo $row['s_contact']?></td>
		 				<td></td>
		 				<th>Phone : </th>
		 				<td><?php echo $row['r_contact']?></td>
		 				
		 			</tr>
		 			<tr>
		 				<th>Destination</th>
		 				<td><?php echo $row['destination']?></td>
		 				<td></td>
		 				<th>Origin</th>
		 				<td><?php echo $row['origin']?></td>
		 			</tr>
		 			<tr>
		 				<th>ID type</th>
		 				<td><?php echo $row['s_idtype']?></td>
		 			</tr>
		 			<tr>
		 				<th>ID num</th>
		 				<td><?php echo $row['s_idnum']?></td>
		 			</tr>

		 			<tr>
		 				<th class="center" colspan="3"> SENT </th>
		 				<th class="center" colspan="2"> RECEIVER</th>
		 			</tr>
		 			<tr>
		 				<th>Amount</th>
		 				<td><?php echo $row['amount']?></td>
		 				<td></td>
		 				<th>Amount</th>
		 				<td><?php echo $row['amount']?></td>
		 			</tr>
		 			<tr>
		 				<th>Currency</th>
		 				<td><?php echo $row['currency']?></td>
		 				<td></td>
		 				<th>Currency</th>
		 				<td><?php echo $row['currency']?></td>
		 			</tr>

		 			<tr>
		 				<th class="center" colspan="4"> OFFICE </th>
		 				<th class="center" > CUSTOMER SIGNATURE</th>
		 			</tr>
		 			<tr>
		 				<th colspan="2" class="subcenter">MONEY MOVE COMPANY</th>
		 				<th>Phone</th>
		 				<td>+2560000</td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<th>Address : </th>
		 				<td>Nsambya</td>
		 				<th>Fax : </th>
		 				<td>0000</td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<td>Kampala</td>
		 				<td></td>
		 				<th>Email : </th>
		 				<td>Moneymove@gmail.com</td>
		 				<td></td>
		 			</tr>
		 			<tr>
		 				<th>UGANDA</th>
		 				<td></td>
		 				<td></td>
		 				<td></td>

		 			</tr>
		 			
		 			<tr>
		 				<td><b><i>Paid by : <?php echo $_SESSION['F_name'] ."&nbsp". $_SESSION['L_name']?></i></b></td>
		 			</tr>
		 			
		 		<?php } ?>
		 		</table>
		 		<br>
			</div>
			
			<br>
		</div>
	</div>

		
	
	</body>
</html>