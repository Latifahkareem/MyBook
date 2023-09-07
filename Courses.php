<?php
require_once( 'header.php') ; 


		$sql_list = " select b.* , u.fullname , c.course_name from books b 
	   				inner join users  u on u.user_id = b.user_id 
	   				inner join courses c on  c.course_id = b.course_id
		
		 where 1 = 1 " ;
		  
		  
		   
		   if($_GET[college_id]>0)
		$sql_list.= " and  c.college_id =  ".$_GET[college_id] ; 
		
		
		if($_GET[course_id]>0)
		$sql_list.= " and  b.course_id =  ".$_GET[course_id] ; 
		
		if($_GET[txt_search]!='')
		
		$sql_list.= " and ( book_name like '%". $_GET[txt_search] ."%' or  author like '%". $_GET[txt_search] ."%' ) " ; 
		
		$r_list = mysql_query($sql_list) ; 
		  
		 // echo $sql_list ; 
?> 
<section class="bg-primary"  >
  <div class="container">
    <div class="row">
     
     
     
    
     <?php
	  while($q_list = mysql_fetch_array($r_list))
	  {
		  ?>
          
           
          
     <div class="col-lg-4 mx-auto text-center bg-dark"  >
     
        <img class="img-fluid" src="upfiles/<?=$q_list[pic]?>"  width="90%" height="90%"  alt="">
        <br>
        
        <p class="text-faded mb-4">(<?=$q_list[ispn]?>)  <br> <?=$q_list[book_name]?>. </p>
        <p class="text-faded mb-4"><?=$q_list[author]?>. </p>
        <p class="text-faded mb-4">By:<?=$q_list[fullname]?>. </p>
        
        
        
        <?php if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"] > 0 )   
		{
		?>  <a class="btn btn-light btn-xl js-scroll-trigger" href="#" onClick="read_it(<?=$q_list[book_id]?>)"><i class="fa fa-book fa-fw" aria-hidden="true"></i> Read It!</a>  <?php	
	    }
        else
		{
		?> <a class="btn btn-light btn-xl js-scroll-trigger" href="login.html">Login to Read it </a>   <?php 	
		}
        ?>
       
        </div> 
        
        <?php } ?> 
        
    </div>
  </div>
</section>

 



<?php
 include "footer.php" ; 
 
 ?>