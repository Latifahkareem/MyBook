<?php
require_once( 'header.php') ; 

?>

<header class="masthead   text-center text-white d-flex" id="h">
  <div class="container my-auto">
    <div class="row">
     
      <div class="col-lg-10 mx-auto">
        <h2 class="text-uppercase"> 
         <? 
if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"]==2)   
	{
?>
        <strong>WELCOME
          <?=$_SESSION["NAME"]?><br>
          TO MY BOOK UNIVERSITY OF HAIL</strong> 
          
           <?php
	}
	?>
          
          </h2>
        
      </div>
     
      <div class="col-lg-6 mx-auto">
         <form  name="form1" id="form1" method="get" action="Courses.php"   >
          
            <div class="form-group">  
              <input class="form-control-sm"  required    name="txt_search" type="text" required autofocus>
               <input type="submit" name="search" id="search" class="btn btn-light  js-scroll-trigger" value="Search">
            </div>
           
          
        </form>
        
         <?php 
	   $s_last = " select b.* , u.fullname , c.course_name , (select count(*) from reading where book_id = b.book_id) as Count_r  from books b 
	   				inner join users  u on u.user_id = b.user_id 
	   				inner join courses c on  c.course_id = b.course_id
	    			ORDER BY `Count_r` DESC LIMIT 0, 5" ; 
	   
	   ?>
       
       <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">Most Read</label>
            <div class="bg-light">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Book Name</th>
                       <th>Course</th>
                       <th>By</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
		   
		  $r_last = mysql_query($s_last) ; 
		  $i=1 ; 
			while($q_last = mysql_fetch_array($r_last))
			{
				?>
		  	<tr>
                      <td><?=$i?></td>
                       <td><?=$q_last[book_name]?> </td>
                      <td><?=$q_last[course_name]?> </td>
                      <td>  <?=$q_last[fullname]?> </td>
                      <td>
                      <?=$q_last[Count_r]?>&nbsp;&nbsp;
                      
                      
                      
    <?php if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"] > 0 )   
		{
		?>  <a  href="#" onClick="read_it(<?=$q_last[book_id]?>)"><i class="fa fa-book fa-fw" aria-hidden="true"></i></a>  <?php	
	    }
        else
		{
		?> <a   href="login.html"><i class="fa fa-book fa-fw" aria-hidden="true"></i> </a>   <?php 	
		}
        ?>
                      
                      
                       </td>
                    </tr>
		 
                  
                  <?php
				  $i++ ; 
			}
			?>
                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       
        
          </div>
          
          
           <div class="col-lg-6 mx-auto ">
       <?php 
	   $s_last = " select b.* , u.fullname , c.course_name from books b 
	   				inner join users  u on u.user_id = b.user_id 
	   				inner join courses c on  c.course_id = b.course_id
	    			ORDER BY `book_id` DESC LIMIT 0, 5" ; 
	   
	   ?>
       
       <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">New Books</label>
            <div class="bg-light">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Book Name</th>
                       <th>Course</th>
                       <th>By</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
		   
		  $r_last = mysql_query($s_last) ; 
		  $i=1 ; 
			while($q_last = mysql_fetch_array($r_last))
			{
				?>
		  	<tr>
                      <td><?=$i?></td>
                       <td><?=$q_last[book_name]?> </td>
                      <td><?=$q_last[course_name]?> </td>
                      <td>  <?=$q_last[fullname]?> </td>
                      <td>
    <?php if(isset($_SESSION["user_type_id"])&& $_SESSION["user_type_id"] > 0 )   
		{
		?>  <a   href="#" onClick="read_it(<?=$q_last[book_id]?>)"><i class="fa fa-book fa-fw" aria-hidden="true"></i></a>  <?php	
	    }
        else
		{
		?> <a   href="login.html"><i class="fa fa-book fa-fw" aria-hidden="true"></i> </a>   <?php 	
		}
        ?>
                      
                      
                       </td>
                    </tr>
		 
                  
                  <?php
				  $i++ ; 
			}
			?>
                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       
       
       
          </div>
          
         
          
    </div>
  </div>
</header>
<?php
						 
$sql_list = "SELECT c.* , (select count(*) from books b  where b.course_id =c.course_id) as CountBooks  FROM  courses c ORDER BY course_id" ;
		   
		//  echo $sql_list ; 
		   $r_list = mysql_query($sql_list) ; 
		  
		  
?>
 
<section class="p-0" id="portfolio">
  <div class="container-fluid p-0">
    <div class="row no-gutters ">
      <?php
	  while($q_list = mysql_fetch_array($r_list))
	  {
		  ?>
      <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="Courses.php?course_id=<?=$q_list[course_id]?>"> <img class="img-fluid" src="upfiles/<?=$q_list[pic]?>"  width="100%" height="100%" alt="">
        <div class="portfolio-box-caption">
          <div class="portfolio-box-caption-content">
            <div class="project-category text-faded">
              <?=$q_list[course_name]?>
            </div>
            <div class="project-name"> # No Of Books
              <?=$q_list[CountBooks]?>
            </div>
          </div>
        </div>
        </a> </div>
      <?php
	  }
	  
	  
	  
	  ?>
    </div>
  </div>
</section>
<? 
 include "footer.php" ; 
 ?>
