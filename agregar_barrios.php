<?php 

	include 'conexion.php';

	$barrio = $_POST['BARRIO_DESC'];

	$sql = "INSERT INTO barrio (BARRIO_DESC) VALUES ($barrio)";

	$resultado = mysql_query($sql);

	echo $sql;
	exit();

?>