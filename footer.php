<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="section-heading">Let's Get In Touch!</h2>
        <hr class="my-4">
        <p class="mb-5"> MY BOOK UNIVERSITY OF HAIL  <br>
          COLLEGE OF COMPUTER SCIENCES AND ENGINEERING <br>
          DEPARTMENT OF SOFTWARE ENGINEERING <br>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 ml-auto text-center">
        <p></p>
        <p></p>
      </div>
      <div class="col-lg-4 ml-auto text-center"> <i class="fa fa-user-circle-o fa-3x mb-3 sr-contact"></i>
        <p>Latifah kareem AlQuairi
 - 201203899</p>
        <p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:ilatifah.kareem@gmail.com">  ilatifah.kareem@gmail.com</a></p>
      </div>
      <div class="col-lg-4 ml-auto text-center">
        <p><h3></h3></p>
        <p></p>
      </div>
    </div>
  </div>
</section>

<section   class="bg-primary">
  <div class="container">
    <div class="row" >
      <?php
		   $sql_list = "SELECT c.*    FROM  courses c ORDER BY course_id" ;
		   $r_list = mysql_query($sql_list) ;

		   while($q_list = mysql_fetch_array($r_list))
	  {
		  ?>
       <a  class="btn btn-light btn-xl js-scroll-trigger" href="Courses.php?course_id=<?=$q_list[course_id]?>" >
        <?=$q_list[course_name]?>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


      <?php
	  }


?>

    </div>
  </div>

  </section>


  </div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.min.js"></script>
</body></html>
