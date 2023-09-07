<?php include "header.php" ; 

if(isset($_GET[act]) && $_GET[act]=='del' & $_GET[id]>0)
{
	 $sql_del = "DELETE FROM  college where college_id = ".$_GET[id] ;
	 $r_del = mysql_query($sql_del) ; 
	if($r_del)
	{
		?><script>alert(' Deleted ');</script><?php
	}
	 
	
	
}
		
if(isset($_POST[btn_save]))
 {
	
	 
 	
	if($_POST[hf_college_id] != '' && $_POST[hf_college_id]>0 )
	{
		if(mysql_query("UPDATE  `college` SET  `college_name` =  '$_POST[college_name]' WHERE college_id =  '$_POST[hf_college_id]' ;"))
		{
			
			echo "<script>alert('Successfully Updated') ;</script>" ; 
		}
		
	 
 	}
 
	 else 
	 {
		 
		
		
		
		if(mysql_query("INSERT INTO `college` (`college_id`, `college_name`) VALUES (NULL, '$_POST[college_name]') ;"))
			{
				echo "<script>alert('Successfully added') ;</script>" ; 
			}
		 
	 }
 
 }
 
if(isset($_GET[act]) && $_GET[act]=='edit')
		{
			 $sql_item = "SELECT * FROM  college where college_id = ".$_GET[id] ;
			 $r_item = mysql_query($sql_item) ; 
			 $q_item = mysql_fetch_array($r_item) ; 
			 extract($q_item) ; 
			 
			
			
		}



?>
      
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">MY BOOK UNIVERSITY OF HAIL <small>Control Panel</small> </h1>
          <ol class="breadcrumb">
            <li class="active"> <i class="fa fa-dashboard"></i> Colleges </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
       
      <div class="row">
        <div class="col-lg-6">
        
         <form action="college.php" method="post" name="addForm" id="addForm" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validate();">
             <input type="hidden" name="hf_college_id" id="hf_college_id"  value="<?=$college_id?>">
             <div class="row">
           &nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-default " data-toggle="Add New" title="Add New" data-placement="top" id="swich-1" onclick="reloadPage('college.php');"> Add New <span class="glyphicon glyphicon-plus"></span></button>
            </div>
            
            
            
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">College  Name:</label>
            <div>
              <input type="text" class="small form-control pull-left" id="college_name" name="college_name" value="<?=$college_name?>"   >
            </div>
          </div>
          
          <div class='col-lg-12 col-md-12 col-sm-12 '></div>
          <div class='col-lg-12 col-md-12 col-sm-12 '></div>
          <div class="row text-center" >
             <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary">Save</button>
            <input type="reset" class="btn btn-default" value="Reset">
            
            </form>
          </div>
          
          <?php
		   $sql_list = "SELECT * FROM  college ORDER BY college_id" ;
		 // echo $sql_list ; 
		  $r_list = mysql_query($sql_list) ; 
		  
		  
		  
		  ?> 
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">College List:</label>
            <div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>College Name</th>
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
                      <td><?=$q_list[college_name]?> </td>
                      <td><a href="?act=del&id=<?=$q_list[college_id]?>"  title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp; <a href="?act=edit&id=<?=$q_list[college_id]?>"  title="Edit" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
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
        
        
           <div class="col-lg-6">
         
          
          
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">Related Courses :</label>
            <div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Course Name</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  <tbody>
         <?php         
                  if(isset($_GET[act]) && $_GET[act]=='edit')
		{
			 $sql_book = "SELECT * FROM  courses where college_id = ".$_GET[id] ;
			 $r_book = mysql_query($sql_book) ; 
			 $x = 1 ;   
			while( $q_book = mysql_fetch_array($r_book))
			{
				?>
                 <tr>
                      <td><?=$x?></td>
                      <td><?=$q_book[course_name]?></td>
                      <td><a href="Courses.php?act=edit&id=<?=$q_book[course_id]?>" ><i class="fa fa-book" aria-hidden="true"></i> &nbsp;&nbsp; View details</a>  </td>
                    </tr>
                
                <?php
				$x++ ; 
			}
			 
			 
			
			
		}
                  
             ?>      
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
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

<script type="text/javascript">

function validate()
{
	
	 var letters = /^[a-zA-Z\s]*$/;  
	if(!letters.test($('#college_name').val())) {
        alert("Error: College Name  must contain only letters (A-Za-z)!");
        $('#college_name').focus();
        return false;
      }
	return true ; 
	
}
</script>
</body>
</html>
