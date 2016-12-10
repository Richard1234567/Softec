<?php 
session_start();
include '../conexion.php';
$resultado = mysql_query("select * from facturas join persona on facturas.ID_PERSONA = persona.ID_PERSONA 
join detalle_factura on detalle_factura.id_detalle = facturas.id_factura join operador on facturas.id_vendedor = operador.id
join estado_factura on facturas.estado_factura = estado_factura.id_estado_factura") or mysql_error(($conexion));
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link href="../bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="../ico/icono png softec.png">

</head>
<body>
<nav role="navigation" class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../Menu_Ventas.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li"><a href="../Cliente/Lista_Clientes.php">Clientes</a></li>
                <li class="li"><a href="../Equipo/Lista_Equipos.php">Equipos</a></li>
                <li class="li"><a href="../Proveedor/Lista_Proveedor.php">Proveedores</a></li>
                <li class="li"><a href="../Factura/Lista_Facturas.php">Facturación</a></li>
                <li class="li"><a href="../Insumos/Lista_Insumo.php">Insumos</a></li>
                <li class="li"><a href="../Compras/Lista_Compras.php">Compras</a></li>
                <li class="li"><a href="../Reporte/Lista_Reportes.php">Reportes</a></li>
                <li class="li"><a href="../Operadores/Operador_Ventas.php">Actualizar Datos</a></li>
                <li class="li"><a href="../Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
<h3 align="center">LISTA DE FACTURAS</h3>
<br>
<h4 align="center">Filtrar Por Fechas</h4> <br>

    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
<form action="Lista_Facturas.php">      
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table><br>
</form> 

<table border="0" align="center">
    <tr>
      <td><section class='categoria'><strong>Ticket &nbsp;</strong>
          <input type='checkbox' class='checks' name='cat[]'>&nbsp;&nbsp;
        </section>
      </td>
      <td><section class='facturas'><strong>Factura &nbsp;</strong>
          <input type='checkbox' class='checks' name='fac[]'>
        </section>
      </td>
      <td><section class='presupuesto'><strong>Presupuesto &nbsp;</strong>
          <input type='checkbox' class='checks' name='pre[]'>
        </section>
      </td>
      <td><section class='reparaciones'><strong>Reparaciones &nbsp;</strong>
          <input type='checkbox' class='checks' name='rep[]'>
        </section>
      </td>
    </tr>
  </table><br>
    
        <div style="margin: 0 0 -35 710px;">
            <td>
                <a href="Formulario_Ticket.php">
                <button type="button" class="btn btn-info">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ticket
                </button>
                </a>
            </td>
         </div>

        <div style="margin: 0 0 -35 800px;">
            <td>
                <a href="Formulario_Presupuesto.php">
                <button type="button" class="btn btn-success">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Presupuesto
                </button>
                </a>
            </td>
         </div>

        <div style="margin: 0 0 -35 930px;">
            <td>
                <a href="Formulario_Factura.php">
                <button type="button" class="btn btn-warning">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Factura
                </button>
                </a>
            </td>
        </div>

        <div style="margin: 0 0 -35 1030px;">
            <td>
                <a href="index.php">
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Reparaciones
                </button>
                </a>
            </td>
        </div>

        <div style="margin: 0 0 -30 1168px;">
            <td>
                <a target="_blank" href="javascript:reportePDF();">
                  <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                  </button>     
                </a>
            </td>   
        </div>

        <div style="width: 97%; height: 31px; background: #EEEBEB; margin: 40 0 0 20px;">
            <!--<button class="button1">Borrar</button>-->
            <input type="" placeholder="Buscar Facturas" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1090px; width: 220px; height: 30px;">
        </div>
    </div><br>
<?php 
    if(isset($_POST['filtro'])){
                switch($_POST['filtro']){
                  case "todos":
                    $sql = "select * from factura;";
                    break;
                }
              }else{
                $sql = "select * from factura;";
    }    
?> 
    <div id="pre">  
      <div id="rep">  
        <div id="fac">
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

            <!--table align="center">
              <tr> <br>
                <td>
                  <a href="../Menu_Ventas.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
                </td>
              </tr>
            </table-->
         
    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script src="../js/Buscar_Clientes.js" language="javascript"></script>
    <script type="text/javascript" src="Javascript/busca_fecha.js"></script>
    <script type="text/javascript" src="Javascript/busca_factura.js"></script>
    <!--script type="text/javascript" src="js/eliminar_cliente.js"></script-->
    <script type="text/javascript" src="Javascript/VentanaCentrada.js"></script>
    <script type="text/javascript" src="Javascript/facturas.js"></script>
    <script type="text/javascript" src="javascript/imprimir_facturas.js"></script>
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
  </body>
</html>             