<?php
include('../conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM compra WHERE FECHA_COMPRA BETWEEN '$desde' AND '$hasta';");
if (mysql_num_rows($registro)<=0){
?>		
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
		<tr class="table-info" align="center">
		<td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
		</tr>
		</table>
<?php		
	} else {
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
        while ($row = mysql_fetch_array ($registro)) {
          $fecha=date("d/m/Y", strtotime($row['FECHA_COMPRA']));
          $compra=$row['COMPRA_PRECIO'];
          $venta=$row['COMPRA_VENTA'];
    ?>
        <tr style="background: #fff;" align="center">
          <td class="td"><?php echo $row['ID_COMPRA'] ?></td>
          <td class="td"><?php echo $fecha ?></td>
          <td class="td"><?php echo $row['COMPRA_CANTIDAD'] ?></td>
          <td class="td"><?php echo "$" .number_format ($compra,2); ?></td>
          <td class="td"><?php echo "$" .number_format ($venta,2); ?></td>
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
    }
      ?>
      </table>
    </div>
</div>      