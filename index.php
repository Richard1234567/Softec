<!DOCTYPE html>
<html>
<head>
	<title>buscador verga</title>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
	<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
<style>
.resaltar{background-color:#FF0;}
</style> 
  <script type='text/javascript' >
$(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda").val();
                                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "buscar.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html();  
 </script> 
</head>
<body>
<p>Buscar  »<input name="buscador" id="resultado" type="text" /></p>


</body>
</html>