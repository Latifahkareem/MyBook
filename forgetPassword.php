<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MY BOOK UNIVERSITY OF HAIL</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body background="img/admin-bg.png">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">forgot password</h3>
                    </div>
                    <div class="panel-body">
                    
                    <?php
					if (isset($_POST[login]))
					{
						
						echo '<h3>Your Reset Password is sent to your mail </h3>' ; 
						
						
					}
					else
					{
					?> 
                    
                        <form role="form" method="post" action=""> 
                            <fieldset>
                                <div class="form-group">
                                Enter Your Email  
                                    <input class="form-control" placeholder="email" name="email" type="text" required autofocus>
                                </div>
                               
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" id="login" class="btn btn-lg btn-success btn-block" value="Go">  
                            </fieldset>
                            
                           
                        </form>
                        <?php
					}
					
					?> 
                        
                        <p>
                        <hr>
                      <h3>  <a href="Register.php"> Register New User </a> </h3>  
                        
                        </p>
                    </div>
                    <div class="panel-footer">
                       <h4><a href="index.php"> Home </a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
