<?php

	include 'config.php';

	ob_start();

?>
<style type="text/css">
	.header {
		width:750px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		background: #ccc;
	}

	.tr {
		background: #ccc;
	}
</style>

<?php 
if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
?>

<?php 

//CONSULTA
$registro = mysql_query("select * from facturas join persona on facturas.ID_PERSONA = persona.ID_PERSONA 
join detalle_factura on detalle_factura.id_detalle = facturas.id_factura join operador on facturas.id_vendedor = operador.id
join estado_factura on facturas.estado_factura = estado_factura.id_estado_factura join falla on detalle_factura.id_falla = falla.ID_FALLA
join precio on RELA_PRECIO = ID_PRECIO WHERE fecha_factura  BETWEEN '$desde' AND '$hasta';");

?>
<div class="header">
	<h3 align="center">Informe de Reparaciones</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr class="table-info" align="center">
          	<th class="td">#</th>
            <th class="td">Fec. Alta</th>
            <th class="td">Cliente</th>
            <th class="td">Falla Descripción</th>
            <th class="td">Usuario</th>
            <th class="td">Estado</th>
            <th class="td">Monto</th>
      	</tr>
		<?php 
                while ($row = mysql_fetch_array ($registro)) {
                  $id_factura=$row['id_factura'];
                  $fecha=date("d/m/Y", strtotime($row['fecha_factura']));
                  $total_venta=$row['PRECIO_DESCRIPCION'];
            ?>    
               
              <tr style="background: #fff;" align="center">
                <td class="td"><?php echo $row['id_factura'] ?></td>
                <td class="td"><?php echo $fecha ?></td>
                <td class="td"><?php echo $row['PERSONA_APELLIDO']. ', ' . $row['PERSONA_NOMBRE']; ?></td>
                <td class="td"><?php echo $row['FALLA_DESC'] ?></td>
                <td class="td"><?php echo $row['US_NOMBRE'] ?></td>
                <td><span class="label label-success"><?php echo $row['estado_descripcion'] ?></span></td>
                <td>     
                <?php echo "$" .number_format ($total_venta,2); ?>
                </td>
                
              </tr>
            <?php } ?>
	</table>
</div>
<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Facturas.PDF');

?>