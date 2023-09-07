<? 
session_start() ;
error_reporting(0);
 
require_once("admin/myfun.php") ;
?>
<script>
 function read_it(book_id)
{ 
	 
		 
		var url= 'ajax_actions.php?read_it=1&book_id='+book_id ; 
		$.ajax({url: url, success: function(result){
			 var pdf_url = 'http://localhost/mybook/upfiles/'+result ; 
				  window.open(pdf_url);
			 
		}});
	 
	
}

</script>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>MY BOOK UNIVERSITY OF HAIL</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!-- Plugin CSS -->
<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/creative.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container"> <a class="navbar-brand js-scroll-trigger" href="#page-top">MY BOOK UNIVERSITY OF HAIL</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
       
        <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="index.php#h">Home</a> </li>
        <? 
                    if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"]>0)   
						{
							?>
                            <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="myBooks.php"> My Books</a> </li>
                            <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="redirectUser.php?action=logout">Logout</a> </li>
                             <?php
							
						}
						else
						{
							?>
                             <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="login.html">Login / Register</a> </li>
                            <?php	
						}
						 
       	 if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"]==3)   
						{
							?>
                            <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="teacher/index.php"> Control Panel</a> </li>
                            
                      <?php      }
					  
					  
					  
					  if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"]==1)   
						{
							?>
                            <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="admin/index.php"> Control Panel</a> </li>
                            
                      <?php      }
                            ?>
                            
                            

<li class="dropdown nav-item ">
                        <a href="#" class="dropdown-toggle nav-link js-scroll-trigger" data-toggle="dropdown" title="Colleges">
                            
                            <b  >Colleges</b>
                        </a>
                        
                                <ul id="Colleges" class="dropdown-menu  ">
                            
                            
                            <?php
							$sqlc = "SELECT * FROM `college` ORDER BY `college_name` ASC "  ;
							 $rc = mysql_query($sqlc) ; 
							 while($qc=mysql_fetch_array($rc))
							 {
								?>
                                 <li>
                                    <a class="nav-link js-scroll-trigger "  href="Courses.php?college_id=<?=$qc[college_id]?>"><strong><?=$qc[college_name]?></strong></a>
                                </li>
                                
                                <?php 
								 
							 }
							
							?>
                            
                                </ul>
                            
                    </li>                            
                            
                            
                            
         
        <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="index.php#portfolio">Courses</a> </li>
        <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a> </li>
      </ul>
    </div>
  </div>
</nav>