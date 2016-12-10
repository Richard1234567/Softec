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
		width: 760px;
		height: auto;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 0px;
		
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

//echo $desde, $hasta;
//exit();
?>
<?php 

//CONSULTA
$registro = mysql_query("SELECT * FROM insumo JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN unidad_medida ON RELA_UNIDAD = ID_UNIDAD JOIN proveedor ON RELA_PROVEEDOR = ID_PROVEEDOR  WHERE FEC_ALTA BETWEEN  '$desde' AND '$hasta';");

?>
<div class="header">
	<h3 align="center">Informe de Insumos</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr class="table-info" align="center">
            <td>#</td>
            <td>Fecha Alta</td>
            <td>Cód. Insumo</td>
            <td>Categ. Insumo</td>
            <td>M. Insumo</td>
            <td>M. Insumo</td>
            <td>Pre. Venta</td>
            <td>Stock Actual</td>
            <td>U. Medida</td>
            <td>Proveedor</td>
        </tr>
		<?
            while($row = mysql_fetch_array($registro))
            {
                $fecha=date("d/m/Y", strtotime($row['FEC_ALTA']));
                $total_venta=$row['INSUMO_PRECIO'];
        ?>
        <tr style="background: #fff;" align="center">
            <td><?php echo $row['ID_INSUMO'] ?></td>
            <td><?php echo $fecha ?></td>
            <td><?php echo $row['COD_INSUMO'] ?></td>
            <td><?php echo $row['CATEGORIA_DESCRIPCION']?></td>
            <td><?php echo $row['MARCA_INS_DESC'] ?></td>
            <td><?php echo $row['INS_MODELO_DESC']?></td>
            <td><?php echo "$" .number_format ($total_venta,2); ?></td>
            <td><?php echo $row['INSUMO_CANTIDAD'] ?></td>
            <td><?php echo $row['UNIDAD_DESCRIPCION'] ?></td>
            <td><?php echo $row['NOMBRE_RAZON_SOCIAL'] ?></td>
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
	$pdf->output('Lista_Insumos.PDF');

?>