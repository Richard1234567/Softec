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
$registro = mysql_query("SELECT * FROM compra JOIN tipo_comprobante ON RELA_COMPROBANTE = ID_COMPROBANTE WHERE FECHA_COMPRA BETWEEN '$desde' AND '$hasta';");

?>
<div class="header">
	<h3 align="center">Informe de Compras</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr class="table-info" align="center">
                <td>#</td>
                <td>Fecha Compra</td>
                <td>Compra Cant.</td>
                <td>Pre. Compra</td>
                <td>Pre. Venta</td>
                <td>Subtotal</td>
                <td>IVA</td>
                <td>Total</td>
                <td>N° Comp.</td>
                <td>Tipo Comp.</td>
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


<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Compras.PDF');

?>