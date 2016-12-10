<?php
/* capturar variable por método GET */
if (isset($_GET['pos']))
  $ini=$_GET['pos'];
else
  $ini=1; 
?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="bootstrap.css" type="text/css">
 <title>Paginación de registro</title>
 <style>
   #tablephp {width:450px; font-size:12px; padding:50px;}
   table th{background-color:#AED7FF;}
 </style>
</head>
 <body>
  <center>
   <div id="tablephp">
     <?php include('pagina.php'); ?>
   </div>
  </center>
 </body>
</html>