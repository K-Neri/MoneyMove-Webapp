<!DOCTYPE html>
<html>
<head>
	<title>footer</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<meta name="viewprot" content="width=device-width, initial-scale=1.0">
	<style>
		*{
			box-sizing: border-box;
		}
		.footer{
			
			background-color: #003366;
			padding: 10px 0px;
			color: white;
			text-align: center;
			font-family: sans-serif;
			position: sticky;
			bottom: 0;
		}
		.footer p{
			color:yellow;
			font-weight: bold;
		}
		.social_media img{
			height: 30px;
			width: 30px;
			margin: 0px 5px;
		}
	</style>
</head>
<body>



	<div class="footer">
		<div class="container">
			<h3>Copyright &copy 2019 - <?php echo date("Y") ?> MONEY MOVE. All rights reserved.</h3>
				<p>Developed by KWIZERA Neri </p>
		</div>
		<div class="social_media">
			<a href="https://m.facebook.com/kwizera.nelly.94"><img src="../images/facebook.png"></a>
			<a href="https://www.instagram.com/neri.kwizera/"><img src="../images/instagram.png"></a>
			<a href="nellykwiz@gmail.com"><img src="../images/gmail.png"></a>
		</div>
	</div>

</body>
</html>