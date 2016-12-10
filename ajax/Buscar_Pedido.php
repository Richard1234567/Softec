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
?>	

		<div class="table-responsive">
			<table class="table" id="resultados">
				<tr class="info">
					<th>CÓD. PRODUCTO</th>
					<th>CATEGORÍA</th>
					<th>MARCA</th>
					<th>MODELO</th>
					<th>CANTIDAD</th>
					<th>STOCK</th>
					<th>OPCIÓN</th>
				</tr> 
                <?php  
				while ($row = mysql_fetch_array ($resultado)) { 
				$id_producto = $row['ID_INSUMO'];
				$categoria = $row['CATEGORIA_DESCRIPCION'];
				?>
				<tr>
					<td><?php  echo $row['COD_INSUMO']; ?></td>
					<td><?php  echo $categoria; ?></td>
					<td><?php  echo $row['MARCA_INS_DESC']; ?></td>
					<td><?php  echo $row['INS_MODELO_DESC']; ?></td>
					<td class='col-xs-1'><div class="pull-right">
						<input type="text" class="form-control"  style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div>
					</td>
					<td class='col-xs-1'><div class="pull-right">
						<input type="text" class="form-control" disabled style="text-align:right" value="<?php echo $row['INSUMO_CANTIDAD']?>" >
						</div>
					</td>
					<td class='text-center'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a>
					</td>
				</tr>   
                    <?         
                    } 
                    ?>
                <tr>
					<td colspan=7><span class="pull-right"><?
						 echo paginate($reload, $page, $total_pages, $adjacents);
						?></span>
					</td>
				</tr>    
            </table>
		</div>	
<?php
		}
	
	}	
?>