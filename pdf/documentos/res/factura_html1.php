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

</style>

<div class="header">
	<h3 align="center">Factura</h3>
</div>

<div class="detalle">
	<div style="margin:10 0 0 80px; "><strong><i><big>LOPEZ PABLO ARIEL</big></i></strong></div>
	<div style="margin:10 0 0 90px;"><strong><i>Fotheringham 2165</i></strong></div>
	<div style="margin:10 0 0 90px;"><strong><i>(3600) - FORMOSA</i></strong></div>
	<div style="margin:10 0 0 70px;"><strong><i>Responsable Monotributo</i></strong></div>
</div>

<div class="recuadro"><?php echo "<h1 <p style='font-size: 62px; text-align:center;'><i>C</i></h1>"; ?></div>

<div class="detalle-n">
	<div style="margin:10 0 0 30px;"><strong>N° 0000 - <?php echo str_pad($numero_factura,8,"0",STR_PAD_LEFT);?> </strong></div>
	<div style="margin:10 0 0 30px;"><strong>FECHA <?php echo date ("d/m/Y") ?></strong></div>
	<div style="margin:10 0 0 30px;"><strong>CUIT N° 23-11945163-9</strong></div>
	<div style="margin:10 0 0 30px;"><strong>Inicio de Actividades 08/09/2004</strong></div>
</div>


<?php 
		$sql_cliente=mysqli_query($con,"select * from persona where ID_PERSONA='$ID_PERSONA'");
		$rw_cliente=mysqli_fetch_array($sql_cliente);
		//echo $rw_cliente['PERSONA_APELLIDO'];
		//echo "<br>";
		//echo $rw_cliente['PERSONA_NOMBRE'];
		//echo "<br> Teléfono: ";
		//echo $rw_cliente['PERSONA_TEL'];
		//echo "<br> Celular: ";
		//echo $rw_cliente['PERSONA_CEL'];
	?>
	<div class="cliente">
		<strong style="margin:5 0 0 5px;"><i>Apellido:</i></strong>&nbsp;<?php echo $rw_cliente['PERSONA_APELLIDO']; ?>
		<strong style="margin:30 0 0 -110px;"><i>Nombre:</i></strong>&nbsp;<?php echo $rw_cliente['PERSONA_NOMBRE']; ?>
		<strong style="margin:-30 0 0 300px;"><i>Celular:</i></strong>&nbsp;<?php echo $rw_cliente['PERSONA_CEL']; ?>
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
		$sql_pago=mysqli_query($con,"select * from modo_pago where ID_MODO_PAGO='$condiciones'");
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
$sql=mysqli_query($con, "select * from insumo,categoria,insumo_marca,insumo_modelo, tmp where insumo.ID_INSUMO = tmp.id_insumo and insumo.RELA_CATEGORIA = categoria.ID_CATEGORIA and insumo.RELA_INS_MARCA = insumo_marca.ID_INS_MARCA and insumo.RELA_INS_MODELO = insumo_modelo.ID_INS_MODELO    and tmp.session_id='".$session_id."'");
while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$id_producto=$row["ID_INSUMO"];
	$codigo_producto=$row['COD_INSUMO'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['CATEGORIA_DESCRIPCION'];
	$marca_producto=$row['MARCA_INS_DESC'];
	$modelo_producto=$row['INS_MODELO_DESC'];
	$m_obra=$row['mano'];
	
	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r + $m_obra;//Sumador
	?>

        <tr>
            <td style="width: 10%;text-align:center" class='midnight-blue'><?php echo $cantidad; ?></td>
            <td style="width: 60%" class='midnight-blue'><?php echo $nombre_producto; echo ','; echo $marca_producto; echo ','; echo $modelo_producto;?></td>
            <td style="width: 10%;text-align:center" class='midnight-blue'><?php echo $precio_venta_f;?></td>
            <td style="width: 15%;text-align:center" class='midnight-blue'><?php echo $precio_total_f;?></td>   
        </tr>
        <?php 
	//Insert en la tabla detalle_cotizacion
	$insert_detail=mysqli_query($con, "INSERT INTO detalle_factura VALUES ('','$numero_factura','$id_producto','$id_falla','$cantidad','$precio_venta_r')");

	$insert_detail_ventas=mysqli_query($con, "INSERT INTO detalle_ventas VALUES ('','$numero_factura','$id_producto','$cantidad','$precio_venta_r')");
	
	//$nums++;
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
	}
	
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
<?php
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO facturas VALUES ('','$numero_factura','$date','$ID_PERSONA','$id_vendedor','$condiciones','$total_factura','1')");
$insert_venta=mysqli_query($con,"INSERT INTO ventas VALUES ('','$numero_factura','$date','$ID_PERSONA','$id_vendedor','$condiciones','$total_factura','1')");
$delete=mysqli_query($con,"DELETE FROM tmp WHERE session_id='".$session_id."'");
?>