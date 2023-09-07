<?php 
session_start(); 
require_once('admin/myfun.php');

$action =  $_GET[action] ;
if ($action=="login"){
// session_destroy();
  
		 
		if(isset($_POST[login])&& $_POST[login] != "")	
			{
				
				$password = $_POST[password] ; 
				
				
				$s = "SELECT * 
							FROM users  WHERE  username='$_POST[username]' and password='$password'  " ; 
				$r_user = mysql_query($s) or die(mysql_error());
				
				if(mysql_num_rows($r_user)>0)
				{
						$query_data = mysql_fetch_array($r_user) ; 
						
						$_SESSION["CurrentUserId"] 		= $query_data[user_id];
						$_SESSION["user_id"] 		= $query_data[user_id];
						$_SESSION['username'] 			= $query_data[username];
						$_SESSION["user_type_id"] 		= $query_data[user_type_id];
						$_SESSION["NAME"] 				= $query_data[fullname];
						$_SESSION["email"] 				= $query_data[email];
						$_SESSION["mobile"] 			= $query_data[mobile];
						
					 if($query_data[user_type_id]==1)
					 	echo "<META HTTP-EQUIV='Refresh' Content='1;URL=admin/index.php'>";
					 else if($query_data[user_type_id]==3)
					 	echo "<META HTTP-EQUIV='Refresh' Content='1;URL=teacher/index.php'>";
					else if($query_data[user_type_id]==2)
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
		echo "<META HTTP-EQUIV='Refresh' Content='1;URL=index.php'>";	
		exit() ;
}


	
?>