<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script src="js/jquery.min.js"></script> 
<title>Documento sin título</title> 
<script  type="text/javascript"> 
$(document).ready( function() { 
  var el = $('.test'); 
  function change( amt ) { 
    el.val( parseInt( el.val(), 10 ) + amt ); 
  } 
  
  $('.up').click( function() { 
    change( 1 ); 
  } ); 
  $('.down').click( function() { 
    change( -1 ); 
  } ); 
} ); 

</script> 
</head> 

<body> 

<input  type="button"  class="down" value="meno 1" /> 
<input type="text"  class="test" value="0" size="5" /> 
<input  type="button"  class="up" value="mas 1" /> 

</body> 
</html> 