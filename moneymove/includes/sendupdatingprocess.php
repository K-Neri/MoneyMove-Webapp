<?php
	session_start();
	


	if(isset($_POST['updating']))
	{
		include "dbh.inc.php";

		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$sendername = mysqli_real_escape_string($conn, $_POST['sendername']);
		$sendernum =  mysqli_real_escape_string($conn, $_POST['sendernum']);
		$origin =  mysqli_real_escape_string($conn, $_POST['origin']);
		$senderaddress =  mysqli_real_escape_string($conn, $_POST['senderaddress']);
		$idtype =  mysqli_real_escape_string($conn, $_POST['idtype']);
		$idnum =  mysqli_real_escape_string($conn, $_POST['idnum']);
		$receivername =  mysqli_real_escape_string($conn, $_POST['receivername']);
		$receivernum =  mysqli_real_escape_string($conn, $_POST['receivernum']);
		$destination =  mysqli_real_escape_string($conn, $_POST['destination']);
		$amount =  mysqli_real_escape_string($conn, $_POST['amount']);
		$currency =  mysqli_real_escape_string($conn, $_POST['currency']);
		
		if(empty($sendername) || empty($sendernum) || empty($origin) || empty($senderaddress) || empty($idtype) || empty($idnum) || empty($receivername) || empty($receivernum) || empty($destination) || empty($amount) || empty($currency))
		{
			$_SESSION['SendError']= "Please fill in all required inputs fields";
			header("location: ../sendrecords.php?update=empty");
			 	include "print.php";
			
		}
		
		else{
			
			if(!preg_match("/^[a-z A-Z]*$/", $sendername) || !preg_match("/^[a-z A-Z]*$/", $receivername) || !preg_match("/^[a-z A-Z]*$/", $origin) || !preg_match("/^[a-z A-Z]*$/", $destination))
			{
				$_SESSION['SendError']=" Please use valid characters";
				header("location: ../send.php?update=invalidchar");
				
			}

			else
			{
				$sql = "UPDATE send SET s_name='$sendername', s_contact='$sendernum', origin='$origin', s_address='$senderaddress', s_idtype='$idtype', s_idnum='$idnum', r_name='$receivername', r_contact='$receivernum', destination='$destination', amount='$amount', currency='$currency' where id='$id' ";

				mysqli_query($conn, $sql);

				header("location: ../sendrecords.php?update=success");

			}
		}
		
	}
	else{
		header("location: sendupdating.php");
	}
?>