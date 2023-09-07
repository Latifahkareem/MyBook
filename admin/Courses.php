<?php include "header.php" ; 

if(isset($_GET[act]) && $_GET[act]=='del' & $_GET[id]>0)
{
	 $sql_del = "DELETE FROM  courses where course_id = ".$_GET[id] ;
	 $r_del = mysql_query($sql_del) ; 
	if($r_del)
	{
		?><script>alert(' Deleted ');</script><?php
	}
	 
	
	
}
		
if(isset($_POST[btn_save]))
 {
	
	if (!empty($_FILES['pic']['name'])) 
		$the_pic = upload_img("../upfiles",$pic) ; 
	else
		$the_pic = "" ;  
 	
	if($_POST[hf_cat_id] != '' && $_POST[hf_cat_id]>0 )
	{
		if(mysql_query("UPDATE  `courses` SET  `course_name` =  '$_POST[course_name]' , college_id = '$_POST[college_id]' WHERE course_id =  '$_POST[hf_cat_id]' ;"))
		{
			
			
			if($the_pic !='')
			mysql_query("UPDATE  `courses` SET  `pic` =  '$the_pic' WHERE course_id =  '$_POST[hf_cat_id]' ;") ; 
			echo "<script>alert('Successfully Updated') ;</script>" ; 
		}
		
	 
 	}
 
	 else 
	 {
		 
		
		
		
		if(mysql_query("INSERT INTO `courses` (`course_id`, `course_name`, `pic` , `college_id`) VALUES (NULL, '$_POST[course_name]', '$the_pic','$_POST[college_id]') ;"))
			{
				echo "<script>alert('Successfully added') ;</script>" ; 
			}
		 
	 }
 
 }
 
if(isset($_GET[act]) && $_GET[act]=='edit')
		{
			 $sql_item = "SELECT * FROM  courses where course_id = ".$_GET[id] ;
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
            <li class="active"> <i class="fa fa-dashboard"></i> Courses </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
       
      <div class="row">
        <div class="col-lg-6">
        
         <form action="Courses.php" method="post" name="addForm" id="addForm" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validate();">
             <input type="hidden" name="hf_cat_id" id="hf_cat_id"  value="<?=$course_id?>">
             <div class="row">
           &nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-default " data-toggle="Add New" title="Add New" data-placement="top" id="swich-1" onclick="reloadPage('Courses.php');"> Add New <span class="glyphicon glyphicon-plus"></span></button>
            </div>
            
            
             <?php 
		if(isset($_GET[act]) && $_GET[act]=='edit' && $q_item[pic]!='')
		{
             ?>
              <div class="form-group ">
              <div class='col-lg-2 col-md-2 col-sm-2 '></div>
               
                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-12'>
                   <img src="../upfiles/<?=$q_item[pic]?>" width="150" height="150"  >
                </div>
                 <div class='col-lg-2 col-md-2 col-sm-2 '></div>
                
             </div>
             <?php 	
		}
		?> 
            
            
           
            
              <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">College :</label>
            <div>
               <?php  myselect ('college_id','college_name','college','college_id' , $college_id) ;  ?>
            </div>
          </div>
          
          
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">Course Name:</label>
            <div>
              <input type="text" class="small form-control pull-left" id="course_name" name="course_name" value="<?=$course_name?>"   >
            </div>
          </div>
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">Course Picture:</label>
            <div>
                <input type="file" name="pic" value=""  class="form-control"     id="pic" />
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
		   $sql_list = "SELECT * FROM  courses ORDER BY course_id" ;
		 // echo $sql_list ; 
		  $r_list = mysql_query($sql_list) ; 
		  
		  
		  
		  ?> 
          <div class='col-lg-12 col-md-12 col-sm-12 '>
            <label class="alignleft">Course List:</label>
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
                      <td><a href="?act=del&id=<?=$q_list[course_id]?>"  title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp; <a href="?act=edit&id=<?=$q_list[course_id]?>"  title="Edit" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </td>
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
            <label class="alignleft">Related Books :</label>
            <div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Book Name</th>
                      <th> Book Status </th>
                    </tr>
                  </thead>
                  <tbody>
         <?php         
                  if(isset($_GET[act]) && $_GET[act]=='edit')
		{
			 $sql_book = "SELECT * FROM  books where course_id = ".$_GET[id] ;
			 $r_book = mysql_query($sql_book) ; 
			 $x = 1 ;   
			while( $q_book = mysql_fetch_array($r_book))
			{
				?>
                 <tr>
                      <td><?=$x?></td>
                      <td><?=$q_book[book_name]?></td>
                      <td><a href="Books.php?act=edit&id=<?=$q_book[book_id]?>" ><i class="fa fa-book" aria-hidden="true"></i> &nbsp;&nbsp; View details</a>  </td>
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
	if(!letters.test($('#course_name').val())) {
        alert("Error: Course  Name  must contain only letters (A-Za-z)!");
        $('#course_name').focus();
        return false;
      }
	 
	 
	
	return true ; 
	
}
</script>


</body>
</html>
