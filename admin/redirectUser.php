<?php 
session_start(); 
require_once('myfun.php');

$action =  $_GET[action] ;
if ($action=="login"){
		//session_destroy();
						
						
		if(isset($_POST[login])&& $_POST[login] != "")	
			{
				
				$password = $_POST[password] ; 
				
				
				$s = "SELECT * 
							FROM users u
							
							 WHERE  username='$_POST[username]' and password='$password'  and user_type_id =  1 
							 
					 " ; 
				
				
				 
				
				$r_user = mysql_query($s) or die(mysql_error());
				
				if(mysql_num_rows($r_user)>0)
				{
					$q_user = mysql_fetch_array($r_user); 
						
						$_SESSION["CurrentUserId"] 		= $q_user[user_id];
						$_SESSION['username'] 			= $q_user[username];
						$_SESSION["user_type_id"] 		= $q_user[user_type_id];
						$_SESSION["NAME"] 				= $q_user[fullname];
											
						echo "<META HTTP-EQUIV='Refresh' Content='1;URL=index.php'>";
						exit() ;	
				}
                else
                {
                    ?><script>alert('The username or password you have entered is invalid.  '); history.go(-1)</script><?
					exit() ;
                    
                }
			}
   
    
	 

}



else if ($action=="logout")
{
	
		session_destroy();
		echo "<META HTTP-EQUIV='Refresh' Content='1;URL=../index.php'>";	
		exit() ;
}


	
?>