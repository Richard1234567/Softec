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

$registro = mysql_query("select * from facturas join persona on facturas.ID_PERSONA = persona.ID_PERSONA 
  join operador on facturas.id_vendedor = operador.id join estado_factura on facturas.estado_factura = estado_factura.id_estado_factura
  where fecha_factura between '$desde' and '$hasta'; ");
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
            <td class="td">Fec. Alta</td>
            <td class="td">Cliente</td>
            <td class="td">Vendedor</td>
            <td class="td">Estado</td>
            <td class="td">Monto</td>
            <td class="td">Opciones</td>
        </tr>  
	    
    	<?php 
                while ($row = mysql_fetch_array ($registro)) {
                  $id_factura=$row['id_factura'];
                  //$fecha=date("d/m/Y", strtotime($row['fecha_factura']));
                  $total_venta=$row['total_venta'];
            ?>    
               
                <tr style="background: #fff;" align="center">
                  <td class="td"><?php echo $row['id_factura'] ?></td>
                  <td class="td"><?php echo $row['fecha_factura'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_APELLIDO']. ', ' . $row['PERSONA_NOMBRE']; ?></td>
                  <td class="td"><?php echo $row['US_NOMBRE'] ?></td>
                  <td><span class="label label-success"><?php echo $row['estado_descripcion'] ?></span></td>
                  <td>     
                  <?php echo "$" .number_format ($total_venta,2); ?>
                  </td>
                  <td><a href="#" onclick="imprimir_factura('<?php echo $id_factura;?>');">
                  <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-download" aria-hidden="true" title="Descargar Factura"></span> Ver
                  </button>
                    </a>
                    
                    <!--a target="_blank" href="http://localhost/buscador/Imprimir/Reporte/Reporte_Cliente.php?id=<? //echo $row['ID_PERSONA']?>"><!--button  class="btn" style="background: #428bca; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-print" aria-hidden="true">
                                        </span></button>
                    </a-->                 
                    <!--a href="javascript:eliminarcliente(<?php //echo $row['ID_PERSONA']?>);"><button  class="btn" style="background: #FA5858; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;" title="Eliminar Factura"><span class="glyphicon glyphicon-trash" aria-hidden="true">
                                        </span></button>
                    </a-->
                    </td>  
                </tr>
        <?php         
         }
        ?> 

          </TABLE>
             <?php }
             ?>
        </div> 