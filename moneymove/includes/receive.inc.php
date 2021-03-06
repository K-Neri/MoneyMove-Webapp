<?php
	session_start();
	if(isset($_POST['receive']))
	{
		include 'dbh.inc.php';
		$code = mysqli_real_escape_string($conn, $_POST['code']);
		$receivername = mysqli_real_escape_string($conn, $_POST['receivername']);
		$receivernum = mysqli_real_escape_string($conn, $_POST['receivernum']);
		$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
		$receiveraddress = mysqli_real_escape_string($conn, $_POST['receiveraddress']);
		$idtype = mysqli_real_escape_string($conn, $_POST['idtype']);
		$idnum = mysqli_real_escape_string($conn, $_POST['idnum']);
		$relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
		$sendername = mysqli_real_escape_string($conn, $_POST['sendername']);
		$sendernum = mysqli_real_escape_string($conn, $_POST['sendernum']);
		$origin = mysqli_real_escape_string($conn, $_POST['origin']);
		$destination = mysqli_real_escape_string($conn, $_POST['destination']);
		$amount = mysqli_real_escape_string($conn, $_POST['amount']);
		$currency = mysqli_real_escape_string($conn, $_POST['currency']);

		if(empty($code) || empty($receivername) || empty($receivernum) || empty($receiveraddress) || empty($idtype) || empty($idnum) || empty($sendername) || empty($sendernum) || empty($amount) || empty($currency))
		{
			header("location: ../receive.php?receiving=empty");
			
		}


		else
		{
			$sql="SELECT * FROM receive where code='$code'";
			$result=mysqli_query($conn, $sql);
			$resultcheck= mysqli_num_rows($result);

			if($resultcheck > 0)
			{
				header("location: ../receive.php?receiving=received");
			}

			else
			{

				$sql =" INSERT INTO receive(code, r_name, r_contact,  r_address, r_idtype, r_idnum, s_name, s_contact, origin, destination, amount, currency) VALUES('$code', '$receivername', '$receivernum', '$receiveraddress', '$idtype', '$idnum', '$sendername', '$sendernum', '$origin', '$destination', '$amount', '$currency')";

						mysqli_query($conn, $sql);

					header("location: ../receive.php?receiving=success");
			}
					
		}
	}
	else
	{
		header("Location: ../receive.php");
	}	

?>