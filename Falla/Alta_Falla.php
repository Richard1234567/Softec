<?php 
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> <!--Llamamos al archivo CSS a través de CDN -->
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  </head>
  <body>
  <nav class="nav">
    <a href=""><img src="../img/hp.jpg" class="img"></a>
    <ul class="ul">
        <li class="li"><a href="Cliente/Lista_Cliente.php">Clientes</a></li>
        <li class="li"><a href="Equipo/Lista_Equipo.php">Equipos</a></li>
        <li class="li"><a href="Proveedor/Lista_Proveedor.php">Proveedores</a></li>
        <li class="li"><a href="#">Facturación</a></li>
        <li class="li"><a href="#">Insumos</a></li>
        <li class="li"><a href="#">Compras</a></li>
        <li class="li"><a href="#">Reportes</a></li>
        <li class="li"><a href="#">Calendario</a></li>
        <li class="li"><a href="#">Auditoria</a></li>
        <li class="li"><a href="#">Configuración</a></li>


    </ul>
</nav>
  <br>
  <br>
<div>
<table class="tabla-mensaje" alingn="center">
<?php 

	include '../conexion.php';

		$Falla = $_POST['FALLA_DESC'];
		$Precio = $_POST['RELA_PRECIO'];


		$sql = "INSERT INTO falla (FALLA_DESC,RELA_PRECIO) VALUES ('" . $Falla . "'," . $Precio . ")";	



		if($resultado = mysql_query($sql)){
			echo '<tr class="table-info" align="center">';
			echo '<td alingn="center">La Falla fue dada de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></td>';
			echo '</tr>';
			print "<meta http-equiv=Refresh content=\"2 ; url= Formulario_Falla.php\">"; 
		} else {
			if (!$resultado) {
		    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		    $mensaje .= 'Consulta completa: ' . $sql;
		    die($mensaje);
							}
		}
		
		mysql_close($conexion);						

		//if (!$resultado) {
		//    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		//    $mensaje .= 'Consulta completa: ' . $sql;
		//    die($mensaje);
		//}
		//	
        //    mysql_close ($conexion);
        //    echo "El Cliente fue Dado de Alta con Éxito!.";
?>
</table>
</div>
<br>
<div>
  <div class="footer1">
  	
  		<div class="panel-footer"><h5 align="center"><?php $csite_name = 'SOFTEC V1.0'; ?>
  		Copyright&copy; <?php echo date( 'm/d/y' ); ?> - <?php echo $csite_name; ?>&nbsp;Diseñado por  Aguirre, Richard A. Cel:(0370) 4381395 Correo: Raguirre.adrian@hotmail.com</h5></div>
  
  </div>
</div>
    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script src="../js/js.js" language="javascript"></script>
  </body>
</html> 