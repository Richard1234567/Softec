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

	.detalle-n {
		width: 750px;
		height:20px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 20 0 0 40px;
	}

	.titulo {
		width: 750px;
		height: 30px;
		color: #000000;
		border: solid 1px #ccc;
		margin: 20 0 0 40px;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
	}

	.proveedor{
		width: 750px;
		height: 30px;
		color: #000000;
		border: solid 1px #ccc;
		margin: 20 0 0 40px;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
	}

	.detalle {
		width: 750px;
		height: 600px;
		color: #ccc;
		border: solid 1px color: #ccc;
		margin: 20 0 0 40px;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
	}

</style>

<div class="header">
	<h3 align="center">Orden de Compras</h3>
</div>

<div class="detalle-n">
	<div style="margin:10 0 0 30px;"><strong>LÓPEZ & ASOCIADOS</strong></div>
	<div style="margin:10 0 0 30px;"><strong>Dirección: Fotheringham 2165</strong></div>
	<div style="margin:10 0 0 30px;"><strong>Teléfono: 3704-429030</strong></div>
	<div style="margin:10 0 0 30px;"><strong>(3600) - FORMOSA</strong></div>
	<div style="margin:-90 0 0 390px;"><strong>N° Pedido: <?php echo str_pad($numero_pedido,8,"0",STR_PAD_LEFT);?></strong></div>
	<div style="margin:33 0 0 390px;"><strong>Fecha de Compra: <?php echo date("d/m/Y");?></strong></div>
</div>

<?php 
$sql_proveedor=mysqli_query($con,"select * from proveedor where ID_PROVEEDOR='$ID_PROVEEDOR'");
$rw_proveedor=mysqli_fetch_array($sql_proveedor);
?>

<?php 
$sql_vendedor=mysqli_query($con,"select * from operador where id='$id_vendedor'");
$rw_vendedor=mysqli_fetch_array($sql_vendedor);
?>

<div class="proveedor">
	<div style="margin:10 0 0 30px;"><strong>Cód. Proveedor: </strong><?php echo $rw_proveedor['COD_PROVEEDOR']; ?></div>
	<div style="margin:-15 0 0 390px;"><strong>Nombre Proveedor: </strong><?php echo $rw_proveedor['NOMBRE_RAZON_SOCIAL']; ?></div>
	<div style="margin:10 0 0 390px;"><strong>Dirección Proveedor: </strong><?php echo $rw_proveedor['CALLE']. ", " .$rw_proveedor['NUMERO']; ?></div>
	<div style="margin:10 0 0 30px;"><strong>Vendedor: </strong><?php echo $rw_vendedor['APELLIDO_OPERADOR']. ", " .$rw_vendedor['NOMBRE_OPERADOR']; ?></div>
	<div style="margin:-40 0 0 30px;"><strong>Teléfono Proveedor: </strong><?php echo $rw_proveedor['TELEFONO']; ?></div>
</div>

<table  class="titulo">
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
	$insert_detail=mysqli_query($con, "INSERT INTO detalle_pedido VALUES ('','$numero_pedido','$id_producto','$cantidad','$precio_venta_r')");
	
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
            <td><strong style="margin:3 0 0 400px;">Total:</strong></td>
            <td style="width: 150px; height: 20px; border:solid 1px #ccc; -moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px; margin: 0 0 0 0px;"> <?php echo number_format($cantidad,2);?></td>
		</tr>
		
        
	</table>
</div>
<?php
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($con,"INSERT INTO pedido_proveedor VALUES ('','$numero_pedido','$date','$ID_PROVEEDOR','$id_vendedor','$total_factura')");
$delete=mysqli_query($con,"DELETE FROM tmp WHERE session_id='".$session_id."'");
?>