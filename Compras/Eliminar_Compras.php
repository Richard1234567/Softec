<?php
include('../conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM compra WHERE ID_COMPRA = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM compra ORDER BY ID_COMPRA ASC");

?>
<div id='resultados'> 
    <div id="agrega-registros">
      	<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
	        <tr class="table-info" align="center">
	            <td class="td">#</td>
	            <td class="td">Fec. Compra</td>
	            <td class="td">Cantidad Comprada</td>
	            <td class="td">Precio Compra</td>
	            <td class="td">Precio Venta</td>
	            <td class="td">Opciones</td>
	        </tr> 
		    <?php 
		        while ($row = mysql_fetch_array ($resultado)) {
		    ?>
	        <tr style="background: #fff;" align="center">
	          <td class="td"><?php echo $row['ID_COMPRA'] ?></td>
	          <td class="td"><?php echo $row['FECHA_COMPRA'] ?></td>
	          <td class="td"><?php echo $row['COMPRA_CANTIDAD'] ?></td>
	          <td class="td"><?php echo $row['COMPRA_PRECIO'] ?></td>
	          <td class="td"><?php echo $row['COMPRA_VENTA'] ?></td>
	          <td>               
	            <a href="javascript:eliminarcompra(<?php echo $row['ID_COMPRA']?>);">
	              <button type="button" class="btn btn-danger">
	                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
	              </button>
	            </a>
	          </td>
          	</tr>
	      <?php         
	        }
	      ?>
      	</table>  
    </div>
</div>      	