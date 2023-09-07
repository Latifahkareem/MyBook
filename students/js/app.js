function show_only_div(id){ mainArea_a
	var x = document.getElementsByClassName("show_hide");

	for (var i = 0; i < x.length; i++) {

			$(x[i]).hide();}
	    $('#'+ id).show();}



 function add_comment(id,txt) { c1, txt1

		 var txt_val = $('#'+ txt).val() ;
		 if(txt_val !==''){
			 $('#'+ id).append('<p> <a href="#"> Me </a> '+  txt_val + '</p>');
			 $('#'+ txt).val('');}

		 else{
			alert('Please write your comment first!');
			return false;}}
			<!--We can not add pdf file because it needs a database-->

 function add_book(){
		 var book_n  = $('#book_name').val() ;
		 var book_message  = $('#message').val() ;
		 if(book_n !=='' && book_message !=='' ){
			 var book_data = '<p> <b> <a href="#">'+book_n+'</a> </b>'+book_message+' </p>' ;
			 $('#book_info').html(book_data);}

		 else{
			alert('Please enter your book name and description!') ;
			return false;}}

 function add_m(){
     var book_message  = $('#message_r').val() ;
		 if(book_message !==''){
		 var book_data = '<p>'+ book_message + '</p>';
			 $('#book_req').html(book_data);}

     else{
       alert('Please enter your message!') ;
			return false ;}}
