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
  join operador on facturas.id_vendedor = operador.id join estado_factura on facturas.estado_factura = estado_factura.id_estado_factura
  where fecha_factura between '$desde' and '$hasta'; ");

?>

<div class="header">
	<h3 align="center">Informe de Facturas</h3>
</div><br>
<table align="center" border="1" WIDTH=200>
	<tr align="center" class="tr">
		<td WIDTH=70>#</td>
        <td WIDTH=80>Fec. Alta</td>
        <td WIDTH=200>Cliente</td>
        <td WIDTH=150>Vendedor</td>
        <td WIDTH=70>Estado</td>
        <td WIDTH=100>Monto</td>
        <!--td WIDTH=60>Cantidad</td>
        <td WIDTH=100>Estado</td-->
	</tr>
	<?php 
		while ($row = mysql_fetch_array ($registro)) {
          $id_factura=$row['id_factura'];
          $fecha=date("d/m/Y", strtotime($row['fecha_factura']));
          $total_venta=$row['total_venta'];
	?>
	<tr align="center">
		<td WIDTH=70><?php echo $row['id_factura']?></td>
        <td WIDTH=80><?php echo $fecha ?></td>
        <td WIDTH=200><?php echo $row['PERSONA_APELLIDO']. ', ' . $row['PERSONA_NOMBRE'];  ?></td>
        <td WIDTH=150><?php  echo $row['US_NOMBRE']  ?></td>
        <td WIDTH=70><span class="label label-success"><?php echo $row['estado_descripcion'] ?></span></td>
        <td WIDTH=100><?php echo "$" .number_format ($total_venta,2); ?></td>
	</tr>
	<?php     
      }
    
    ?>
</table>
<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Facturas.PDF');

?>