<?php
include('../conexion.php');

//$desde=$_GET["desde"];//recoger datos de email
//$hasta=$_GET["hasta"];

$coche = $_POST['coche'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
echo "El coche es de la marca $coche, el modelo es un $modelo y su color es $color";

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM persona WHERE PERSONA_FEC_ALTA BETWEEN '$desde' AND '$hasta' ORDER BY ID_PERSONA ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
                <th width="150">Fecha Registro</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['PERSONA_APELLIDO'].'</td>
				<td>'.$registro2['PERSONA_NOMBRE'].'</td>
				<td>S/. '.$registro2['PERSONA_DNI'].'</td>
				<td>S/. '.$registro2['PERSONA_TEL'].'</td>
				<td>'.fechaNormal($registro2['PERSONA_FEC_ALTA']).'</td>
				<td><a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id='.$registro2['ID_PERSONA'].'"><button  class="btn btn-accion-modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                        </span></button></a> 
                        &nbsp;&nbsp;&nbsp;&nbsp; <button  class="btn btn-accion-info"><span class="glyphicon glyphicon-info-sign" aria-hidden="true" data-toggle="modal" data-target="#myModal" onclick="consultas('.$registro2['ID_PERSONA'].');">
                                        </span></button>
                        <a href=""><button  class="btn btn-accion-eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true">
                                        </span></button></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>