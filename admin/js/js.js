function targetopener(mylink, closeme, closeonly)
	{
	if (! (window.focus && window.opener))return true;
	window.opener.focus();
	if (! closeonly)window.opener.location.href=mylink.href;
	if (closeme)window.close();
	return false;
}

		function popup(mylink, windowname)
		{
			if (! window.focus)return true;
			var href;
			if (typeof(mylink) == 'string')
				href=mylink;
			else
   				href=mylink.href;
				window.open(href, windowname, 'width=800,height=500,scrollbars=yes');
				return false;
		}
function Inint_AJAX() {
try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
alert("XMLHttpRequest not supported");
return null;
};

function dochange(src, val) {
var req = Inint_AJAX();
req.onreadystatechange = function () {
 if (req.readyState==4) {
      if (req.status==200) {
           document.getElementById(src).innerHTML=req.responseText; //retuen value
      }
 }
};
req.open("GET", "inc/do_dropdown_ajax.php?data="+src+"&val="+val); //make connection
req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=windows-1256"); // set Header
req.send(null); //send value
}
function setDisplay(element, value)
{
         if(value == 1)
        {
            document.getElementById(element).style.display = '';
        }
        else
        {
            document.getElementById(element).style.display = 'none';
        }
}

function popup(mylink, windowname)
                    {
                              if (! window.focus)return true;
                              var href;
                              if (typeof(mylink) == 'string')
                                        href=mylink;
                              else
                                        href=mylink.href;
                                        window.open(href, windowname, 'width=800,height=500,scrollbars=yes');
                                        return false;
}
function targetopener(mylink, closeme, closeonly)
            {
            if (! (window.focus && window.opener))return true;
            window.opener.focus();
            if (! closeonly)window.opener.location.href=mylink.href;
            if (closeme)window.close();
            return false;
            }

function permission_selection(chk,value)
{
	
	if (chk[value - 1].checked == true) {
			for (i = 0; i < chk.length; i++)
			{
				chk[i].checked = false;
			} 
	 	for (i = 0; i < chk.length; i++)
		{
			if (i <= value-1) {
				chk[i].checked = true ;
			}else{
				chk[i].checked = false;
			}
		}
	 
	document.getElementById("txtPERM").value = value; 
	} else
	{
		for (i = 0; i < chk.length; i++)
			{
				chk[i].checked = false;
			} 
			document.getElementById("txtPERM").value = 0;
	}
}
function checkIt(evt) { 
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode;

 if ( (charCode >=48 && charCode<=57) || (charCode >=96 && charCode<=105) || charCode==8 || charCode==9){
   status = "";
   return true ;
 }
 else{
 status = "Ø£Ø±Ù‚Ø§Ù… ÙÙ‚Ø·";
  return false;
  }
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}


function checkMail(email) {
        var mail = email.trim();
        var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]­{1}[a-z0-9]+)*[\.]{1}(com|ca|net|org|fr|us|com.sa|qc.ca|gouv.qc.ca|gov.sa|mowe.gov.sa|gmail.com|hotmail.com|live.com|yahoo.com|gw.gov.sa|adeco.com.sa)$', 'i');        	
        if (!reg.test(mail)) {
             alert("áã ÊÞã ÈßÊÇÈÉ ÈÑíÏß ÇáÅáßÊÑæäí ÈÔßá ÕÍíÍ");
            return false;
        } else {
	    if(mail.indexOf("gmail") > -1){ // if gmail found
	      if(!(mail.indexOf("gmail.com") > -1)) {alert('íÑÌì ÇáÊÃßÏ ãä ÕíÇÛÉ ÇáÅíãíá'); return false;}
	      else return true;
	      }
	     else if(mail.indexOf("hotmail") > -1){ // if hotmail found
	      if(!(mail.indexOf("hotmail.com") > -1)) {alert('íÑÌì ÇáÊÃßÏ ãä ÕíÇÛÉ ÇáÅíãíá'); return false;}
	      else return true;
	      }
	     else if(mail.indexOf("yahoo") > -1){ // if yahoo found
	      if(!(mail.indexOf("yahoo.com") > -1)) {alert('íÑÌì ÇáÊÃßÏ ãä ÕíÇÛÉ ÇáÅíãíá'); return false;}
	      else return true;
	      } 
	     else if(mail.indexOf("mowe") > -1){ // if mowe found
	      if(!(mail.indexOf("mowe.gov.sa") > -1)) {alert('íÑÌì ÇáÊÃßÏ ãä ÕíÇÛÉ ÇáÅíãíá'); return false;}
	      else return true;
	      } 
	     else if(mail.indexOf("gw") > -1){ // if gw found
	      if(!(mail.indexOf("gw.gov.sa") > -1)) {alert('íÑÌì ÇáÊÃßÏ ãä ÕíÇÛÉ ÇáÅíãíá'); return false;}
	      else return true;
	      } 
	    else
            return true;
        }
    }
    
/*  validate segel ID_No
 * 
 *  Created by: Ali Al-Ghumaiz
 *  Date:       29/1/2015
 * 
 *  Input:      segel number.
 *  Output:     flag with these values:
 *      value = -1 ==> the segel number length is less than 10.
 *      value = 0 ==> the segel number is invalid.
 *      value = 1 ==> the segel number is valid.
 */
function validate_segel(segelNo){

    if(segelNo.length != 10){
        return -1;
    }
    else{
        var total = 0;
        var temp = 0;
        var lastDigit = 0;
        var totalOneDigit = 0;
        // loop the first 9 digits of the segelNo.
        for(i = 1; i <= 9; i++){
            if(i % 2 == 1){ // if (i) is odd number.
                temp = parseFloat(segelNo.substr(i-1,1)) * 2;
                if(String(temp).length == 1){// if the temp is one digit, add this digit to the total.
                    total = total + temp;
                }
                else{// if the temp is two digits, add the two digits (separately) to the total.
                    total = total + parseFloat(String(temp).substr(0,1)) + parseFloat(String(temp).substr(1,1));
                }
            }
           
            else{ // if the (i) is even number.
                // add the segelNo digit directly to the total.
                total = total + parseFloat(segelNo.substr(i-1,1));
            }
        }
        lastDigit = parseFloat(segelNo.substr(9,1)); // 10th digit of the segelNo.
        totalOneDigit = total.length == 1 ? total : parseFloat(String(total).substr(1,1));
        if(totalOneDigit == lastDigit || lastDigit == (10 - totalOneDigit)){
            return 1; // valid segel.
        }
        else{
            return 0;
        }
    }
}
function isNumberKey(evt){

		evt = (evt) ? evt : window.event					// IE users

	if ( evt.keyCode == 46 || evt.keyCode == 8 || evt.keyCode == 9 || evt.keyCode == 27 || evt.keyCode == 13 ||
		// Allow: Ctrl+A
		(evt.keyCode == 65 && evt.ctrlKey === true) ||

				// Allow: Ctrl+C
				(evt.keyCode == 67 && evt.ctrlKey === true) ||

				// Allow: Ctrl+V
				(evt.keyCode == 86 && evt.ctrlKey === true) ||

                	// Allow: F5
				(evt.keyCode == 116 ) ||
				// Allow: home, end, left, right
				(evt.keyCode >= 35 && evt.keyCode <= 39)) {
				  // let it happen, don't do anything
		
				  return true;
			} else {
				// Ensure that it is a number and stop the keypress
				if (evt.shiftKey || (evt.keyCode < 48 || evt.keyCode > 57) && (evt.keyCode < 96 || evt.keyCode > 105 )) {
					// evt.preventDefault();
                    return false;
				}
			}

}
