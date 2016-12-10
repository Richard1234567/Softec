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
$registro = mysql_query("SELECT * FROM detalle_presupuesto join presupuesto ON detalle_presupuesto.numero_presupuesto = presupuesto.numero_presupuesto JOIN insumo ON detalle_presupuesto.id_producto = insumo.ID_INSUMO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO
	JOIN operador ON presupuesto.id = operador.id 
	JOIN persona ON presupuesto.ID_PERSONA = persona.ID_PERSONA WHERE FECHA_PRESUPUESTO BETWEEN '$desde' AND '$hasta';");

?>
<div class="header">
	<h3 align="center">Informe de Presupuestos</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr class="table-info" align="center">
          <th>#</th>
          <th>Fecha Pre.</th>
          <th>Cliente</th>
          <th>DNI</th>
          <th>Contacto</th>
          <th>Cat. Insumo</th>
          <th>Mar. Insumo</th>
          <th>Mod. Insumo</th>
          <th>Vendedor</th>
      	</tr>
		<?
                while($row = mysql_fetch_array($registro))
                {
                    $fecha=date("d/m/Y", strtotime($row['FECHA_PRESUPUESTO']));
                    //$total_venta=$row['total_venta'];
            ?>
            <tr style="background: #fff;" align="center">
              <td><?php echo $row['ID_PRESUPUESTO'] ?></td>
              <td><?php echo $fecha ?></td>
              <td><?php echo $row['PERSONA_APELLIDO']. ", " .$row['PERSONA_NOMBRE'] ?></td>
              <td><?php echo $row['PERSONA_DNI'] ?></td>
              <td><?php echo $row['PERSONA_CEL'] ?></td>
              <td><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
              <td><?php echo $row['MARCA_INS_DESC'] ?></td>
              <td><?php echo $row['INS_MODELO_DESC'] ?></td>
              <td><?php echo $row['US_NOMBRE'] ?></td>
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
	$pdf->output('Lista_Presupuestos.PDF');

?>