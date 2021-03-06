
<!DOCTYPE html>
<html>
<head>
    <title>header</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .headerlgn{         
            background-color: #003366;
            padding: 20px 60px;
            /*position: fixed;
            width: 100%;*/
        }
        .headerlgn .systemtitle{
            /*padding: 30px 0px;*/
            float: left;
        }
        .headerlgn .systemtitle p{
            color: yellow;
            font-weight: bold;
            font-size: 30px;
        }
        
        .headerlgn .loginpart{
           float: right;
            
        }
        .headerlgn .loginpart input{
            /*width: 200px;*/
            padding: 5px 10px;
        }
        .headerlgn .loginpart .feedbackmsg{
            color: orange;
        }
        .headerlgn .loginpart:after{
            display: table;
            content: "";
            clear: both;
        }

    </style>
</head>
<body>

    <div class="headerlgn">
        <div class="row">
                <div class="col-md-3">
            
                    <div class="systemtitle">
                        <p> MONEY MOVE</p>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="loginpart">

                        <?php
                            if(isset($_SESSION['admin']) || isset($_SESSION['teller']))
                            {
                                echo '<form method="POST" action="includes/logout.inc.php">
                                
                                            <button type="submit" name="signout" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span> Sign Out</button>
                                        </form>
                                     ';
                            }
                            else
                            {
                                echo '<form action="includes/login.process.php" method="POST">
                                            <input type="text" name="user" placeholder="user name or email" title="user name or email">

                                            <input type="password" name="password" placeholder="password" title="password">

                                            <button type="submit" name="login" class="btn btn-primary">Sign in</button>

                                        </form>
                                      ';
                            }

                            // ERROR HANDLING

                            if(isset($_SESSION['error']))
                            {
                                echo '
                                        <div class="feedbackmsg">
                                            <strong>Error: </strong>' .$_SESSION['error']. '
                                        </div>
                                     ';

                                     unset($_SESSION['error']);
                                     
                            }

                        ?>
                    </div>
                </div>
            </div>
        
                
       
        
    </div>

</body>
</html>