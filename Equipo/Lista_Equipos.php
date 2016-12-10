<?php 
session_start();
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM equipo JOIN persona ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO;") or mysql_error(($conexion));
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link href="../bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
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

<h3 align="center">LISTA DE EQUIPOS</h3>
<br>
<h4 align="center">Filtrar Por Fechas</h4> <br>

    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
<form action="Lista_Equipos.php">      
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table><br>
</form> 

  <div style="margin: 0 0 -35 1090px;">
    <td>
            <a href="../Cliente/Formulario_Clientes.php">
            <button type="button" class="btn btn-warning">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cliente
            </button>
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
            <input type="" placeholder="Buscar Equipo" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1090px; width: 220px; height: 30px;">
        </div>
    </div><br>
<?php 
    if(isset($_POST['filtro'])){
                switch($_POST['filtro']){
                  case "todos":
                    $sql = "SELECT * FROM equipo JOIN persona ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO;";
                    break;
                }
              }else{
                $sql = "SELECT * FROM equipo JOIN persona ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO;";
    }    
?>     
    <div id='resultados'> 
      <div id="agrega-registros">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
          <tr class="table-info" align="center">
            <td class="td">#</td>
            <td class="td">Fec. Alta</td>
            <td class="td">Serie</td>
            <td class="td">Marca</td>
            <td class="td">Modelo</td>
            <td class="td">Apellido/s</td>
            <td class="td">Nombre/s</td>
            <td class="td">DNI</td>
            <td class="td">Opciones</td>
          </tr> 
            <?php 
              while ($row = mysql_fetch_array ($resultado)) {
            ?> 
          <tr style="background: #fff;" align="center">
            <td class="td"><?php echo $row['ID_EQUIPO'] ?></td>
            <td class="td"><?php echo $row['FECHA_ALTA'] ?></td>
            <td class="td"><?php echo $row['EQUIPO_SERIE'] ?></td>
            <td class="td"><?php echo $row['MARCA_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $row['MODELO_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $row['PERSONA_APELLIDO'] ?></td>
            <td class="td"><?php echo $row['PERSONA_NOMBRE'] ?></td>
            <td class="td"><?php echo $row['PERSONA_DNI'] ?></td>
            <td>
             
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myFicha" onclick="consultas(<?php echo $row['ID_EQUIPO']; ?>)" >
                <span class="fa fa-desktop" aria-hidden="true"></span> Ficha
             </button>        
            <a href="javascript:eliminarequipo(<?php echo $row['ID_EQUIPO']?>);">
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
    </div>  

            <!--table align="center">
              <tr> <br>
                <td>
                  <a href="../Menu_Ventas.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
                </td>
              </tr>
            </table-->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myFicha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1000PX;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Ficha de Equipos</h4>
      </div>
      <div class="modal-body" id="caja">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>


     
    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script src="javascript/busca_equipo.js" language="javascript"></script>
    <script type="text/javascript" src="javascript/busca_fecha_equipo.js"></script>
    <script type="text/javascript" src="javascript/eliminar_equipo.js"></script>
    <script type="text/javascript" src="javascript/ficha.js"></script>
    <script type="text/javascript" src="javascript/imprimir_equipos.js"></script>
  </body>
</html>  
