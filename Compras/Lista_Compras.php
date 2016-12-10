<?php 
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:../login.php");
}
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM compra") or mysql_error(($conexion));
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
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
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>

<h3 align="center">LISTA DE COMPRAS</h3>
<br>
<h4 align="center">Filtrar Por Fechas</h4> <br>

    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
<form action="Lista_Compras.php">      
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table><br>
</form> 

<table border="0" align="center">
    <tr>
      <td><section class='pedidos'><strong>Pedidos &nbsp;</strong>
          <input type='checkbox' class='checks' name='ped[]'>
        </section>
      </td>
    </tr>
</table><br>

  <div class="container-fluid">
  <div style="margin: 0 0 -35 890px;">
        <td>
              <a href="Historial_Compras.php">
              <button type="button" class="btn btn-default">
                <span class="fa fa-archive" aria-hidden="true"></span> Historial
              </button>
              </a>
        </td>
    </div>

    <div style="margin: 0 0 -35 990px;">
        <td>
              <a href="Pedidos_Proveedor.php">
              <button type="button" class="btn btn-info">
                <span class="fa fa-credit-card" aria-hidden="true"></span> Pedidos
              </button>
              </a>
        </td>
    </div>

    <div style="margin: 1 0 -35 1090px;">
        <td>
              <a href="Formulario_Compras.php">
              <button type="button" class="btn btn-warning">
                <span class="fa fa-cart-plus" aria-hidden="true"></span> Compras
              </button>
              </a>
        </td>
    </div>

    <div style="margin: 1 0 -30 1200px;">
              <td>
                  <a target="_blank" href="javascript:reportePDF();">
                  <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                  </button>     
                  </a>
              </td>
              
          </div>

          <div style="width: 99%; height: 31px; background: #EEEBEB; margin: 40 0 0 6px;">
              <!--<button class="button1">Borrar</button>-->
              <input type="" placeholder="Buscar Compra" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1090px; width: 220px; height: 30px;">
          </div>
    </div><br>
          <div id="ped">
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
                ?>
                </table>  
              </div>
            </div>
          </div>  
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="Javascript/eliminar_compras.js"></script>
<script type="text/javascript" src="Javascript/busca_fecha_c.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //variavel que recebe os checkbox
    var check = $(".pedidos input:checkbox");
    var msg = $("#ped");
    //evento de change
    check.on("change", function(e) { //abertura da função on()
        //previne erros
        e.preventDefault();
 
        //função ajax()
        $.ajax({
            url : "pedidos.php",
            type : "POST",
            dataType : "html",
            data : $('.checks:checked').serialize()
        }).done(function(data) {
            msg.html(data);
        })
 
    });// finaliza a função on()
  });
</script>
<script type="text/javascript" src="Javascript/imprimir_compras.js"></script>
</body>
</html> 