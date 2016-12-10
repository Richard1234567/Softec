<?php

include '../conexion.php';

$q = $_GET['q'];
//echo $q;
//exit();

$sql ="SELECT * FROM insumo join insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA WHERE COD_INSUMO LIKE '%$q%' OR CATEGORIA_DESCRIPCION LIKE '%$q%' ";
	$resultado = mysql_query($sql);
	if (mysql_num_rows($resultado)<=0){
?>
	<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
		<tr class="table-info" align="center">
		<td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
		</tr>
	</table>
<?php		
	} else { 

include 'pagination.php'; 
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 10; //how much records you want to show
$adjacents  = 4; //gap between pages after number of adjacents
$offset = ($page - 1) * $per_page;
//Count the total number of row in your table*/
$count_query   = mysql_query( "SELECT count(*) AS INSUMO_CANTIDAD FROM insumo");
$row= mysql_fetch_array($count_query);
$numrows = $row['INSUMO_CANTIDAD'];
$total_pages = ceil($numrows/$per_page);
$reload = './facturas.php';
//main query to fetch the data
$sql="SELECT * FROM  insumo LIMIT $offset,$per_page";
$query = mysql_query($sql);
//loop through fetched data
if ($numrows>0){
	echo mysql_error($conexion);
?><!--include pagination file-->
<div class="table-responsive table-condensend">
	<table class="table" id="resultados">
		<tr class="info">
			<th>CÓD. PRODUCTO</th>
			<th>CATEGORÍA</th>
			<th>CANTIDAD</th>
			<th>PRECIO COMPRA</th>
			<th>PRECIO VENTA</th>
			<th class='text-center'>OPCIONES</th>
		</tr>
		<?php  
			while ($row = mysql_fetch_array ($resultado)) { 
			$id_producto = $row['ID_INSUMO'];
			$cantidad = $row['INSUMO_CANTIDAD'];
			$precio_venta=$row["INSUMO_PRECIO"];
			$precio_venta=number_format($precio_venta,2);
		?>
		<tr>
			<td><input type="text" class="form-control" value="<?php  echo $row['COD_INSUMO']; ?>" readonly></td>
			<td><input type="text" class="form-control" value="<?php  echo $row['CATEGORIA_DESCRIPCION']; ?>" readonly></td>
			<td class='col-xs-1'><div class="pull-right">
				<input type="text" class="form-control"  style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
				</div>
			</td>
			<td class='col-xs-2'><div class="pull-right">
				<input type="text" class="form-control"  style="text-align:right" id="precio_compra_<?php echo $id_producto; ?>">
				</div>
			</td>
			<td class='col-xs-2'><div class="pull-right">
				<input type="text" class="form-control"  style="text-align:right" id="precio_venta_<?php echo $id_producto; ?>" value="<?php echo $precio_venta;?>" >
				</div>
			</td>
			<td class='text-center'><a class='btn btn-info'href="#" onclick="agrega('<?php echo $id_producto;?>', '<?php echo $row['CATEGORIA_DESCRIPCION'];?>')"><i class="glyphicon glyphicon-plus"></i></a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan=7><span class="pull-right"><?
			 echo paginate($reload, $page, $total_pages, $adjacents);
			?></span></td>
		</tr>
	</table>
</div>	
<?php
	}
}
?>