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

$registro = mysql_query("SELECT * FROM proveedor WHERE FECH_ALTA BETWEEN '$desde' AND '$hasta' ORDER BY ID_PROVEEDOR ASC");
if (mysql_num_rows($registro)<=0){
?>		
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
		<tr class="table-info" align="center">
		<td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
		</tr>
		</table>
<?php		
	} else {
?>		
	<div id="agrega-registros">
		<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
	        <tr class="table-info" align="center">
                <td class="td">#</td>
                <td class="td">Fec. Alta</td>
                <td class="td">Nombre R/S</td>
                <td class="td">Cuit</td>
                <td class="td">Teléfono</td>
                <td class="td">E-mail</td>
                <td class="td">Dirección</td>
                <td class="td">Opciones</td>
            </tr> 
	    <?php     
			while($row = mysql_fetch_array($registro)){
				$fecha=date("d/m/Y", strtotime($row['FECH_ALTA']));
		?>	
			<tr style="background: #fff;" align="center">
                    <td class="td"><?php echo $row['ID_PROVEEDOR'] ?></td>
                    <td class="td"><?php echo $fecha?></td>
                    <td class="td"><?php echo $row['NOMBRE_RAZON_SOCIAL'] ?></td>
                    <td class="td"><?php echo $row['PROVEEDOR_CUIT'] ?></td>
                    <td class="td"><?php echo $row['TELEFONO'] ?></td>
                    <td class="td"><?php echo $row['CORREO'] ?></td>
                    <td class="td"><?php echo $row['CALLE'] ?></td>
                    <td class="td">


                     <a href="http://localhost/buscador/Proveedor/Insumo_p.php?id=<? echo $row['ID_PROVEEDOR']?>">
                        <button type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Insumo
                        </button>
                     </a> 
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="consultas(<?php echo $row['ID_PROVEEDOR']; ?>)" >
                                  <span class="fa fa-users" aria-hidden="true"></span> Ficha
                     </button>
                      
                    </td>
                </tr>   
	    <?php     
			}
		?>		
		
		<?php } ?>	
	</div>