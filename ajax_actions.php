<?php
session_start() ; 
require_once("admin/myfun.php") ;

 
if(isset($_GET[read_it])&&$_GET[read_it]==1)
{ 
	
	if(isset($_GET[book_id])&& $_GET[book_id]>0 && $_SESSION[user_id]>0)
	{$r1 = mysql_query("INSERT INTO   `reading` (
											`reading_id` ,
											`user_id` ,
											`book_id` ,
											`reading_date`
											)
											VALUES (
											NULL ,  '$_SESSION[CurrentUserId]',  '$_GET[book_id]', NOW() 
											)") ; 
											
											
	
	if($r1)
		echo get_by_id('book_id','pdf_file',$_GET[book_id],'books') ; 
		else
		echo '0' ; 
	}
	else
	{
		echo 'You Must Select Book' ; 	
	}

exit ; 
}



?>
