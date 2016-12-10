<?php

	include 'config.php';

	ob_start();

?>
<style type="text/css">
	.header {
		width:760px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		background: #ccc;
	}

	.tr {
		background: white;
	}

	.tabla {
		width: auto;
		height: auto;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 -15px;
		
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
$registro = mysql_query("SELECT * FROM insumo JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA
JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN proveedor ON RELA_PROVEEDOR = ID_PROVEEDOR 
JOIN tipo_servicio ON RELA_TIPO_SERVICIO = ID_TIPO_SERVICIO WHERE FECH_ALTA BETWEEN '$desde' AND '$hasta';");

?>
<div class="header">
	<h3 align="center">Informe de Proveedores</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr align="center">
			<th>#</th>
            <th>Fecha</th>
            <th>Proveedor</th>
            <th>CUIT</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Categoría Insumo</th>
            <th>Marca Insumo</th>
            <th>Modelo Insumo</th>
            <th>Servicio</th>
		</tr>
		<?
                while($row = mysql_fetch_array($registro))
                {
                    $fecha=date("d/m/Y", strtotime($row['FECH_ALTA']));
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
	</table>
</div>


<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Proveedores.PDF');

?>