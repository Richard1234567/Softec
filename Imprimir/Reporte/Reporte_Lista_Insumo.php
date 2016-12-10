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

 $resultado = mysql_query("SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN proveedor ON RELA_PROVEEDOR = ID_PROVEEDOR") or mysql_error(($conexion));

?>



<div class="header">
	<h3 align="center">Informe de Productos</h3>
</div><br>

<table align="center" border="1" WIDTH=200>
	<tr align="center" class="tr">
		<td WIDTH=80>Fecha de Compra</td>
		<td WIDTH=90>Nombre Produ</td>
		<td WIDTH=70>Cantidad</td>
		<td WIDTH=70>Precio</td>
		<td WIDTH=90>Marca</td>
		<td WIDTH=65>Modelo</td>
		<td WIDTH=90>Categoria</td>
		<td WIDTH=100>Proveedor/es</td>
	</tr>
	<?php while ($reg = mysql_fetch_array($resultado)) { ?>
	<tr align="center">
		<td WIDTH=80><?php echo $reg['FEC_ALTA'] ?></td>
		<td WIDTH=80><?php echo $reg['INSUMO_NOMBRE'] ?></td>
		<td WIDTH=70><?php echo $reg['INSUMO_CANTIDAD'] ?></td>
		<td WIDTH=70>$<?php echo $reg['INSUMO_PRECIO'] ?></td>
		<td WIDTH=100><?php echo $reg['MARCA_INS_DESC'] ?></td>
		<td WIDTH=65><?php echo $reg['INS_MODELO_DESC'] ?></td>
		<td WIDTH=90><?php echo $reg['CATEGORIA_DESCRIPCION'] ?></td>
		<td WIDTH=100><?php echo $reg['NOMBRE_RAZON_SOCIAL'] ?></td>
	</tr>
	<?php } ?>
</table>


<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Insumos.PDF');

?>