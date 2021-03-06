<?php
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Money Move select option</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="css/selectoption.css">
		<link rel="stylesheet" type="text/css" href="css/cssfa/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		
	</head>
	<body>

		<?php
			

			if (isset($_SESSION['teller'])) 
			{
				include 'includes/dbh.inc.php'; 
				include 'includes/login.php';
				echo '
						<div class="maincontent">
			
							<div class="container">

								<div class="title ">
									<h1>WELCOME TO MONEY MOVE ' .$_SESSION["F_name"] ."&nbsp". $_SESSION["L_name"]  .' !!</h1>
									<h3>Please Select any Option you Want</h3>
									
								</div>

								<div class="rows">
									<div class="row ">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<a href="send.php" class="btn btn-primary btn-block" name="send"><span class="glyphicon glyphicon-export"></span> Sending</a>
										</div>
										<div class="col-md-4"></div>
									</div>

									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<h1>OR</h1>
										</div>
										<div class="col-md-4"></div>
									</div>

									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<a href="receive.php" class="btn btn-warning btn-block"> <span class="glyphicon glyphicon-import"></span> Receiving</a>
										</div>
										<div class="col-md-4"></div>
									</div>
								</div>
							</div>
						</div>
					 ';
			}
			// WHEN THE ADMIN IS AUTHENTICATED THE NAVIGATION WILL BE INCLUDED
			elseif(isset($_SESSION['admin']))
			{
				include "admin.nav.php";
				echo '
						<div class="maincontent">
			
							<div class="container">

								<div class="title ">
									<h1>WELCOME TO MONEY MOVE ' .$_SESSION["F_name"] ."&nbsp". $_SESSION["L_name"]  .' !!</h1>
									<h3>Please Select any Option you Want</h3>
									
								</div>

								<div class="rows">
									<div class="row ">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<a href="send.php" class="btn btn-primary btn-block" name="send"><span class="glyphicon glyphicon-export"></span> Sending</a>
										</div>
										<div class="col-md-4"></div>
									</div>

									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<h1>OR</h1>
										</div>
										<div class="col-md-4"></div>
									</div>

									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<a href="receive.php" class="btn btn-warning btn-block"> <span class="glyphicon glyphicon-import"></span> Receiving</a>
										</div>
										<div class="col-md-4"></div>
									</div>
								</div>
							</div>
						</div>
					 ';
			}
			else
			{
				header("Location:index.php");
			}

			include "includes/footer.php";
			    
		?>

		

		<!-- INCLUDING THE FOOTER -->
		
			

	</body>
</html>