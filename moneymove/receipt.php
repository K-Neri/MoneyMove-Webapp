<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SENDING RECEIPT</title>
		<link rel="stylesheet" type="text/css" href="../css/print.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="styleshett" type="text/css" href="../css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<body>
<strong></strong>
		<?php 

			if(isset($_SESSION['teller']) || isset($_SESSION['admin']))
			{
				include "includes/dbh.inc.php";
				// $uname = mysqli_real_escape_string($conn, $_POST['user']);
				$id = mysqli_real_escape_string($conn, $_GET['id']);

				$sql = "SELECT * FROM send where id='$id'";
				$result = mysqli_query($conn, $sql);

				echo '
						<div class="container-fluid">

						<div class="receipt" onclick="window.print()">
							
							<div class="company">
								
							<table width="100%" >

					 ';	

					 while($row = $result->fetch_assoc())
					 {

					 echo '
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
				 				<td>'. $row["sending_time"].'</td>
				 				<td></td>
				 				<th >TRANSACTION CODE</th>
				 				<td><strong>'. $row["code"].'</strong></td>
				 			</tr>

				 			<tr>
				 				<th class="center" colspan="3"> SENT BY</th>
				 				<th class="center" colspan="2"> RECEIVER</th>
				 			</tr>
				 			<tr>
				 				<th>Name : </th>
				 				<td><strong>'. $row["s_name"].'</strong></td>
				 				<td></td>
				 				<th>Name : </th>
				 				<td><strong>'. $row["r_name"].'</strong></td>
				 				
				 			</tr>
				 			<tr>
				 				<th>Address : </th>
				 				<td>'. $row["s_address"].'</td>
				 				<td></td>
				 				
				 				
				 			</tr>
				 			<tr>
				 				<th>Phone : </th>
				 				<td>'. $row["s_contact"].'</td>
				 				<td></td>
				 				<th>Phone : </th>
				 				<td>'. $row["r_contact"].'</td>
				 				
				 			</tr>
				 			<tr>
				 				<th>Destination</th>
				 				<td>'. $row["destination"].'</td>
				 				<td></td>
				 				<th>Origin</th>
				 				<td>'. $row["origin"].'</td>
				 			</tr>
				 			<tr>
				 				<th>ID type</th>
				 				<td>'. $row["s_idtype"].'</td>
				 			</tr>
				 			<tr>
				 				<th>ID num</th>
				 				<td>'. $row["s_idnum"].'</td>
				 			</tr>

				 			<tr>
				 				<th class="center" colspan="3"> SENT </th>
				 				<th class="center" colspan="2"> RECEIVER</th>
				 			</tr>
				 			<tr>
				 				<th>Amount</th>
				 				<td>'. $row["amount"].'</td>
				 				<td></td>
				 				<th>Amount</th>
				 				<td>'. $row["amount"].'</td>
				 			</tr>
				 			<tr>
				 				<th>Currency</th>
				 				<td>'. $row["currency"].'</td>
				 				<td></td>
				 				<th>Currency</th>
				 				<td>'. $row["currency"].'</td>
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
				 				<td><b><i>Paid by : '.  $_SESSION['F_name'] . '&nbsp'. $_SESSION['L_name'].'</i></b></td>

				 			</tr>

					 	  ';
				}
				$id = mysqli_real_escape_string($conn, $_GET['id']);

				$sql = "SELECT * FROM send where id='$id'";
				$result = mysqli_query($conn, $sql);

				echo '
						</table>
						<!-- END OF THE AGENT RECEIPT -->
						<hr>
						<!-- THE LINE DIVIDING THE TWO PARTS OF THE RECEIPT -->

						<div class="company">
								
						<table width="100%" >
					 ';

					 while($row = $result->fetch_assoc())
					 {

					 echo '
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
				 				<td>'. $row["sending_time"].'</td>
				 				<td></td>
				 				<th >TRANSACTION CODE</th>
				 				<td><strong>'. $row["code"].'</strong></td>
				 			</tr>

				 			<tr>
				 				<th class="center" colspan="3"> SENT BY</th>
				 				<th class="center" colspan="2"> RECEIVER</th>
				 			</tr>
				 			<tr>
				 				<th>Name : </th>
				 				<td><strong>'. $row["s_name"].'</strong></td>
				 				<td></td>
				 				<th>Name : </th>
				 				<td><strong>'. $row["r_name"].'</strong></td>
				 				
				 			</tr>
				 			<tr>
				 				<th>Address : </th>
				 				<td>'. $row["s_address"].'</td>
				 				<td></td>
				 				
				 				
				 			</tr>
				 			<tr>
				 				<th>Phone : </th>
				 				<td>'. $row["s_contact"].'</td>
				 				<td></td>
				 				<th>Phone : </th>
				 				<td>'. $row["r_contact"].'</td>
				 				
				 			</tr>
				 			<tr>
				 				<th>Destination</th>
				 				<td>'. $row["destination"].'</td>
				 				<td></td>
				 				<th>Origin</th>
				 				<td>'. $row["origin"].'</td>
				 			</tr>
				 			<tr>
				 				<th>ID type</th>
				 				<td>'. $row["s_idtype"].'</td>
				 			</tr>
				 			<tr>
				 				<th>ID num</th>
				 				<td>'. $row["s_idnum"].'</td>
				 			</tr>

				 			<tr>
				 				<th class="center" colspan="3"> SENT </th>
				 				<th class="center" colspan="2"> RECEIVER</th>
				 			</tr>
				 			<tr>
				 				<th>Amount</th>
				 				<td>'. $row["amount"].'</td>
				 				<td></td>
				 				<th>Amount</th>
				 				<td>'. $row["amount"].'</td>
				 			</tr>
				 			<tr>
				 				<th>Currency</th>
				 				<td>'. $row["currency"].'</td>
				 				<td></td>
				 				<th>Currency</th>
				 				<td>'. $row["currency"].'</td>
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
				 				<td><b><i>Paid by : '.  $_SESSION['F_name'] . '&nbsp'. $_SESSION['L_name'].'</i></b></td>
				 			</tr>

					 	  ';
				}
				echo '</table>
					<script>
						$(document).ready(function()
						{
							alert("TO PRINT THE RECEIPT JUST CLICK ANYWHERE ON THE PAGE, THEN YOU WILL BE DIRECTED TO OTHER OPTIONS!!!");
						});
					</script>
				';

			}
			else{
				header("Location: index.php?banned");
			}


		?>
	
	</body>
</html>