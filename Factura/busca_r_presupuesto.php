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
$registro = mysql_query("SELECT * FROM detalle_presupuesto join presupuesto ON detalle_presupuesto.numero_presupuesto = presupuesto.numero_presupuesto JOIN insumo ON detalle_presupuesto.id_producto = insumo.ID_INSUMO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO
	JOIN operador ON presupuesto.id = operador.id 
	JOIN persona ON presupuesto.ID_PERSONA = persona.ID_PERSONA WHERE FECHA_PRESUPUESTO BETWEEN '$desde' AND '$hasta';");
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
		    <div id="agrega-registros">
		        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
		              <tr class="table-info" align="center">
		                  <td>#</td>
		                  <td>Fecha Presupuesto</td>
		                  <td>Cliente</td>
		                  <td>DNI</td>
		                  <td>Contacto</td>
		                  <td>Categoría Insumo</td>
		                  <td>Marca Insumo</td>
		                  <td>Modelo Insumo</td>
		                  <td>Vendedor</td>
		              </tr>
		              <?
		                  while($row = mysql_fetch_array($registro))
		                  {
		                      $fecha=date("d/m/Y", strtotime($row['FECHA_PRESUPUESTO']));
		                      //$total_venta=$row['total_venta'];
		              ?>
		              <tr style="background: #fff;" align="center">
		                  <td><?php echo $row['ID_PRESUPUESTO'] ?></td>
		                  <td><?php echo $fecha ?></td>
		                  <td><?php echo $row['PERSONA_APELLIDO']. ", " .$row['PERSONA_NOMBRE'] ?></td>
		                  <td><?php echo $row['PERSONA_DNI'] ?></td>
		                  <td><?php echo $row['PERSONA_TEL']. ", " .$row['PERSONA_CEL'] ?></td>
		                  <td><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
		                  <td><?php echo $row['MARCA_INS_DESC'] ?></td>
		                  <td><?php echo $row['INS_MODELO_DESC'] ?></td>
		                  <td><?php echo $row['US_NOMBRE'] ?></td>
		              </tr>
		              <?php } ?>
		          </table>
		          <?php } ?>
		    </div>
		</div>
	</div>
</div>		
<script type="text/javascript" src="Javascript/busca_fecha_presupuesto.js"></script>
<script type="text/javascript" src="Javascript/imprimir_r_presupuesto.js"></script>
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