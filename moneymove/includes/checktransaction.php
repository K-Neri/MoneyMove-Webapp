<?php

							include "dbh.inc.php";

							
							$code = mysqli_escape_string($conn, $_POST['code']);
							$sendername = mysqli_escape_string($conn, $_POST['sendername']);
							$sendernum = mysqli_escape_string($conn, $_POST['sendernum']);
							$origin = mysqli_escape_string($conn, $_POST['origin']);
							$senderaddress = mysqli_escape_string($conn, $_POST['senderaddress']);
							$idtype = mysqli_escape_string($conn, $_POST['idtype']);
							$idnum = mysqli_escape_string($conn, $_POST['idnum']);
							$receivername = mysqli_escape_string($conn, $_POST['receivername']);
							$receivernum = mysqli_escape_string($conn, $_POST['receivernum']);
							$destination = mysqli_escape_string($conn, $_POST['destination']);
							$amount = mysqli_escape_string($conn, $_POST['amount']);
							$currency = mysqli_escape_string($conn, $_POST['currency']);
						?>
						
							<table width="100%">
								<form method="POST">
						<?php

							if(!isset($_POST['search']))
							{

							}
							else{

							$sql = "SELECT * FROM send where code='$code'";
							$result=mysqli_query($conn, $sql);

							while($row = $result->fetch_assoc())
								{
						?>
								<tr>
									<td colspan="2">
										Transaction Number <font color="red"><b>*</b></font>
										<input type="text" name="code" class="form-control" value="<?php echo $row['code'] ?>">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Receiver's complete Name <font color="red"><b>*</b></font>
										<input type="text" name="receivername" class="form-control" value="<?php echo $row['r_name'] ?>">
									</td>
								</tr>
								<tr>
									<td>
										Receiver's Phone number <font color="red"><b>*</b></font>
										<input type="text" name="receivernum" class="form-control" value="<?php echo $row['r_contact'] ?>">
									</td>
									<td>
										Country of Destination <font color="red"><b>*</b></font>
										<input type="text" name="destination" class="form-control" value="<?php echo $row['destination'] ?>">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Receiver's Physical residential Address <font color="red"><b>*</b></font>
										<input type="text" name="receiveraddress" class="form-control">
									</td>
								</tr>
								<tr>
									<td>
										Receiver's ID Type <font color="red"><b>*</b></font>
										<input type="text" name="idtype" class="form-control">
									</td>
									<td>
										Receiver's ID Number <font color="red"><b>*</b></font>
										<input type="text" name="idnum" class="form-control">
									</td>
								</tr>
								
								<tr>
									<td colspan="2">
										Sender's Complete Name <font color="red"><b>*</b></font>
										<input type="text" name="sendername" class="form-control">
									</td>
								</tr>
								<tr>
									<td>
										Sender's Phone number <font color="red"><b>*</b></font>
										<input type="text" name="sendernum" class="form-control">
									</td>
									<td>
										Country of Origin <font color="red"><b>*</b></font>
										<input type="text" name="origin" class="form-control">
									</td>
								</tr>
								<tr>
									<td>
										Expected Amount <font color="red"><b>*</b></font>
										<input type="text" name="amount" class="form-control">
									</td>
									<td>
										Currency <font color="red"><b>*</b></font>
										<input type="text" name="currency" class="form-control">
									</td>
								</tr>
							
							<?php
									}
								}	
							?>
<!DOCTYPE html>
<html>
	<head>
		<title>check transaction</title>
		<link rel="stylesheet" type="text/css" href="../css/transfer.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/cssfa/font-awesome.min.css">
	</head>
	<body>

		<div class="header">
			<div class="row">
				
				<div class="col-md-12">
					<h1>MONEY MOVE CHEKING TRANSACTION</h1>
				</div>
			</div>
		</div>

		<div class="maincontent">
			<p id="guide"><i>
					Please check if all information provided by the customer is matching with the information in the database. 
				</i></p>

			
			<div class="row">
					<div class="col-md-2"></div>

					

					<div class="col-md-8">

						<form method="POST">
							<input type="text" name="codeforsearch" class="form-control" placeholder="Enter the transaction code for searching">

							<button type="submit" name="search" class="btn btn-info"><i class="fa fa-search fa-lg"> Search</i></button>
							
						</form>

						
							</form>
							</table>
						<br>
					</div>
				</div>
		</div>

		<div class="footer">
			<div class="container">
				<h3>Money Move &copy Copyright reserved 2019</h3>
				<p>Designed by KWIZERA Neri </p>
			</div>
		</div>


	</body>
</html>