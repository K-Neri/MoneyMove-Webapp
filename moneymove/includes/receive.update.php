<?php
	
	session_start();

	if(isset($_POST['update']))
	{
		include 'dbh.inc.php'; 

		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$receivername = mysqli_real_escape_string($conn, $_POST['receivername']);
		$receivernum = mysqli_real_escape_string($conn, $_POST['receivernum']);
		$receiveraddress = mysqli_real_escape_string($conn, $_POST['receiveraddress']);
		$idtype = mysqli_real_escape_string($conn, $_POST['idtype']);
		$idnum = mysqli_real_escape_string($conn, $_POST['idnum']);
		$sendername = mysqli_real_escape_string($conn, $_POST['sendername']);
		$sendernum = mysqli_real_escape_string($conn, $_POST['sendernum']);
		$origin = mysqli_real_escape_string($conn, $_POST['origin']);
		$destination = mysqli_real_escape_string($conn, $_POST['destination']);
		$amount = mysqli_real_escape_string($conn, $_POST['amount']);
		$currency = mysqli_real_escape_string($conn, $_POST['currency']);

		if(empty($receivername) || empty($receivernum) || empty($receiveraddress) || empty($idtype) || empty($idnum) || empty($sendername) || empty($sendernum) || empty($amount) || empty($currency))
		{
			header("location: ../receiverecords.php?receivingupdate=empty");
			
		}else{
			$sql="UPDATE receive SET  r_name='$receivername', r_contact='$receivernum',  r_address='$receiveraddress', r_idtype='$idtype', r_idnum='$idnum', s_name='$sendername', s_contact='$sendernum', origin='$origin', destination='$destination', amount='$amount', currency='$currency' WHERE id='$id'";

			mysqli_query($conn, $sql);

			header("Location: ../receiverecords.php?receivingupdate=success");
		}
	}


?>