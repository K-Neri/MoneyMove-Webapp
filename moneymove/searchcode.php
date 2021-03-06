<?php
	session_start();

	{
		if(isset($_POST['searchcode']))
		{
			include 'includes/dbh.inc.php';

			

			$code = mysqli_real_escape_string($conn, $_POST['code']);

			if(empty($code))
			{
				$_SESSION['codeerror']='Please enter the transaction number';
				header("Location: receive.php?code=empty");
			}
			else{

				$sql= "SELECT * FROM send WHERE code='$code'";
				$result= mysqli_query($conn, $sql);
				$resultCheck= mysqli_num_rows($result);

				if($resultCheck > 0)
				{
					$_SESSION['codefound']="";
					header('Location: receive.php?code=found');
				}
				else{
					$_SESSION['codeunavailable']= "Please check again the transaction code";
					header('Location: receive.php?code=unavailable');
				}
			}
		}
	}


?>