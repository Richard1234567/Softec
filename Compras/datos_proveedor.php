<?php
	

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	//include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	//require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	//require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include '../conexion.php';

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $p = mysql_real_escape_string((strip_tags($_REQUEST['p'], ENT_QUOTES)));
		 $aColumns = array('NOMBRE_RAZON_SOCIAL');//Columnas de busqueda
		 $sTable = "proveedor";
		 $sWhere = "";
		if ( $_GET['p'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$p."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysql_query("SELECT count(*) AS numrows FROM $sTable  $sWhere");

		$row= mysql_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere ";
		$query = mysql_query($sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Fecha Alta</th>
					<th>Nombre</th>
					<th><span class="pull-right">Cant.</span></th>
					<th><span class="pull-right">Precio</span></th>
					<th><span class="pull-right">Stock</span></th>
					<th class='text-center' style="width: 36px;">Agregar</th>
				</tr>
				<?php
				while ($row=mysql_fetch_array($query)){
					$id_producto=$row[''];
					$codigo_producto=$row['COD_PROVEEDOR'];
					$nombre_producto=$row[''];
					$stock_producto=$row[''];
					$precio_venta=$row[""];
					$precio_venta=number_format($precio_venta,2);
					?>
					<tr>
						<td><?php echo $codigo_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div></td>
						
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="precio_venta_<?php echo $id_producto; ?>"  value="<?php echo $precio_venta;?>" >
						</div></td>
						<td class='col-xs-1'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right"   value="<?php echo $stock_producto;?>" disabled>
						</div></td>

						<td class='text-center'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=6><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>