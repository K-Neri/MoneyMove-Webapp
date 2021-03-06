<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href='images/transferlogo.png'>
	<link rel="stylesheet" type="text/css" href="css/admindashboard.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssfa/font-awesome.min.css">
</head>
<body>

	<?php
		
	include "includes/dbh.inc.php";
		if(isset($_SESSION['admin']))
		{
		
		echo '

		<div class="row">
			<div class="col-md-2 left-side">
				
				<ul>
				
				
				
				<li class="bg-primary title" style="margin-top: 5px;border-radius: 5px; padding: 5px; text-align: center; font-size: 16px;"><span class="glyphicon glyphicon-dashboard ">&nbsp</span>DASHBOARD</li>


	<!-- CREATION OF ACCOUNT FOR BOTH ADMIN AND TELLER -->

				<li class="title" style="border-top: 1px solid grey;margin-top: 5px"><span class="glyphicon glyphicon-user text-primary">&nbsp</span>Accounts</li>
				<li>
					<a href="admin.create.php"><span class="glyphicon glyphicon-plus-sign text-success">&nbsp</span>Create New</a>
				</li>
				<li>
					<a href="accounts.update.php"><span class="glyphicon glyphicon-edit text-warning">&nbsp</span>Edit Accounts</a>
				</li>
				
				<li style="border-bottom: 1px solid grey; ">
					<a href="accounts.delete.php"><span class="glyphicon glyphicon-trash text-danger">&nbsp</span>Delete Accounts</a>
				</li>
				

	<!-- SENDING TRANSACTION -->

				<li class="title" style="margin-top: 10px"><span class="glyphicon glyphicon-export text-primary">&nbsp</span>Sending</li>
				<li>
					<a href="usersendingreceipt.php"><span class="glyphicon glyphicon-eye-open text-success">&nbsp</span>View Transactions</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-edit text-warning">&nbsp</span>Edit Transactions</a>
				</li>
				<li style="border-bottom: 1px solid grey; ">
					<a href="#"><span class="glyphicon glyphicon-trash text-danger">&nbsp</span>Delete Transactions</a>
				</li>
				

	<!-- RECEIVING TRANSACTION -->
				<li class="title" style="margin-top: 10px"><span class="glyphicon glyphicon-import text-primary">&nbsp</span>Receiving</li>
				<li>
					<a href="userreceivinggreceipt.php"><span class="glyphicon glyphicon-eye-open text-success">&nbsp</span>View Transactions</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-edit text-warning">&nbsp</span>Edit Transactions</a>
				</li>
				<li style="border-bottom: 1px solid grey;">
					<a href="#"><span class="glyphicon glyphicon-trash text-danger">&nbsp</span>Delete Transactions</a>
				</li>
				

	<!-- EXCHANGING MONEY SERVICE -->

				<li class="title" style="margin-top: 10px"><span class="glyphicon glyphicon-transfer text-primary ">&nbsp</span>Money Exchange</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-eye-open text-success">&nbsp</span>View exchanging</a>
				</li>
				<li>
					<a href="#"><span class="glyphicon glyphicon-edit text-warning">&nbsp</span>Exchange Rate</a>
				</li>
				
			</ul>
		
	</div>


	<div class="col-md-10 right-side">
	<div class="">';
			include "includes/login.php";

			echo'
			
			
			<div class="right-header">
				<div class="left-col">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="send.php">Sending</a></li>
						<li><a href="receive.php">Receiving</a></li>
						<li><a href="#">Money Exchaning</a></li>
					</ul>
				</div>

			</div>


				
		

		<!-- <div class="container"> -->
			<div class="rigth-content">

			<!- -FIRST ROW IN TME RIGHT S MAIN CONTENT -->
				<div class="row ">
					<div class="col-md-4 ">
						<a href="accounts.update.php">
							<div class="card">
							
								<span class="glyphicon glyphicon-user"></span>
								<h3>User Accounts</h3>
								';
									$sql="SELECT * FROM users";
									$result=mysqli_query($conn, $sql);
									$resultcheck= mysqli_num_rows($result);

									if($resultcheck)
									{
										echo '<p class="text-danger">'.$resultcheck.'</p>';
									}
								echo'
							
							</div>
						</a>
					</div>

					<div class="col-md-4 cards">
						<div class="card">
							<span class="glyphicon glyphicon-export"></span>
							<h3>Sending Transactions</h3>'
							;
								$sql="SELECT * FROM send";
								$result=mysqli_query($conn, $sql);
								$resultcheck= mysqli_num_rows($result);

								if($resultcheck)
								{
									echo '<p class="text-danger">'.$resultcheck.'</p>';
								}
							echo'
						</div>
					</div>

					<div class="col-md-4 cards">
						<div class="card">
							<span class="glyphicon glyphicon-import"></span>
							<h3>Receiving Transactions</h3>
							'
							;
								$sql="SELECT * FROM receive";
								$result=mysqli_query($conn, $sql);
								$resultcheck= mysqli_num_rows($result);

								if($resultcheck)
								{
									echo '<p class="text-danger">'.$resultcheck.'</p>';
								}
							echo'
						</div>
					</div>
				</div>
			</div> <!-- END OF THE RIGHT SIDE LAYOUT -->
			<!-- </div> -->
			
  
		</div>
		</div>
	</div>

					 ';
			}
			else
			{
				header("Location:index.php");
				exit();
			}

			include "includes/footer.php";

		?>
			
		

	</body>
</html>