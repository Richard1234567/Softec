<?php
include('../conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
    $desde = $hasta;
}

if(isset($hasta)==false){
    $hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$query = mysql_query("SELECT * FROM equipo JOIN persona ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO WHERE FECHA_ALTA  BETWEEN '$desde' AND '$hasta';");
	if (mysql_num_rows($query)<=0){
?>        
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.
                </td>
            </tr>
        </table>
		
<?php 
	} else {
?>        
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px; font-family: Times; font-size:18px;">
            <tr class="table-info" align="center">
                <td class="td">#</td>
                <td class="td">Fec. Alta</td>
                <td class="td">Serie</td>
                <td class="td">Marca</td>
                <td class="td">Modelo</td>
                <td class="td">Apellido/s</td>
                <td class="td">Nombre/s</td>
                <td class="td">DNI</td>
                <td class="td">Opciones</td>
            </tr>
<?php             
		$c=1;	while ($row = mysql_fetch_assoc($query)) {
?>            
			<tr style="background: #fff;" align="center">
            <td class="td"><?php echo $row['ID_EQUIPO'] ?></td>
            <td class="td"><?php echo $row['FECHA_ALTA'] ?></td>
            <td class="td"><?php echo $row['EQUIPO_SERIE'] ?></td>
            <td class="td"><?php echo $row['MARCA_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $row['MODELO_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $row['PERSONA_APELLIDO'] ?></td>
            <td class="td"><?php echo $row['PERSONA_NOMBRE'] ?></td>
            <td class="td"><?php echo $row['PERSONA_DNI'] ?></td>
            <td>
             
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myFicha" onclick="consultas(<?php echo $row['ID_EQUIPO']; ?>)" >
                <span class="fa fa-desktop" aria-hidden="true"></span> Ficha
             </button>        
            <a href="javascript:eliminarequipo(<?php echo $row['ID_EQUIPO']?>);">
            <button type="button" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
            </button>
            </a>
            </td>
          </tr>
<?php             
		$c++; }
?>        
		</table>
<?php         
	}
?>