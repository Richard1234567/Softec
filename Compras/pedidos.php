<?php

include '../conexion.php';

$ticket = $_POST['ticket'];

$resultado = mysql_query("select * from detalle_pedido join pedido_proveedor on detalle_pedido.id_detalle = pedido_proveedor.id_pedido; ") or mysql_error(($conexion))
?>
<div id="ped">
    <div id='resultados'> 
      <div id="agrega-registros">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
          <tr class="table-info" align="center">
              <td class="td">#</td>
              <td class="td">Fec. Pedido</td>
              
              <td class="td">Cantidad Pedida</td>
              <td class="td">Opciones</td>
          </tr> 
      <?php 
          while ($row = mysql_fetch_array ($resultado)) {
            $fecha=date("d/m/Y", strtotime($row['fecha_pedido']));
            //$compra=$row['COMPRA_PRECIO'];
            //$venta=$row['COMPRA_VENTA'];
      ?>
          <tr style="background: #fff;" align="center">
            <td class="td"><?php echo $row['id_pedido'] ?></td>
            <td class="td"><?php echo $fecha ?></td>
            
            <td class="td"><?php echo $row['cantidad'] ?></td>
            <td>               
              <a href="javascript:eliminarcompra(<?php echo $row['id_pedido']?>);">
                <button type="button" class="btn btn-danger">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                </button>
              </a>
              <a href="#" onclick="imprimir_pedido('<?php echo $row['id_pedido'];?>');">
	              <button type="button" class="btn btn-default">
	                <span class="glyphicon glyphicon-download" aria-hidden="true" title="Descargar Pedido"></span> Ver
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
</div>  
<script type="text/javascript" src="Javascript/imprimir_pedido.js"></script>
<script type="text/javascript" src="Javascript/VentanaCentrada.js"></script>