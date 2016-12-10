<?php 
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:../login.php");
}
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM persona") or mysql_error(($conexion));
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
                <li class="li"><a href="../Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>

<h3 align="center">LISTA DE CLIENTES</h3>
<br>
<?php include 'modal/modal_ficha.php'; ?>
<h4 align="center">Filtrar Por Fechas</h4> <br>

    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
<form action="Lista_Clientes.php">      
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table><br>
</form> 

  <div class="container-fluid">
    <div style="margin: 0 0 -35 1100px;">
      <td>
              <a href="Formulario_Clientes.php">
              <button type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cliente
              </button>
              </a>
        </td>
    </div>

    <div style="margin: 0 0 -30 1200px;">
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
              <input type="" placeholder="Buscar Cliente" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1070px; width: 220px; height: 30px;">
          </div>
    </div>
  </div>  <br>
<?php 
    if(isset($_POST['filtro'])){
                switch($_POST['filtro']){
                  case "todos":
                    $sql = "select * from persona;";
                    break;
                }
              }else{
                $sql = "select * from persona;";
    }    
?> 
          <div id='resultados'> 
            <div id="agrega-registros">
              <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
                <tr class="table-info" align="center">
                    <td class="td">#</td>
                    <td class="td">Fec. Alta</td>
                    <td class="td">Apellido/s</td>
                    <td class="td">Nombre/s</td>
                    <td class="td">D.N.I.</td>
                    <td class="td">Contacto</td>
                    <td class="td">Opciones</td>
                </tr> 
            <?php 
                while ($row = mysql_fetch_array ($resultado)) {
            ?>    
               
                <tr style="background: #fff;" align="center">
                  <td class="td"><?php echo $row['ID_PERSONA'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_FEC_ALTA'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_APELLIDO'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_NOMBRE'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_DNI'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_CEL'] ?></td>
                  <td>
                    <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<?php echo $row['ID_PERSONA']?>">
                    <button type="button" class="btn btn-warning">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                    </button>
                    <a href="http://localhost/buscador/Equipo/Formulario_Equipo_Adm.php?id=<? echo $row['ID_PERSONA']?>">
                    <button type="button" class="btn btn-default">
                      <span class="fa fa-desktop" aria-hidden="true"></span> Equipo
                    </button>
                    </a>                 
                    <a href="http://localhost/buscador/Cliente/Lista_Equipos.php?id=<? echo $row['ID_PERSONA']?>">
                    <button type="button" class="btn btn-info">
                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ver
                    </button>
                    </a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Ficha" onclick="consultas(<?php echo $row['ID_PERSONA']; ?>)">
                                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ficha
                     </button>
                    <!--a target="_blank" href="http://localhost/buscador/Imprimir/Reporte/Reporte_Cliente.php?id=<? //echo $row['ID_PERSONA']?>"><!--button  class="btn" style="background: #428bca; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-print" aria-hidden="true">
                                        </span></button>
                    </a-->                 
                    <a href="javascript:eliminarcliente(<?php echo $row['ID_PERSONA']?>);">
                      <button type="button" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                      </button>
                    </a>
                  </td>
                </tr>
        <?php         
         }
        ?> 

          </TABLE>
             
          </div>

            <!--table align="center">
              <tr> <br>
                <td>
                  <a href="../Menu_Ventas.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
                </td>
              </tr>
            </table-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Datos del Equipo</h4>
      </div>
      <div class="modal-body" id="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


     
    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script src="../js/Buscar_Clientes.js" language="javascript"></script>
    <script type="text/javascript" src="js/busca_fecha.js"></script>
    <script type="text/javascript" src="js/eliminar_cliente.js"></script>
    <script type="text/javascript" src="js/imprimir_clientes.js"></script>
    <script type="text/javascript" src="js/ficha.js"></script>
  </body>
</html>  
