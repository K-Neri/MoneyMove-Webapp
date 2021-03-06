<?php
	Session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>SENDING TRANSACTION</title>
		<link rel="stylesheet" type="text/css" href="css/transfer.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
 	<div class="maincontent">
	    <?php 

			include "includes/login.php";

			if (isset($_SESSION['teller']) || isset($_SESSION['admin']))
			{
				$code = rand(0000000001, 9999999999);
				include "includes/dbh.inc.php";
				
				if(isset($_GET['send']))
				{
					$feedback = $_GET['send'];

					if($feedback == 'empty')
					{
						echo '<div class="alert alert-danger"><strong>Error: </strong>Please fill all required input fields</div>';
					}
					if($feedback == 'invalidchar')
					{
						echo '<div class="alert alert-danger"><strong>Error: </strong>Please use valid characters for the sender name and receiver name</div>';
					}
					if($feedback == 'success')
					{
						echo '<div class="alert alert-success"><strong>Success: </strong>Money have been successfully sent</div>';
					}
				}

				 

				echo '

					<div class="header">
						<div class="row">
							<div class="col-md-2">
								<a class="btn btn-warning select" href= selectoption.php>
									<i class="fa fa-home fa-lg"> Select Option</i>
								</a>
							</div>
							<div class="col-md-10">
								<h1>SENDING MONEY WITH '. $_SESSION["F_name"] ."&nbsp". $_SESSION["L_name"] .'</h1>
							</div>
						</div>
					</div>

					<div class="container ">
	
						<p id="guide"><i>
							Please complete all required fields on this form and check if the ID of the customer is valid and acceptable  
							</i>
						</p>

						<div class="row">
							<div class="col-md-2"></div>

							<div class="col-md-8">
								<table width="100%">
									<form method="POST" action="includes/send.inc.php" class="transfer">
										<tr>
											<td colspan="2">
												Transaction Number <font color="red"><b>*</b></font>
												<input type="text" name="code" class="form-control" value="'. $code. '" readonly style="background-color:white">
												</td>
										</tr>
										<tr>
											<td colspan="2">
												Sender complete Name <font color="red"><b>*</b></font>
												<input type="text" name="sendername" class="form-control">
											</td>
										</tr>
										<tr>
											<td>
												Sender Phone number <font color="red"><b>*</b></font>
												<input type="text" name="sendernum" class="form-control">
											</td>
											<td>
												Country of Origin<font color="red"><b>*</b></font>
												<input type="text" name="origin" class="form-control">
											</td>
										</tr>
										<tr>
											<td colspan="2">
												Sender Physical residential Address <font color="red"><b>*</b></font>
												<input type="text" name="senderaddress" class="form-control">
											</td>
										</tr>
										<tr>
											<td>
												Sender ID Type <font color="red"><b>*</b></font>
												<input type="text" name="idtype" class="form-control">
											</td>
										<td>
											Sender ID Number <font color="red"><b>*</b></font>
											<input type="text" name="idnum" class="form-control">
										</td>
										</tr>
											
										<tr>
											<td colspan="2">
												Rceiver Complete Name <font color="red"><b>*</b></font>
												<input type="text" name="receivername" class="form-control">
											</td>
										</tr>
										<tr>
											<td>
												Receiver Phone number <font color="red"><b>*</b></font>
												<input type="text" name="receivernum" class="form-control">
											</td>
										<td>
											Country of Destination <font color="red"><b>*</b></font>
											<input type="text" name="destination" class="form-control">
										</td>
										</tr>
										<tr>
											<td>
												Expected Amount <font color="red"><b>*</b></font>
												<input type="text" name="amount" class="form-control">
											</td>
											<td>
												Currency <font color="red"><b>*</b></font>
												<select name="currency" class="form-control">
													<option></option>
													<option>EUR </option>
													<option>USD </option>
													<option>GBP	</option>
													<option>FRw</option>
													<option>BIF</option>
													<option>UGX</option>
												</select>
											</td>
										</tr>
											
										<tr>
											<td><br>
												<button type="submit" name="send" class="btn btn-primary">SEND MONEY</button>
											</td>
												<td><a href="usersendingreceipt.php" class="btn btn-warning">Print receipt</a></td>
										</tr>
									</form>
								</table>
									<br>
							</div>
						</div>
					</div>
				
				     ';


		include 'includes/footer.php';


			}
			else{
				header("Location:index.php?send=banned");
				
			}

		?>
	
</div>
	</body>
</html>
