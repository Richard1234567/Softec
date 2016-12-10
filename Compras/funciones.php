<?php
$conexion = null;

function abrirConex()
{
	global $conexion;
	// Conexión con el servidor de base de datos MySQL
	$conexion = mysqli_connect('localhost', 'root', '', 'softec');
	mysqli_set_charset($conexion, 'utf8');
}

function cerrarConex($result='')
{
	if($result!='')
		mysqli_free_result($result); 

	// Cerrar conexión a la BD
	mysqli_close($GLOBALS['conexion']);
}

function ejecutarQuery($query)
{
	global $conexion;
	abrirConex();
	return mysqli_query($conexion, $query);
}
?>