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
$registro = mysql_query("SELECT * FROM compra JOIN tipo_comprobante ON RELA_COMPROBANTE = ID_COMPROBANTE WHERE FECHA_COMPRA BETWEEN '$desde' AND '$hasta';");
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
                <td>Fecha Compra</td>
                <td>Compra Cant.</td>
                <td>Precio Compra</td>
                <td>Precio Venta</td>
                <td>Subtotal</td>
                <td>IVA</td>
                <td>Total</td>
                <td>N° Comprobante</td>
                <td>Tipo Comprobante</td>
            </tr>
            <?
                while($row = mysql_fetch_array($registro))
                {
                    $fecha=date("d/m/Y", strtotime($row['FECHA_COMPRA']));
                    $compra=$row['COMPRA_PRECIO'];
                    $venta=$row['COMPRA_VENTA'];
                    $sub=$row['COMPRA_SUBTOTAL'];
                    $iva=$row['COMPRA_IVA'];
                    $total=$row['COMPRA_TOTAL'];
            ?>
            <tr style="background: #fff;" align="center">
                <td><?php echo $row['ID_COMPRA'] ?></td>
                <td><?php echo $fecha ?></td>
                <td><?php echo $row['COMPRA_CANTIDAD']?></td>
                <td><?php echo "$" .number_format ($compra,2); ?></td>
                <td><?php echo "$" .number_format ($venta,2); ?></td>
                <td><?php echo "$" .number_format ($sub,2); ?></td>
                <td><?php echo "$" .number_format ($iva,2); ?></td>
                <td><?php echo "$" .number_format ($total,2); ?></td>
                <td><?php echo $row['NUM_COMPROBANTE'] ?></td>
                <td><?php echo $row['COMPROBANTE'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<?php } ?>