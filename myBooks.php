<?php
require_once( 'header.php') ; 

?>
 

 
<section class="bg-primary" id="about">
  <div class="container">
    <div class="row">
     
      <?php
					  $s = 'SELECT *  
														FROM reading br
														INNER JOIN users u ON u.user_id = br.user_id
														INNER JOIN books b ON b.book_id = br.book_id
														INNER JOIN courses c ON c.course_id = b.course_id
														WHERE br.user_id ='.$_SESSION[CurrentUserId] ; 
					  $r = mysql_query($s) ; 
					  
					   
					  ?>
         
          
          
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            
            <div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="bg-white">
                      <th>#</th>
                       
                      <th>Book Name</th>
                      <th>Course </th>
                      <th>Reading Date </th>
                       
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
				   $i = 1 ; 
                    while($q = mysql_fetch_array($r))
					  {
						  ?>
                          <tr>
                      <td><?=$i?></td>
                       
                      <td><?=$q[book_name]?> </td>
                      <td><?=$q[course_name]?> </td>
                      <td><?=$q[reading_date]?> </td>
                       
                     
                     
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
</section>

 



<?php
 include "footer.php" ; 
 
 ?>