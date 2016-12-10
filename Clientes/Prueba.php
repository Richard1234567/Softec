
<?php 

	include '../conexion.php';

	$sql = "SELECT INSUMO_CANTIDAD FROM insumo";
	
	$resultado = mysql_query($sql);

	$fila = mysql_fetch_array($resultado);

	$cantidad = $fila ['INSUMO_CANTIDAD'];

	$cant_alta  = 100;
	$cant_medio = 50;
	$cant_baja  = 20;
	$sin_stock  = 0;

	if ($cantidad >= $cant_alta) {
		$mensaje =  "Alto";
		echo $mensaje;
	} elseif ($cantidad >= $cant_medio) {
		$mensaje =  "Medio";
		echo $mensaje;
	} elseif ($cantidad >= $cant_baja) {
		$mensaje =  "Bajo";
		echo $mensaje;
	}
	  else {
	  	$mensaje =  "Sin Stock";
		echo $mensaje;
	  }

?>