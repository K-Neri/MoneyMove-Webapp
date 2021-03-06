<?php


	session_start();

	include "dbh.inc.php";

	if(!isset($_POST['send']))
	{
		exit();
	}
	else
	{
		
		$code = mysqli_real_escape_string($conn, $_POST['code']);
		$sendername = mysqli_real_escape_string($conn, $_POST['sendername']);
		$sendernum = mysqli_real_escape_string($conn, $_POST['sendernum']);
		$origin = mysqli_real_escape_string($conn, $_POST['origin']);
		$senderaddress = mysqli_real_escape_string($conn, $_POST['senderaddress']);
		$idtype = mysqli_real_escape_string($conn, $_POST['idtype']);
		$idnum = mysqli_real_escape_string($conn, $_POST['idnum']);
		$receivername = mysqli_real_escape_string($conn, $_POST['receivername']);
		$receivernum = mysqli_real_escape_string($conn, $_POST['receivernum']);
		$destination = mysqli_real_escape_string($conn, $_POST['destination']);
		$amount = mysqli_real_escape_string($conn, $_POST['amount']);
		$currency = mysqli_real_escape_string($conn, $_POST['currency']);
		

		if(empty($code) || empty($sendername) || empty($sendernum) || empty($origin) || empty($senderaddress) || empty($idtype) || empty($idnum) || empty($receivername) || empty($receivernum) || empty($destination) || empty($amount) || empty($currency))
		{
			$_SESSION['SendError']= "Please fill in all required inputs fields";
			header("location: ../send.php?send=empty");
			include ("print.php");
			exit();
		}
		
		else{
			
			if(!preg_match("/^[a-z A-Z]*$/", $sendername) || !preg_match("/^[a-z A-Z]*$/", $receivername) || !preg_match("/^[a-z A-Z]*$/", $origin) || !preg_match("/^[a-z A-Z]*$/", $destination))
			{
				$_SESSION['SendError']=" Please use valid characters";
				header("location: ../send.php?send=invalidchar");
				exit();
			}

			 else{
			 		$_SESSION['SendSuccess']="The Transaction has been done successfully";
			 		$sql = " INSERT INTO send (code, s_name, s_contact, origin, s_address, s_idtype, s_idnum, r_name, r_contact, destination, amount, currency) VALUES ('$code', '$sendername', '$sendernum', '$origin', '$senderaddress', '$idtype', '$idnum', '$receivername', '$receivernum', '$destination', '$amount', '$currency')";

					 mysqli_query($conn, $sql);

					 

					 header("location: ../send.php?send=success");
			}
		}
		
		
	}
?>