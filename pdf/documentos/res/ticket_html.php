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
		height:30px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 15 0 0 250px;
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

	.fecha {
		margin: 30 0 0 474px;
	}

	.hora {
		margin: -15 0 0 674px;
	}

	.cajero {
		margin: -13 0 0 100px;
	}

	.cantidad {
		margin: 20 0 0 100px;
	}

	.descripcion {
		margin: -13 0 0 300px;
	}

	.precio {
		margin: -13 0 0 700px;
	}

</style>

<div class="header">
	<h3 align="center">Ticket</h3>
</div>


<div style="margin:10 0 0 80px; "><strong><i><big>LOPEZ PABLO ARIEL</big></i></strong></div>
<div style="margin:10 0 0 85px; "><i>CUIT N° 23-11945163-9</i></div>
<div style="margin:10 0 0 90px; "><i>A CONSUMIDOR FINAL</i></div>
<div style="margin:10 0 0 100px; "><i>N° TICKET <?php echo str_pad($numero_ticket,8,"0",STR_PAD_LEFT); ?></i></div>


<div class="fecha"><i>Fecha: <?php  echo date("d/m/Y"); ?></i></div>
<div class="hora"><i>Hora: <?php  echo date("h:m:s"); ?></i></div>
	<?php 
		$sql_user=mysqli_query($con,"select * from operador where id='$id_vendedor'");
		$rw_user=mysqli_fetch_array($sql_user);
		//echo $rw_user['US_NOMBRE']." ".$rw_user['OPERDOR_TEL'];
	?>
<div class="cajero"><i>Cajero: <?php  echo $rw_user['US_NOMBRE']; ?></i></div>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; margin:20px;">
        <tr>
            <th style="width: 15%;text-align:center" >CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            
        </tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from insumo,categoria,insumo_marca, insumo_modelo, tmp_ticket where insumo.ID_INSUMO = tmp_ticket.id_insumo and insumo.RELA_CATEGORIA=categoria.ID_CATEGORIA and insumo.RELA_INS_MARCA =  insumo_marca.ID_INS_MARCA and insumo.RELA_INS_MODELO = insumo_modelo.ID_INS_MODELO and tmp_ticket.session_id='".$session_id."'");
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
              
        </tr>
        <?php 
			//Insert en la tabla ticket
			
			//Insert en la tabla detalle_cotizacion
			$insert_detail=mysqli_query($con, "INSERT INTO detalle_ticket VALUES ('','$numero_ticket','$id_producto','$cantidad','$precio_venta_r')");

			$insert_detail_ventas=mysqli_query($con, "INSERT INTO detalle_ticket_ventas VALUES ('','$numero_ticket','$id_producto','$cantidad','$precio_venta_r')");

			//$nums++;
			}
			$subtotal=number_format($sumador_total,2,'.','');
			//$mano_obra=
			//$descuento=($subtotal * 10 )/100;
			$cantidad = $subtotal;
			$b = 1500;
			$c = 1000;
			$d = 700;

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


	<table style="margin: 5 0 0 110px;">
		
        <tr>
		<td><strong style="margin:3 0 0 400px;">Total:</strong></td>
            <td style="width: 150px; height: 20px; border:solid 1px #ccc; -moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px; margin: 0 0 0 0px;"> <?php echo number_format($total_factura,2); //.number_format($total_factura,2);?></td>
        </tr>
	</table>

	<br>
	<div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>

<?php
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO ticket VALUES ('','$numero_ticket','$date','$id_vendedor','$total_factura')");
$insert_venta=mysqli_query($con,"INSERT INTO ticket_ventas VALUES ('','$numero_ticket','$date','$id_vendedor','$total_factura')");
$delete=mysqli_query($con,"DELETE FROM tmp_ticket WHERE session_id='".$session_id."'");
?>