<? require_once( 'header.php') ; 

//print_r($_POST) ; 

if(isset($_POST[Register]))
 {
	extract($_POST) ; 
	
	$sql_check = "select count(*) as userCount from users where username = '".$username."'" ;
		$r_check = mysql_query($sql_check) ; 
		$q_check = mysql_fetch_array($r_check) ;  
		if($q_check[userCount] > 0 )
		{
			echo "<script>alert('This username is not available because it is already used ') ;</script>" ;
			 
		}
		else
		{
	$password = $password ; 
	$sql = "INSERT INTO `users` (`user_id`, `username`, `password`, `user_type_id`, `fullname`, `mobile`, `email`) 
									VALUES (NULL, '$username', '$password', '2', '$fullname', '$mobile', '$email');" ;
	if(mysql_query($sql))
			{
				echo "<script>alert('Successfully Registered') ;</script>" ;
				
				$s = "SELECT * FROM users  WHERE  `username` = '$username' " ; 
				 	 
					 $r_user = mysql_query($s) or die(mysql_error());
				
				if(mysql_num_rows($r_user)>0)
				{
					
						$query_data = mysql_fetch_array($r_user) ; 
						
						$_SESSION["CurrentUserId"] 		= $query_data[user_id];
						$_SESSION['username'] 			= $query_data[username];
						$_SESSION["user_type_id"] 		= $query_data[user_type_id];
						$_SESSION["NAME"] 				= $query_data[fullname];
						$_SESSION["email"] 				= $query_data[email];
						$_SESSION["mobile"] 			= $query_data[mobile];
						echo "<META HTTP-EQUIV='Refresh' Content='1;URL=index.php'>";
										
				}
				
				 
			}	
 }
	
 }



?>

<script type="text/javascript">

function validate()
{
	
	if($('username').val() == '') {
      alert("Error: Username cannot be blank!");
      $('username').focus();
      return false;
    }
	
	 re = /^\w+$/;
    if(!re.test($('username').val())) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }

    if($('#password').val() != "" && $('#password').val() == $('#repassword').val()) {
      if($('#password').val().length < 6) {
        alert("Error: Password must contain at least six characters!");
        $('#password').focus();
        return false;
      }
      if($('#password').val() == $('username').val()) {
        alert("Error: Password must be different from Username!");
        $('#password').focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test($('#password').val())) {
        alert("Error: password must contain at least one number (0-9)!");
        $('#password').focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test($('#password').val())) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        $('#password').focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test($('#password').val())) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        $('#password').focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      $('#password').focus();
      return false;
    }
	
	
	if($('#password').val()!=$('#repassword').val())
	{
		alert("password & confirmed passwor don't match") ; 
		return false ; 
	}
	
	 var letters = /^[a-zA-Z\s]*$/;  
	if(!letters.test($('#fullname').val())) {
        alert("Error: Full Name  must contain only letters (A-Za-z)!");
        $('#fullname').focus();
        return false;
      }
	 
	 var numbers = /^[0-9]+$/;
	 if(!numbers.test($('#mobile').val())) {
        alert("Error: mobile  must contain only numbers (0-9)!");
        $('#mobile').focus();
        return false;
      }
	
	return true ; 
	
}
</script>


 <section>
  <div class="container">
        <div class="row">
         <div class="col-md-2 col-md-offset-2"></div>
            <div class="col-md-6 col-md-offset-6">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register for MY BOOK UNIVERSITY OF HAIL</h3>
                    </div>
                    <div class="panel-body">
                    
                        <form  name="form1" id="form1" method="post" action="Register.php" onSubmit="return validate();" > 
                            <fieldset>
                                <div class="form-group">
                                Username 
                                    <input class="form-control"  required  placeholder="username" <?=$username?> name="username" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                Password
                                    <input class="form-control" required placeholder="password" id="password" <?=$password?> name="password" type="password" value="">
                                </div>
                                
                                <div class="form-group">
                               Confirm Password
                                    <input class="form-control" required placeholder=" Confirm password" <?=$repassword?> id="repassword" name="repassword" type="password" value="">
                                </div>
                                
                                 <div class="form-group">
                                Name 
                                    <input class="form-control" placeholder="Name" name="fullname" <?=$fullname?> id="fullname" type="text" required >
                                </div>
                                
                                 <div class="form-group">
                                Mobile 
                                    <input class="form-control" placeholder="mobile" maxlength="10" name="mobile" <?=$mobile?> id="mobile" type="tel" required >
                                </div>
                                
                                <div class="form-group">
                                E-mail 
                                    <input class="form-control" placeholder="email" <?=$email?> name="email" id="email" type="email" required >
                                </div>
                                
                                                             
                                
                                
                                <input type="submit" name="Register" id="Register" class="btn btn-lg btn-success btn-block" value="Register">  
                            </fieldset>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
  </section>
 




           

       <?php include "footer.php" ; ?>