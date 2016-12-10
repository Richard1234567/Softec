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
		margin: 0 0 0 170px;
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

 $resultado = mysql_query("SELECT * FROM persona WHERE PERSONA_FEC_ALTA BETWEEN '$desde' AND '$hasta';") or mysql_error(($conexion));

?>



<div class="header">
	<h3 align="center">Informe de Clientes</h3>
</div><br>

<table align="center" border="1" WIDTH=200>
	<tr align="center" class="tr">
		<td WIDTH=80>Fecha de Alta</td>
		<td WIDTH=90>Apellido/s Clie</td>
		<td WIDTH=70>Nombre/s Clie</td>
		<td WIDTH=70>D.N.I</td>
		<td WIDTH=65>Teléfono</td>
		<td WIDTH=65>Celular</td>
		<td WIDTH=100>Domicilio</td>
		<!--td WIDTH=100>Proveedor/es</td-->
	</tr>
	<?php while ($reg = mysql_fetch_array($resultado)) { ?>
	<tr align="center">
		<td WIDTH=90><?php echo $reg['PERSONA_FEC_ALTA'] ?></td>
		<td WIDTH=130><?php echo $reg['PERSONA_APELLIDO'] ?></td>
		<td WIDTH=130><?php echo $reg['PERSONA_NOMBRE'] ?></td>
		<td WIDTH=70><?php echo $reg['PERSONA_DNI'] ?></td>
		<td WIDTH=80><?php echo $reg['PERSONA_TEL'] ?></td>
		<td WIDTH=80><?php echo $reg['PERSONA_CEL'] ?></td>
		<td WIDTH=180><?php echo $reg['PERSONA_CALLE']. ', ' .$reg['PERSONA_NUMERO'] ?></td>
		
	</tr>
	<?php } ?>
</table>


<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('L', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Clientes.PDF');

?>