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
            <a href="../Menu_Administrador.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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
<form action="Lista_Clientes.php">      
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table><br>
</form> 

  <div class="container-fluid">
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
                  <a target="_blank" href="../Imprimir/Reporte/Reporte_Lista_Clientes.php">
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
                    <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<? echo $row['ID_PERSONA']?>">
                      <button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                      </button>
                    </a>
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
              </table>   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
  </body>
</html> 