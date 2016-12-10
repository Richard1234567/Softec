<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="ASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<title>Novedades del Día</title>
</head>
<body>

	<?php
		include '../conexion.php';
		$registro = mysql_query("select * from equipo join persona on RELA_PERSONA = ID_PERSONA join modelo on RELA_MODELO = ID_MODELO
								join marca on RELA_MARCA = ID_MARCA;") or 
		(mysql_error($conexion));

		echo '<table class="table table-bordered" align="center">';
		echo '<tr class="info" align="center">';
		echo '<h1 align="center">Novedades del Dia</h1>';
		echo '<td><label>Nombre</label></td>';
		echo '<td><label>Apellido</label></td>';
		echo '<td><label>DNI</label></td>';
		echo '<td><label>Equipo</label></td>';
		echo '<td><label>Marca</label></td>';
		echo '<td><label>Modelo</label></td>';
		echo '<td><label>Accion</label></td>';
		echo '</tr>';
		while ($reg = mysql_fetch_array($registro))
 				{

			echo '<tr class="gradeU" align="center">';
			echo '<td>';
			echo $reg ['PERSONA_NOMBRE'];
			echo '</td>';
			echo '<td>';
			echo $reg ['PERSONA_APELLIDO'];
			echo '</td>';
			echo '<td>';
			echo $reg ['PERSONA_DNI'];
			echo '</td>';
			echo '<td>';
			echo $reg ['COD_EQUIPOS'];
			echo '</td>';
			echo '<td>';
			echo $reg ['MARCA_DESCRIPCION'];
			echo '</td>';
			echo '<td>';
			echo $reg ['MODELO_DESCRIPCION'];
			echo '</td>';
			echo '<td align="center">';
			echo '<a href = "http://localhost/buscador/Equipo/Diagnostico.php?id='.$reg['ID_EQUIPO'].'"><button class="btn btn-success">Ver</button></a>';
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';

		?>

</body>
</html>