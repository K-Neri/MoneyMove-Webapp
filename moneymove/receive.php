<?php
	Session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>RECEIVE TRANSACTION</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="css/transfer.css">
		<link rel="stylesheet" type="text/css" href="css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery.js"></script>


	</head>
	<body>
		
		<div class="maincontent">
		<?php
			
			include "includes/login.php";
// SHOW THE ERROR MESSAGES TO YHE USER
			if(isset($_GET['receiving']))
			{
				$feedback = $_GET['receiving'];

				if($feedback == 'received'){
					echo '<div class="alert alert-warning"><strong>Warning: </strong> Money have already been received</div>';
				}
				elseif($feedback == 'success')
				{
					echo '<div class="alert alert-success"><strong>Sucess: </strong> Money have been received successfully</div>';
				}
			}

			elseif(isset($_GET['code']))
			{
				$feedback = $_GET['code'];

				if($feedback == 'empty')
				{
					echo'<div class="alert alert-danger">
						<p><strong>Error: </strong>Please enter the transaction code</p>
					</div>';
				}
			}

			if(isset($_SESSION['teller']) || isset($_SESSION['admin']))
			{
				
				echo ' 
                    	

							<div class="container">

								<div class="header">
									<div class="row">
										<div class="col-md-2">
										<a class="btn btn-warning select" href= selectoption.php>
											<i class="fa fa-home fa-lg"> Select Option</i>
										</a>
									</div>
										<div class="col-md-10">
											<h1>RECEIVING MONEY WITH '. $_SESSION["F_name"] ."&nbsp". $_SESSION["L_name"] .'</h1>
										</div>
									</div>
								</div>


								<p id="guide"><i>
										Please complete all required fields on this form and check if the ID of the customer is valid and acceptable  
									</i>
								</p>

								
							</div>
						
					';

									
					if(!isset($_POST['searchcode']))
					{
						echo'
							<div class="R_maincontent">

								<div class="container">
									<div class="row">
										<div class="col-md-2"></div><!-- empty column for adjusting the content -->
											<div class="col-md-8">

												<table width="100%" class="codesearch">
													<form method="POST" >
														<tr>
															<td colspan="2">
																	
																<label for="code">Transaction Number <font color="red"><b>*</b></font></label>
																<input type="text" name="code" class="form-control" placeholder="Put the transaction code to confirm" >
																<button type="submit" name="searchcode" id="search" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search the code</button>
																	
															</td>
														</tr>
													</form>
												</table>
											</div>
										<div class="col-md-2"></div> <!-- empty column for adjusting the content -->
									</div>
								</div>
							</div>
										
									     	';
					}

				   else
					{
						include "includes/dbh.inc.php";
						$code= mysqli_real_escape_string($conn, $_POST['code']);

						if(empty($code))
						{
							header("Location: receive.php?code=empty");
						}

						// GET THE TRANSACTION CODE FROM THE DATABASE FOR CONFIRMATION

						$sql= "SELECT * FROM send WHERE code='$code'";
						$result=mysqli_query($conn, $sql);
						$resultcheck = mysqli_num_rows($result);

						if($resultcheck > 0)
						{
							if($row= mysqli_fetch_assoc($result))
							{
								echo ' 
								<div class="maincontent">

									<div class="container">
										<div class="row">
											<div class="col-md-2"></div>

											<div class="col-md-8">
												<table width=100%>
													<form method="POST" action="includes/receive.inc.php">
														<tr>
															<td colspan="2">
																Transaction Number  <font color="red"><b>*</b></font>
																<input type="text" name="code" class="form-control" value="'.$row['code'].'" readonly style="background-color:white">
															</td>
														</tr>

														<tr>
															<td colspan="2">
																Receiver complete Name <font color="red"><b>*</b></font>
																<input type="text" name="receivername" class="form-control" value="'.$row['r_name'].'" readonly style="background-color:white">
															</td>
														</tr>

														<tr>
															<td>
																Receiver Phone number <font color="red"><b>*</b></font>
																<input type="text" name="receivernum" class="form-control">
															</td>
															<td>
																Country of Destination <font color="red"><b>*</b></font>
																<input type="text" name="destination" class="form-control" value="'.$row['destination'].'" readonly style="background-color:white">
															</td>
														</tr>

														<tr>
															<td colspan="2">
																Receiver Physical residential Address <font color="red"><b>*</b></font>
																<input type="text" name="receiveraddress" class="form-control">
															</td>
														</tr>

														<tr>
															<td>
																Receiver ID Type <font color="red"><b>*</b></font>
																<input type="text" name="idtype" class="form-control">
															</td>
															<td>
																Receiver ID Number <font color="red"><b>*</b></font>
																<input type="text" name="idnum" class="form-control">
															</td>
														</tr>
														
														<tr>
															<td colspan="2">
																Sender Complete Name <font color="red"><b>*</b></font>
																<input type="text" name="sendername" class="form-control" value="'.$row['s_name'].'" readonly style="background-color:white">
															</td>
														</tr>
														<tr>

															<td>
																Sender Phone number <font color="red"><b>*</b></font>
																<input type="text" name="sendernum" class="form-control">
															</td>
															<td>
																Country of Origin <font color="red"><b>*</b></font>
																<input type="text" name="origin" class="form-control" value="'.$row['origin'].'" readonly style="background-color:white">
															</td>
														</tr>

														<tr>
															<td>
																Expected Amount <font color="red"><b>*</b></font>
																<input type="text" name="amount" class="form-control" value="'.$row['amount'].'" readonly style="background-color:white">
															</td>
															<td>
																Currency <font color="red"><b>*</b></font>
																<select name="currency" class="form-control">
																	<option>'.$row['currency'].'</option>
																</select>
															</td>
														</tr>
														
														
														<tr>
															<td><br>
																<button type="submit" name="receive" class="btn btn-primary">RECEIVE MONEY</button>

															</td>
															<td><a href="userreceivinggreceipt.php" class="btn btn-warning">Print receipt</a></td>
														</tr>
													</form>
												</table>
											</div>
												
										</div>
									</div>
								</div>
								     ';
							}
							else
							{
								header("location: receive.php");
							}
						}

						else
						{
							header("location: receive.php?banned");
						}

						
					}

			}
			else
			{
				header("location: index.php?banned");
			}

			include "includes/footer.php";

		?>

</div>
		
	</body>
</html>
