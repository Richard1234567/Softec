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

//echo $desde, $hasta;
//exit();
//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM insumo JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA
JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN proveedor ON RELA_PROVEEDOR = ID_PROVEEDOR 
JOIN tipo_servicio ON RELA_TIPO_SERVICIO = ID_TIPO_SERVICIO WHERE FECH_ALTA BETWEEN '$desde' AND '$hasta';");
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
<div id="resultados">
    <div id="agrega-registros">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td>#</td>
                <td>Fecha</td>
                <td>Proveedor</td>
                <td>CUIT</td>
                <td>Contacto</td>
                <td>Correo</td>
                <td>Categoría Insumo</td>
                <td>Marca Insumo</td>
                <td>Modelo Insumo</td>
                <td>Tipo de Servicio</td>
            </tr>
            <?
                while($row = mysql_fetch_array($registro))
                {
                    $fecha=date("d/m/Y", strtotime($row['FEC_ALTA']));
            ?>
            <tr style="background: #fff;" align="center">
                <td><?php echo $row['ID_PROVEEDOR'] ?></td>
                <td><?php echo $fecha ?></td>
                <td><?php echo $row['NOMBRE_RAZON_SOCIAL'] ?></td>
                <td><?php echo $row['PROVEEDOR_CUIT'] ?></td>
                <td><?php echo $row['TELEFONO'] ?></td>
                <td><?php echo $row['CORREO'] ?></td>
                <td><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
                <td><?php echo $row['MARCA_INS_DESC'] ?></td>
                <td><?php echo $row['INS_MODELO_DESC'] ?></td>
                <td><?php echo $row['DESCRIPCION'] ?></td>
            </tr>
            <?php } ?>
    </div>
</div>
<?php } ?>	
