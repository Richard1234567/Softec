<?php 

	include '../conexion.php';
	//$c = new Buscador;
	//$c->Conectar();
	$q = $_GET['q'];
			

	$query = mysql_query("SELECT * FROM historico_compra JOIN insumo ON historico_compra.ID_INSUMO = insumo.COD_INSUMO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO WHERE CATEGORIA_DESCRIPCION  LIKE '%$q%' ORDER BY ID_HISTORICO ASC");
?>	
	<?php 
		if (mysql_num_rows($query)<=0){
	?>		
		<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
			<tr class="table-info" align="center">
				<td class="td">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
			</tr>
		</table>

	<?php	
		} else {
	?>		
		<div id="agrega-registros">
			<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
	            <tr class="table-info" align="center">
	                <td class="td">#</td>
	                <td class="td">Fec. Compra</td>
	                <td class="td">Categoría Insumo</td>
	                <td class="td">Marca Insumo</td>
	                <td class="td">Modelo Insumo</td>
	                <td class="td">Cantidad Comprada</td>
	                <td class="td">Precio Compra</td>
	                <td class="td">Precio Venta</td>
	                <!--td class="td">Opciones</td-->
            	</tr> 
	        <?php         
					
				while($row = mysql_fetch_array($query)){
                $fecha=date("d/m/Y", strtotime($row['FECHA_COMPRA_H']));
                $compra=$row['PRECIO_COMPRA_H'];
                $venta=$row['PRECIO_VENTA_H'];
			?>		
		    <tr style="background: #fff;" align="center">
              <td class="td"><?php echo $row['ID_HISTORICO'] ?></td>
              <td class="td"><?php echo $fecha ?></td>
              <td class="td"><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
              <td class="td"><?php echo $row['MARCA_INS_DESC'] ?></td>
              <td class="td"><?php echo $row['INS_MODELO_DESC'] ?></td>
              <td class="td"><?php echo $row['INSUMO_CANTIDAD'] ?></td>
              <td class="td"><?php echo "$" .number_format ($compra,2); ?></td>
              <td class="td"><?php echo "$" .number_format ($venta,2); ?></td>
              <!--td>               
                <a href="javascript:eliminarcompra(<?php //echo $row['ID_HISTORICO']?>);">
                  <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                  </button>
                </a>
              </td-->
            </tr>
			<?php	
			 }
			?>
			</table>
			<?php 
				}
			?>
		</div>	