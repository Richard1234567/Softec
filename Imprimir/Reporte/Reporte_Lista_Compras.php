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
?>

<?php 

 $resultado = mysql_query("SELECT * FROM compra WHERE FECHA_COMPRA BETWEEN '$desde' AND '$hasta';") or mysql_error(($conexion));

?>



<div class="header">
	<h3 align="center">Informe de Compras</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr class="table-info" align="center">
            <th class="td">#</th>
            <th class="td">Fec. Compra</th>
            <th class="td">Cantidad Comprada</th>
            <th class="td">Precio Compra</th>
            <th class="td">Precio Venta</th>
            <!--th class="td">Opciones</th-->
        </tr> 
		<?php 
        while ($row = mysql_fetch_array ($resultado)) {
          $fecha=date("d/m/Y", strtotime($row['FECHA_COMPRA']));
          $compra=$row['COMPRA_PRECIO'];
          $venta=$row['COMPRA_VENTA'];
    ?>
        <tr style="background: #fff;" align="center">
          <td class="td"><?php echo $row['ID_COMPRA'] ?></td>
          <td class="td"><?php echo $fecha ?></td>
          <td class="td"><?php echo $row['COMPRA_CANTIDAD'] ?></td>
          <td class="td"><?php echo "$" .number_format ($compra,2); ?></td>
          <td class="td"><?php echo "$" .number_format ($venta,2); ?></td>
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
	$pdf->output('Informe de Equipos.PDF');

?>