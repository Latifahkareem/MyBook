<?php include "header.php" ; ?>
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">MY BOOK UNIVERSITY OF HAIL <small>General Report</small> </h1>
          <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Reports </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-lg-6">
          
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">Course List:</label>
            <div>
              <div class="table-responsive">
                 <?php
		   $sql_list = "SELECT * FROM  courses ORDER BY course_id" ;
		 // echo $sql_list ; 
		  $r_list = mysql_query($sql_list) ; 
		  
		  
		  
		  ?> 
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            
            <div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Course Name</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  
				 <?php
					$i=1 ; 
					while($q_list = mysql_fetch_array($r_list))
					{
		  ?>
          <tr>
                      <td><?=$i?></td>
                      <td><?=$q_list[course_name]?> </td>
                      <td><a href="Courses.php?act=edit&id=<?=$q_list[course_id]?>"  title="Edit" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
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
        </div>
        
        
           <div class="col-lg-6">
         
          
          
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft"> Books :</label>
            <div>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ISPN</th>
                      <th>Book Name</th>
                       <th>Added By</th>
                      
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
		  $sql_list = "SELECT * FROM  books b   ORDER BY book_id " ;
		  // echo $sql_list ; 
		  $r_list = mysql_query($sql_list) ; 
		  $i=1 ; 
			while($q_list = mysql_fetch_array($r_list))
			{
				?>
		  	<tr>
                      <td><?=$i?></td>
                       <td><?=$q_list[ispn]?> </td>
                      <td><?=$q_list[book_name]?> </td>
                      <td><?=$q_list[Available]?>   </td>
                      <td>  <a href="Books.php?act=edit&id=<?=$q_list[book_id]?>"  title="Edit" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
                    </tr>
		 
                  
                  <?php
			}
			?>
                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
       <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Reading Report </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      
      <div class="row">
        
        
            <?php
					  $s = 'SELECT br.* , m.fullname as Member , u.fullname as addedBy , c.course_name , b.book_name
														FROM reading br
														INNER JOIN users m ON m.user_id = br.user_id
														INNER JOIN books b ON b.book_id = br.book_id
														inner join users  u on u.user_id = b.user_id 
														INNER JOIN courses c ON c.course_id = b.course_id
														
														order by `reading_id` DESC
														' ; 
					  $r = mysql_query($s) ; 
					  
					   
					  ?>
         
          
          
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            
            <div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Member</th>
                      <th>Book Name</th>
                      <th>Course </th>
                      <th>Reading Date </th>
                      <th> Added By  </th>
                      
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
                      <td><?=$q[Member]?> </td>
                      <td><?=$q[book_name]?> </td>
                      <td><?=$q[course_name]?> </td>
                      <td><?=$q[reading_date]?> </td>
                      <td><?=$q[addedBy]?>  </td>
                     
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
      
     
     
     
      
      <!-- /.row -->
      
   
      
      
      
      
      
      
      
      <!-- /.row --> 
      
      <!-- /.row --> 
      
    </div>
    <!-- /.container-fluid --> 
    
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 

<!-- jQuery --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="js/plugins/morris/raphael.min.js"></script> 
<script src="js/plugins/morris/morris.min.js"></script> 
<script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
