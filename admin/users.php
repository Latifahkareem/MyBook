<?php include "header.php" ;
//print_r($_POST) ; 

?>
<script>

function checkControls(){
 var err='' ; 
 
 
 
    if(document.getElementById('username').value == ''){
        alert('Enter Username');
        return false;
    }
	
	if(document.getElementById('fullname').value == ''){
        alert('Enter  Full name ');
        return false;
    }
	
	if(document.getElementById('mobile').value == ''){
        alert('Enter  Mobile ');
        return false;
    }
	 
	if(document.getElementById('user_type_id').value == '' || document.getElementById('user_type_id').value <= 0){
        alert('Select  User type');
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
$actionForm = "insert" ;

if(isset($_POST[action]))
{
	 
	 
	extract($_POST) ; 
	
//	Array ( [action] => insert [hf_user_id] => [user_type_id] => 3 [fullname] => Teacher one [email] => Teacher1@hotmail.com [mobile] => 0555555555 [username] => t1 [password] => 123 [repassword] => 123 )
	if($action=="insert")
	{
		if(if_regb4($username)==1)
	{
		?> <script>alert('This username is already registered');history.go(-1)</script><?php
					exit() ;
	}
	else
	{
		$password =  $_POST[password]  ; 
		$sql = "INSERT INTO `users` (`user_id`, `username`, `password`, `user_type_id`, `fullname`, `mobile`, `email`) VALUES (NULL, '$username', '$password', '$user_type_id', '$fullname', '$mobile', '$email')";
		
	//	echo $sql ; 
		
		if(mysql_query($sql))
		{
					
					 ?><script>alert('saved successfully  ');</script><?php
                				
				}
                else
                {
                    ?><script>alert('saved fail  '); </script><?php
					
                    
                }
		
		
	}
	
	
	}
	else 
	if($action=="update")
	{
		$sql = "update  `users` set `user_type_id` = '$user_type_id' , 
									`fullname` = '$fullname' ,
									`mobile` = '$mobile', 
									`email` = '$email'";
		if(isset ($_POST[password]) && $_POST[password] !='' && $_POST[password]==$_POST[repassword])
		$sql .= " , `password` = '$_POST[password]' " ; 
		
		
		$sql .=" where  `user_id` = " . $_POST[hf_user_id] ; 
		
		
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


if(isset($_GET[act]))
{
	extract($_GET) ;
	if($_GET[act]=="del")
	{
	  
		 
		$sql = "delete from users where user_id ='".$user_id."'" ; 
	//	echo $sql ; 
		if(mysql_query($sql))
		{ 
		?><script>alert('Deleted  ');</script><?php
                				
				}
                else
                {
                    ?><script>alert('Not Deleted '); </script><?php
				
                }
		
		
	}
	else if($_GET[act]=="update"&& $user_id>0 )
	{
		$sqlu = "SELECT * FROM users where user_id ='".$user_id."'";
		//echo $sqlu   ;  
		$ru=mysql_query($sqlu) ; 
		$qu = mysql_fetch_array($ru) ; 
		 $actionForm = "update" ;
		
	}
	
	
	
	
	
}




?>


<div class="container">
  <div class="col-sm-12">&nbsp;</div>
   
   
   
     <div class="col-sm-12">
  
  <div class="col-sm-3">&nbsp;</div>
          <div class="panel panel-primary col-sm-6">
            <div class="panel-heading">
              <h3 class="panel-title">Add New User</h3>
            </div>
            <div class="panel-body">
               
               
        <p class="login-box-msg"></p>
        <form action="users.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
          
          <input type="hidden" name="action" value="<?=$actionForm?>">
          <input type="hidden" name="hf_user_id"  value="<?=$user_id?>">
          
          <div class="form-group has-feedback">
            <select class="form-control" placeholder="User type" name="user_type_id" id="user_type_id" required >
            
            <option value="0">Select User type </option>
            <option value="1" <?php if($qu[user_type_id]==1) echo  'selected' ;   ?> > Admin </option>
            <option value="2" <?php if($qu[user_type_id]==2) echo  'selected' ;   ?>> Student </option>
            <option value="3" <?php if($qu[user_type_id]==3) echo  'selected' ;   ?>> Teacher</option>
             
            
             </select>
           
          </div>
          
          
          
          
          
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
            <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?=$qu[username]?>" required/>
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
   
   
   
   <div class="col-sm-12">
    <?php 
   $sql = "SELECT u.* , ut.user_type_name FROM `users` u inner JOIN user_types ut on ut.user_type_id = u.user_type_id ORDER BY `u`.`user_type_id` ASC" ; 
  // echo $sql ; 
   $r= mysql_query($sql) ; 
     
   ?>
   
   <h2 class="sub-header">Users</h2>
          <div class="table-responsive" style="overflow-y: scroll; height:350px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Full name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>User type</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
              
              <?php 
			  while($q=mysql_fetch_array($r))
			  {
			  ?>
              <tr>
                  <td><?=$q[username]?></td>
                  <td><?=$q[fullname]?></td>
                  <td><?=$q[email]?></td>
                  <td><?=$q[mobile]?></td>
                  <td><?=$q[user_type_name]?></td>
                  <td>
                  
                
                <?php  if($q[user_id]!=1)
				{
					?>
                  <a href="?p=users.php&act=del&user_id=<?=$q[user_id]?>" > <span class="glyphicon glyphicon-trash">  </span></a>
                  <?php } ?>
                   <a href="?p=users.php&act=update&user_id=<?=$q[user_id]?>" > <span class="glyphicon glyphicon-pencil"></span></a>
                  
                   </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
   
   
   
   </div>
   
   
 <!-- /.col-sm-4 -->
</div>