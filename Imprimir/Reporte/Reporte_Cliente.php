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

	.detalle {
		width:750px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 15 0 0 0px;
	}

	.cuerpo {
		width:750px;
		height:600px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 
	}

	.pie {
		width:752px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 175 0 0 0px;
		background: #ccc;
	}

	
	.cliente {
		width:200px;
		height:30px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: -1 0 0 0px;
	}

	.cliente-desc {
		width:200px;
		height:30px;
		color:#000000;
		border:solid 1px #fff;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 0px;
	}

	.obs {
		width:551px;
		height:30px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: -64 0 0 201px;
	}

	.obs-desc {
		width:551px;
		height:450px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 201px;
	}

	.precio{
		width: 551px;
		height: 150px;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 201px;
	}

	.sub{
		width: 200px;
		height: 30px;
		border:solid 1px #ccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: -20 0 0 300px; 
	}

	.total{
		width: 200px;
		height: 30px;
		border:solid 1px #ccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: -7 0 0 35px; 

	}

</style>

<?php 
	$cliente= $_GET['id'];
		//$con = new DB;
		//$pacientes = $con->conectar();	
		
		$strConsulta = "select * from diagnostico join equipo on RELA_EQUIPO = ID_EQUIPO join marca on RELA_MARCA = ID_MARCA 
	join modelo on RELA_MODELO = RELA_MODELO join persona on RELA_PERSONA = ID_PERSONA where ID_DIAGNOSTICO = '".$cliente."'";
	
	$cliente = mysql_query($strConsulta);
	
	$fila = mysql_fetch_array($cliente);
?>

<div class="header">
	<h3 align="center">Reporte P/ Equipo</h3>
</div>

<div class="detalle">
	<div style="margin:10 0 0 10px;"><strong>DIRECCIÓN: Fotheringham N°2165</strong></div>
	<div style="margin:20 0 0 10px;"><strong>TELÉFONO: (370)4-430029</strong></div>
	<div style="margin:-45 0 0 590px;"><strong>FECHA: <? echo date("d-m-Y");?></strong></div>
	<div style="margin: 15 0 0 500px;"><strong>E-MAIL: L&Asociados@hotmail.com</strong></div>
</div>

<div class="cuerpo">

	<div class="cliente" align="center"><strong>Cliente:</strong></div>
	<div class="cliente-desc" align="center"><br><? echo $fila['PERSONA_APELLIDO']. ', ' . $fila['PERSONA_APELLIDO']?></div>

	<div class="obs" align="center"><strong>Observación:</strong></div>
	<div class="obs-desc"><br>&nbsp;&nbsp;<?php echo '-' . $fila['DIAGNOSTICO_DESC']?></div>

	<div class="precio">
		<strong style="margin:30 0 0 230px;">Subtotal:</strong><br>
		<div class="sub"><?php echo '&nbsp; $ ' . $fila['PRECIO_TOTAL'] ?></div>
		<strong style="margin:15 0 0 230px;">Desc:</strong>
		<div class="total"><?php echo '&nbsp; $ ' . $porciento ?></div>
		<strong style="margin:15 0 0 230px;">Total:</strong>
		<div class="total"><?php echo '&nbsp; $ ' . $total; ?></div>
	</div>
</div>

<div class="pie"><strong align="center" style="margin-top:20px;">&nbsp;&nbsp;&nbsp;El siguiente Diagnóstico tiene un periodo de válidez de 30 Días a partir de la Fecha <?php echo date("d-m-Y");?>
	pasando ese período de tiempo se deberá realizar un nuevo Diagnóstico.
</strong></div>

<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Diagnostico.PDF');

?>