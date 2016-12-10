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
		margin: 20 0 0 40px;
	}

	.detalle {
		width:330px;
		height:20px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 15 0 0 40px;
	}

	.detalle-n {
		width:360px;
		height:20px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin:-102 0 0 430px;
	}

	.cuerpo {
		width: 755px;
		height: 500px;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 40px;
	}
	
	.cliente {
		width:753px;
		height:30px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 40px;
	}

	.vendedor {
		width:753px;
		height:30px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 40px;
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

	.detalles {
		width:753px;
		height:40px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: -1 0 0 40px;
	}


	.precio{
		width: 755px;
		height: 100px;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 40px;
	}

	.recuadro {
		width: 55px;
		height: 10px;
		border:solid 1px #ccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: -101 0 0 374px;
	}
	.pie {
		width:752px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 250 0 0 40px;
		background: #ccc;
	}

</style>

<div class="header">
	<h3 align="center">Presupuesto</h3>
</div>

<div class="detalle">
	<div style="margin:10 0 0 80px; "><strong><i><big>LOPEZ PABLO ARIEL</big></i></strong></div>
	<div style="margin:10 0 0 90px;"><strong><i>Fotheringham 2165</i></strong></div>
	<div style="margin:10 0 0 90px;"><strong><i>(3600) - FORMOSA</i></strong></div>
	<div style="margin:10 0 0 70px;"><strong><i>Responsable Monotributo</i></strong></div>
</div>

<div class="recuadro"><?php echo "<h1 <p style='font-size: 62px; text-align:center;'>X</h1>"; ?></div>

<div class="detalle-n">
	<div style="margin:10 0 0 30px;"><strong>N° 0000 - <?php echo str_pad($numero_presupuesto,8,"0",STR_PAD_LEFT);?> </strong></div>
	<div style="margin:10 0 0 30px;"><strong>FECHA <?php echo date ("d/m/Y") ?></strong></div>
	<div style="margin:10 0 0 30px;"><strong>CUIT N° 23-11945163-9</strong></div>
	<div style="margin:10 0 0 30px;"><strong>Inicio de Actividades 08/09/2004</strong></div>
</div>

	<?php 
		
		$nombre = $_GET['PERSONA_NOMBRE'];
		$apellido = $_GET['PERSONA_APELLIDO'];
		$celular = $_GET['PERSONA_CEL'];
		$telefono = $_GET['PERSONA_TEL'];
		
	?>
	<div class="cliente">
		<strong style="margin:5 0 0 5px;"><i>Apellido:</i></strong>&nbsp;<?php echo $apellido = ucwords($apellido);?>
		<strong style="margin:30 0 0 -110px;"><i>Nombre:</i></strong>&nbsp;<?php echo $nombre = ucwords($nombre); ?>
		<strong style="margin:-30 0 0 300px;"><i>Celular:</i></strong>&nbsp;<?php echo $celular; ?>
		<strong style="margin: 30 0 0 -130px;"><i>Teléfono:</i></strong>&nbsp;<?php echo $telefono; ?>
	</div>

	<?php 
		$sql_user=mysqli_query($con,"select * from operador where id='$id_vendedor'");
		$rw_user=mysqli_fetch_array($sql_user);
		//echo $rw_user['US_NOMBRE']." ".$rw_user['OPERDOR_TEL'];
	?>
	<div class="vendedor">
		<strong style="margin:5 0 0 5px;"><i>Vendedor:</i></strong>&nbsp;<?php echo $rw_user['US_NOMBRE']; ?>
		<strong style="margin:30 0 0 -130px;"><i>Contacto:</i></strong>&nbsp;<?php echo $rw_user['OPERDOR_TEL']; ?>
		<strong style="margin:-30 0 0 330px;"><i>Fecha:</i></strong>&nbsp;<?php echo date("d/m/Y"); ?>
	<?php 
		$sql_pago=mysqli_query($con,"select * from modo_pago where ID_MODO_PAGO='$condicion'");
		$rw_pago=mysqli_fetch_array($sql_pago);
		//echo $rw_user['US_NOMBRE']." ".$rw_user['OPERDOR_TEL'];
	?>	
		<strong style="margin:30 0 0 -120px;"><i>F/Pago:</i></strong>&nbsp;<?php echo $rw_pago['PAGO_DESCRIPCION']; ?>
	</div>

	<table  class="detalles">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
        </tr>
        <?php
$sumador_total=0;
$sql=mysqli_query($con, "select * from insumo, tmp_presupuesto, categoria, insumo_marca, insumo_modelo where insumo.ID_INSUMO=tmp_presupuesto.id_insumo and insumo.RELA_CATEGORIA = categoria.ID_CATEGORIA and insumo.RELA_INS_MARCA =  insumo_marca.ID_INS_MARCA and insumo.RELA_INS_MODELO = insumo_modelo.ID_INS_MODELO and tmp_presupuesto.session_id='".$session_id."'");
while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$id_producto=$row["ID_INSUMO"];
	$codigo_producto=$row['COD_INSUMO'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['CATEGORIA_DESCRIPCION'];
	$marca_producto=$row['MARCA_INS_DESC'];
	$modelo_producto=$row['INS_MODELO_DESC'];
	
	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	?>

        <tr>
            <td style="width: 10%;text-align:center" class='midnight-blue'><?php echo $cantidad; ?></td>
            <td style="width: 60%" class='midnight-blue'><?php echo $nombre_producto; echo ','; echo $marca_producto; echo ','; echo $modelo_producto;?></td>
            <td style="width: 10%;text-align:center" class='midnight-blue'><?php echo $precio_venta_f;?></td>
            <td style="width: 15%;text-align:center" class='midnight-blue'><?php echo $precio_total_f;?></td>   
        </tr>
        <?php 
	//Insert en la tabla detalle_presupuesto
    $insert_detail=mysqli_query($con, "INSERT INTO detalle_presupuesto VALUES ('','$numero_presupuesto','$id_producto','$cantidad','$precio_venta_r')");
	
	
	//$nums++;
	}
	$subtotal=number_format($sumador_total,2,'.','');
	//$mano_obra=
	//$descuento=($subtotal * 10 )/100;
	$cantidad = $subtotal;
	$b = 2000;
	$c = 1500;
	$d = 900;

	if ($cantidad >= $b) {
	    $porciento = number_format($cantidad*0.15 ,2, '.', '');
	    //$porciento =  porcentaje($cantidad,$porciento,2);
	    //echo $porciento;
	} elseif ($cantidad >= $c) {
	    $porciento = number_format($cantidad*0.10 ,2, '.', '');
	    //$porciento =  porcentaje($cantidad,$porciento,2);
	    //echo $porciento;
	} elseif ($cantidad >= $d)  {
	    $porciento = number_format($cantidad*0.05 ,2, '.', '');
	    //$porciento =  porcentaje($cantidad,$porciento,2);
	    //echo $porciento;
	}
	  else {
	  	//echo $porciento;
	  }
	$descuento=number_format($porciento,2,'.','');
	$total_factura=$cantidad-$descuento;
?>
    </table> 


<div class="precio">
	<table style="margin: 5 0 0 110px;">
		<tr>
            <td><strong style="margin:3 0 0 400px;">Subtotal:</strong></td>
            <td style="width: 150px; height: 20px; border:solid 1px #ccc; -moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px; margin: 0 0 0 0px;"> <?php echo number_format($cantidad,2);?></td>
		</tr>
		<tr>
		<td><strong style="margin:3 0 0 400px;">Descuento:</strong></td>
            <td style="width: 150px; height: 20px; border:solid 1px #ccc; -moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px; margin: 0 0 0 0px;"> <?php echo number_format($descuento,2);?></td>
        </tr>
        <tr>
		<td><strong style="margin:3 0 0 400px;">Total:</strong></td>
            <td style="width: 150px; height: 20px; border:solid 1px #ccc; -moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px; margin: 0 0 0 0px;"> <?php echo number_format($total_factura,2); //.number_format($total_factura,2);?></td>
        </tr>
	</table>
</div>

<div class="pie"><strong align="center" style="margin-top:20px;">&nbsp;&nbsp;&nbsp;El siguiente Presupuesto tiene un periodo de válidez de 15 Días a partir de la Fecha <?php echo date("d-m-Y");?>
	pasando ese período de tiempo se deberá realizar un nuevo Presupuesto.
</strong></div>
<?php
//Insert en la tabla de presupuesto
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO presupuesto VALUES ('','$numero_presupuesto','$date','$ID_PERSONA','$condicion','$total_factura','$id_vendedor')");
$delete=mysqli_query($con,"DELETE FROM tmp_presupuesto WHERE session_id='".$session_id."'");
?>