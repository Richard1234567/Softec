<?php
session_start();
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
//include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id= session_id();

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_total_r'])){$precio_total_r=$_POST['precio_total_r'];}


	/* Connect To Database*/
	//require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	//require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

	include '../conexion.php';
	
if (!empty($id) and !empty($cantidad)  and !empty($precio_total_r))
{
$insert_tmp=mysql_query("INSERT INTO tmp (id_insumo,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_total_r','$session_id')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$delete=mysql_query("DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}

?>
<form id="datos_factura_guardar">
	<table class="table">
		<tr class="info">
			<th class='text-center'>CODIGO</th>
			<th class='text-center'>CANT.</th>
			<th>DESCRIPCION</th>
			<th class='text-right'>PRECIO UNIT.</th>
			<th class='text-right'>PRECIO TOTAL</th>
			<th></th>
		</tr>
	<?php
		$sumador_total=0;
		//$descuento = 20;
		$sql=mysql_query("select * from insumo join categoria on RELA_CATEGORIA = ID_CATEGORIA join tmp on tmp.id_insumo = insumo.ID_INSUMO join insumo_marca on RELA_INS_MARCA = ID_INS_MARCA join insumo_modelo on RELA_INS_MODELO = ID_INS_MODELO
			where insumo.ID_INSUMO = tmp.id_insumo and tmp.session_id = '".$session_id."'");
		while ($row=mysql_fetch_array($sql))
		{
		$id_tmp=$row["id_tmp"];
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

		//$precio_total_d = number_format($descuento*0.20 ,2, '.', '');
		//$total = number_format($precio_total_d+$descuento,2, '.', '');

		$sumador_total+=$precio_total_r;//Sumador
		
	?>
			<tr>
				<td class='text-center'><?php echo $codigo_producto;?></td>
				<td class='text-center'><?php echo $cantidad;?></td>
				<td><?php echo $nombre_producto; echo ','; echo $marca_producto; echo ','; echo $modelo_producto;?></td>
				<td class='text-right'><?php echo $precio_venta_f;?></td>
				<td class='text-right'><?php echo $precio_total_f;?></td>
				<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>	
			<?php
		}
		$subtotal=number_format($sumador_total,2,'.','');
		$descuento=($subtotal * 20 )/100;
		$descuento=number_format($descuento,2,'.','');
		$total_factura=$subtotal-$descuento;

	?>
	<!--tr>
		<td class='text-right' colspan=4>SUBTOTAL $</td>
		<td class='text-right'><?php //echo number_format($subtotal,2);?></td>
		<td></td>
	</tr>

	<tr>
		<td class='text-right' colspan=4>DESCUENTO $</td>
		<td class='text-right'><?php //echo number_format($descuento,2);?></td>
		<td></td>
	</tr-->
	<!--tr>
		<td class='text-right' colspan=4>DESCUENTO  $</td>
		<td class='text-right'><?php //echo number_format($descuento,2);?></td>
		<td></td>
	</tr>
	<tr>
		<td class='text-right' colspan=4>TOTAL $</td>
		<td class='text-right'><?php //echo number_format($total_factura,2);?></td>
		<td></td>
	</tr-->

	</table>

	
</form>	
<?php
//session_destroy(); 
?>