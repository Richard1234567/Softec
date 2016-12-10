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

//echo $desde, $hasta;
//exit();
//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$registro = mysql_query("select * from facturas join persona on facturas.ID_PERSONA = persona.ID_PERSONA 
join detalle_factura on detalle_factura.id_detalle = facturas.id_factura join operador on facturas.id_vendedor = operador.id
join estado_factura on facturas.estado_factura = estado_factura.id_estado_factura join falla on detalle_factura.id_falla = falla.ID_FALLA
join precio on RELA_PRECIO = ID_PRECIO WHERE fecha_factura  BETWEEN '$desde' AND '$hasta';");
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
                <td class="td">Falla Descripción</td>
                <td class="td">Usuario</td>
                <td class="td">Estado</td>
                <td class="td">Monto</td>
                </tr> 
            <?php 
                while ($row = mysql_fetch_array ($registro)) {
                  $id_factura=$row['id_factura'];
                  $fecha=date("d/m/Y", strtotime($row['fecha_factura']));
                  $total_venta=$row['PRECIO_DESCRIPCION'];
            ?>    
               
              <tr style="background: #fff;" align="center">
                <td class="td"><?php echo $row['id_factura'] ?></td>
                <td class="td"><?php echo $fecha ?></td>
                <td class="td"><?php echo $row['PERSONA_APELLIDO']. ', ' . $row['PERSONA_NOMBRE']; ?></td>
                <td class="td"><?php echo $row['FALLA_DESC'] ?></td>
                <td class="td"><?php echo $row['US_NOMBRE'] ?></td>
                <td><span class="label label-success"><?php echo $row['estado_descripcion'] ?></span></td>
                <td>     
                <?php echo "$" .number_format ($total_venta,2); ?>
                </td>
                
              </tr>
          <?php         
           }
          ?> 
          </TABLE>  
          <?php         
           }
          ?>
        </div>
      </div> 
    </div>
  </div>
</div> 		
<script type="text/javascript" src="Javascript/busca_fecha_reparaciones.js"></script>
<script type="text/javascript" src="Javascript/imprimir_r_reparaciones.js"></script>
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