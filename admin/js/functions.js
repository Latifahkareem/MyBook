$(document).ready(function() {
$('.login_button').click(function(){
	$('.login_box').slideToggle();
});

b_id='';
$('.glink b').mouseover(function(){


        var this_b_id= this.id;
        if (b_id!=this_b_id){
            $(".glink b .open_gcol").hide();
    		$(".glink b").not(this).animate({ width:"25%" },1);
    		$(this).animate({ width:"50%" },1);
    	    $(".glink b .name_gcol").fadeIn(100);
            $(this).find(".name_gcol").hide(1);
    		$(this).find('.open_gcol').fadeIn(100);
        }

            b_id=this.id;
	});
	$('.glink').mouseleave(function(){

		$(".glink b .open_gcol").hide();
		$(".glink b").animate({ width:"33.33%" },1);
		$(".glink b .name_gcol").fadeIn(1);
        b_id='';
	});


});