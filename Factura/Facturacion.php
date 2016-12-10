<?php

include '../conexion.php';

$ticket = $_POST['ticket'];

$resultado = mysql_query("select * from facturas join persona on facturas.ID_PERSONA = persona.ID_PERSONA 
join detalle_factura on detalle_factura.id_detalle = facturas.id_factura join operador on facturas.id_vendedor = operador.id
join estado_factura on facturas.estado_factura = estado_factura.id_estado_factura;") or mysql_error(($conexion))
?>

<div id="pre">
  <div id="rep">
    <div id="frases">
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
                while ($row = mysql_fetch_array ($resultado)) {
                  $id_factura=$row['id_factura'];
                  $fecha=date("d/m/Y", strtotime($row['fecha_factura']));
                  $total_venta=$row['total_venta'];
            ?>    
               
              <tr style="background: #fff;" align="center">
                <td class="td"><?php echo $row['id_factura'] ?></td>
                <td class="td"><?php echo $fecha ?></td>
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
        </div>
      </div> 
    </div>
  </div>
</div>    
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script src="../js/Buscar_Clientes.js" language="javascript"></script>
<script type="text/javascript" src="Javascript/busca_fecha.js"></script>
<script type="text/javascript" src="Javascript/busca_factura.js"></script>
<!--script type="text/javascript" src="js/eliminar_cliente.js"></script-->
<script type="text/javascript" src="Javascript/VentanaCentrada.js"></script>
<script type="text/javascript" src="Javascript/facturas.js"></script>
<script type="text/javascript" src="javascript/imprimir_facturas.js"></script>
<script type="text/javascript" src="js/busca_fecha_fac.js"></script>
<script type="text/javascript" src="js/imprimir_r_ventas.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          //variavel que recebe os checkbox
          var check = $(".categoria input:checkbox");
          var msg = $("#frases");
          //evento de change
          check.on("change", function(e) { //abertura da função on()
              //previne erros
              e.preventDefault();
       
              //função ajax()
              $.ajax({
                  url : "processaDados.php",
                  type : "POST",
                  dataType : "html",
                  data : $('.checks:checked').serialize()
              }).done(function(data) {
                  msg.html(data);
              })
       
          });// finaliza a função on()
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
          //variavel que recebe os checkbox
          var fac = $(".facturas input:checkbox");
          var msg = $("#fac");
          //evento de change
          fac.on("change", function(e) { //abertura da função on()
              //previne erros
              e.preventDefault();
       
              //função ajax()
              $.ajax({
                  url : "Facturacion.php",
                  type : "POST",
                  dataType : "html",
                  data : $('.checks:checked').serialize()
              }).done(function(data) {
                  msg.html(data);
              })
       
          });// finaliza a função on()
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
          //variavel que recebe os checkbox
          var pre = $(".presupuesto input:checkbox");
          var msg = $("#pre");
          //evento de change
          pre.on("change", function(e) { //abertura da função on()
              //previne erros
              e.preventDefault();
       
              //função ajax()
              $.ajax({
                  url : "Presupuesto.php",
                  type : "POST",
                  dataType : "html",
                  data : $('.checks:checked').serialize()
              }).done(function(data) {
                  msg.html(data);
              })
       
          });// finaliza a função on()
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
          //variavel que recebe os checkbox
          var rep = $(".reparaciones input:checkbox");
          var msg = $("#rep");
          //evento de change
          rep.on("change", function(e) { //abertura da função on()
              //previne erros
              e.preventDefault();
       
              //função ajax()
              $.ajax({
                  url : "Reparaciones.php",
                  type : "POST",
                  dataType : "html",
                  data : $('.checks:checked').serialize()
              }).done(function(data) {
                  msg.html(data);
              })
       
          });// finaliza a função on()
      });
    </script>