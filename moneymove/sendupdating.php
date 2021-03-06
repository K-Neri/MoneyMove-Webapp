<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sending records update</title>
    <link rel="stylesheet" type="text/css" href="css/transfer.css">
    <link rel="icon" href='images/transferlogo.png'>
    <link rel="stylesheet" type="text/css" href="css/cssfa/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="maincontent">
    <?php

        if(isset($_SESSION['admin']))
        {
            include 'includes/dbh.inc.php';
            include 'includes/login.php';
            include 'admin.nav.php';
    ?>
        
        
            <div class="container">
                <div class="header">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="btn btn-warning select" href= selectoption.php>
                                <i class="fa fa-home fa-lg"> Select Option</i>
                            </a>
                        </div>
                                        
                        <div class="col-md-10">
                            <h1>UPDATE SENDING RECORDS WITH <?php echo $_SESSION["F_name"] ."&nbsp". $_SESSION["L_name"] ?></h1>
                        </div>
                    </div>
                </div>

                <div class="container ">
        
                    <p id="guide">
                        <i>Please complete all required fields on this form and check if the ID of the customer is valid    and acceptable  
                        </i>
                    </p>

                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-8">
                            <table width="100%">
                                <form method="POST" action="includes/sendupdatingprocess.php" class="transfer">

                                <?php
                                    $id= $_GET['update'];

                                    $sql="SELECT * FROM send WHERE id='$id'";
                                    $result= mysqli_query($conn, $sql);

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                ?>
                                                
                                    <tr>
                                        <td colspan="2">
                                                        Transaction Number <font color="red"><b>*</b></font>
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <input type="text" name="code" class="form-control" value="<?php echo $row['code'] ?>" readonly style="background-color:white">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Sender complete Name <font color="red"><b>*</b></font>
                                                        <input type="text" name="sendername" class="form-control" value="<?php echo $row['s_name'] ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sender Phone number <font color="red"><b>*</b></font>
                                                        <input type="text" name="sendernum" class="form-control" value="<?php echo $row['s_contact'] ?>">
                                                    </td>
                                                    <td>
                                                        Country of Origin<font color="red"><b>*</b></font>
                                                        <input type="text" name="origin" class="form-control" value="<?php echo $row['origin'] ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Sender Physical residential Address <font color="red"><b>*</b></font>
                                                        <input type="text" name="senderaddress" class="form-control" value="<?php echo $row['s_address'] ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sender ID Type <font color="red"><b>*</b></font>
                                                        <input type="text" name="idtype" class="form-control" value="<?php echo $row['s_idtype'] ?>">
                                                    </td>
                                                    <td>
                                                        Sender ID Number <font color="red"><b>*</b></font>
                                                        <input type="text" name="idnum" class="form-control" value="<?php echo $row['s_idnum'] ?>">
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2">
                                                        Rceiver Complete Name <font color="red"><b>*</b></font>
                                                        <input type="text" name="receivername" class="form-control" value="<?php echo $row['r_name'] ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Receiver Phone number <font color="red"><b>*</b></font>
                                                        <input type="text" name="receivernum" class="form-control" value="<?php echo $row['r_contact'] ?>">
                                                    </td>
                                                    <td>
                                                        Country of Destination <font color="red"><b>*</b></font>
                                                        <input type="text" name="destination" class="form-control" value="<?php echo $row['destination'] ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Expected Amount <font color="red"><b>*</b></font>
                                                        <input type="text" name="amount" class="form-control" value="<?php echo $row['amount'] ?>">
                                                    </td>
                                                    <td>
                                                        Currency <font color="red"><b>*</b></font>
                                                        <select name="currency" class="form-control">
                                                            <option><?php echo $row['currency'] ?></option>
                                                            <option>EUR </option>
                                                            <option>USD </option>
                                                            <option>GBP </option>
                                                            <option>FRw</option>
                                                            <option>BIF</option>
                                                            <option>UGX</option>
                                                        </select>
                                                    </td>
                                                </tr>
                        <?php } ?>
                                                <tr>
                                                    <td><br>
                                                        <button type="submit" name="updating" class="btn btn-info">Update</button>
                                                    </td>
                                                    <td><a href="usersendingreceipt.php" class="btn btn-warning">Print receipt</a></td>
                                                </tr>
                                            </form>
                                        </table>
                                        <br>
                                    </div>
                                </div>
                </div>
            </div>
        

    <?php

        }
    ?>
    
    <?php
        include 'includes/footer.php';
    ?>
</div>

    
</body>
</html>