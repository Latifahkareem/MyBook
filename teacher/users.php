<?php include "header.php" ;
//print_r($_POST) ; 

?>
<script>

function checkControls(){
 var err='' ; 
 
 
 
   
	if(document.getElementById('fullname').value == ''){
        alert('Enter  Full name ');
        return false;
    }
	
	if(document.getElementById('mobile').value == ''){
        alert('Enter  Mobile ');
        return false;
    }
	 
	
	 if(document.getElementById('password').value == '' || document.getElementById('repassword').value == ''||document.getElementById('password').value != document.getElementById('repassword').value ){
        alert('Password and password confirmation do not match');
        return false;
    }

    return true;

}
function fsubmit()
	{
	
		if(checkControls()){
				document.form1.submit();  
		}
			
		
	}


</script>

<?php
$actionForm = "update" ;

if(isset($_POST[action]))
{
	 
	 
	extract($_POST) ; 

		
	if($action=="update")
	{
		$sql = "update  `users` set 
									`fullname` = '$fullname' ,
									`mobile` = '$mobile', 
									`email` = '$email'";
		if(isset ($_POST[password]) && $_POST[password] !='' && $_POST[password]==$_POST[repassword])
		$sql .= " , `password` = '$_POST[password]' " ; 
		
		
		$sql .=" where  `user_id` = " .$_SESSION["CurrentUserId"]  ; 
		
		
		if(mysql_query($sql))
		{
					
					 ?><script>alert('Update successfully  ');</script><?php
                				
		}
		else
		{
			?><script>alert('Update fail  '); </script><?php
			
			
		}
		
	}
	
		
}


$sqlu = "SELECT * FROM users where user_id = ".$_SESSION["CurrentUserId"]  ; 
		//echo $sqlu   ;  
		$ru=mysql_query($sqlu) ; 
		$qu = mysql_fetch_array($ru) ; 
		 $actionForm = "update" ;




?>


<div class="container">
  <div class="col-sm-12">&nbsp;</div>
   
   
   
     <div class="col-sm-12">
  
  <div class="col-sm-3">&nbsp;</div>
          <div class="panel panel-primary col-sm-6">
            <div class="panel-heading">
              <h3 class="panel-title">My Profile</h3>
            </div>
            <div class="panel-body">
               
               
        <p class="login-box-msg"></p>
        <form action="../admin/users.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
          
          <input type="hidden" name="action" value="<?=$actionForm?>">
          <input type="hidden" name="hf_user_id"  value="<?=$user_id?>">
          
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name" id="fullname" name="fullname" value="<?=$qu[fullname]?>" required/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="<?=$qu[email]?>" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="number" class="form-control" placeholder="Mobile" maxlength="10" name="mobile" id="mobile" value="<?=$qu[mobile]?>" required/>
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
            <input type="text" class="form-control" disabled placeholder="Username" name="username" id="username" value="<?=$qu[username]?>" required/>
            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="password" name="password" id="password"  value="<?=$qu[password]?>" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" id="repassword" placeholder="confirm password " value="<?=$qu[password]?>" required/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                                    
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" onClick="fsubmit();" class="btn btn-primary btn-block btn-flat">Save</button>
            </div><!-- /.col -->
          </div>
        </form>        

            </div>
          </div>
          
         
          
          
        </div>
   
   
   
   