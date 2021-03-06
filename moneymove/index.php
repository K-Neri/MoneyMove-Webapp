<?php
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>MONEY MOVE system</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" href='images/transferlogo.png'>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<body>
		<!-- INCLUDING THE HEADER FILE -->
		<?php
			include 'includes/login.php';
		?>

		<div class="maincontent">
			
			<div class="container">

				<div class="row">

					<!--THIS COLUMN IS FOR DESCRIBING THE SYSTEM-->
					<div class="col-md-6">
						<h1 class="systitle">MONEY MOVE</h1>
						<div >
							<P>
								MONEY MOVE is an online money transfer system that is used in different countries in East Africa community and it colllaborates with Banks or forex bureau that are in those countries.
							</P>
						</div>

						<div >
							<p>
								It is an easier online money transfer system ever. the sender or receiver can enter any bank or forex having this service and fills the form (sending or receiving form).all required  informations about the sender including information of the receiver. Both of you (Sender and receiver) must provide a valid document ( <i><b>i.e: National ID, Passport, ATM card, Driving permit, VISA card</b></i>). Money can be  sent or received in Dollar, Euro, even in local currencies of these countries. 
							</p>
						</div>
					</div>

					<!--THIS COLUMN CONTAINS THE PICTURE SHOWING SENDER AND RECEIVER --> 
					<div class="col-md-6 col-sm-12" id="logo">
						<img src="images/transferlogo.png" class="img-responsive">
					</div>
				</div>
				
			</div>  
		</div>  <!-- END OF THE CONTAINER IN MAIN CONTENT DIV -->

		<!-- INCLUDING THE FOOTER FILE-->
		<div>
			<?php
				include 'includes/footer.php';
			?>
		</div>

		
	</body>
</html>

