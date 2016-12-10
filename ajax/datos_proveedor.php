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
			<div class="table-responsive"><br>
			  <table class="table" id="tabla">
				<tr  class="info">
					<th>FECHA ALTA</th>
					<th>NOMBRE</th>
					<th>CUIT</th>
					<th>CORREO</th>
					<th>AGREGAR</th>
				</tr>
				<?php
				while ($row=mysql_fetch_array($query)){
					$id_proveedor=$row['ID_PROVEEDOR'];
					$fecha=date("d/m/Y", strtotime($row['FEC_ALTA'])); 
					$nombre_proveedor=$row['NOMBRE_RAZON_SOCIAL'];
					$proveedor_cuit=$row['PROVEEDOR_CUIT'];
					$proveedor_correo=$row['CORREO'];
					$precio_venta=number_format($precio_venta,2);
					?>
					<tr>
						<td><?php echo $fecha; ?></td>
						<td><?php echo $nombre_proveedor; ?></td>
						<td><?php echo $proveedor_cuit;?></td>
						<td><?php echo $proveedor_correo;?></td>
						<td><a class='btn btn-info'href="#" onclick="passRowToForm(<?php echo $nombre_proveedor ?>)">Agregar><i class="glyphicon glyphicon-plus"></i></a></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>