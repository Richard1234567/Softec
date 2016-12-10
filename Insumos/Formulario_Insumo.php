<?php 
session_start();
include '../conexion.php';


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
            <a href="Lista_Insumo.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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

<h3 align="center">Formulario de Insumos</h3><br>
<?php include 'modal/modal_categoria.php'; ?>
<?php include 'modal/modal_marca.php'; ?>
<?php include 'modal/modal_modelo.php'; ?>
<?php include 'modal/modal_unidad.php'; ?>

<form action="Alta_Insumos.php" method="post">
    
    <div class="container-fluid">
      <div class="row" align="center">
        <div class="col-md-3"><label>Cód. Insumo:*</label></div>
        <div class="col-md-2"><input type="text" style="text-align:center" name="COD_INSUMO" class="form-control" placeholder="Ej:00000000" onKeyPress="return SoloNumeros(event)" required></div>
        <div class="col-md-3"><label>Fecha:*</label></div>
        <div class="col-md-2"><input type="date" name="FEC_ALTA" class="form-control" required></div>
      </div><br>

      <div class="row" align="center">
        <div class="col-md-3"><label>Categoría:*</label></div>
        <div class="col-md-2"><select class="form-control" name="RELA_CATEGORIA" id="categoria" required>
                                
                              </select>
        </div>
        <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myCategoria">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                              </button>
        </div>
        <div class="col-md-2"><label>Marca:*</label></div>
        <div class="col-md-2"><select class="form-control" name="RELA_INS_MARCA" id="marca" required>
                                
                              </select>
        </div>
        <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myMarca">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                              </button>
        </div>
      </div><br>

      <div class="row" align="center">
        <div class="col-md-3"><label>Modelo:*</label></div>
        <div class="col-md-2"><select class="form-control" name="RELA_INS_MODELO" id="modelo" required>
                                
                              </select>
        </div>
        <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModelo">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                              </button>
        </div>
        <div class="col-md-2"><label>U. Medida:</label></div>
        <div class="col-md-2"><select class="form-control" name="RELA_UNIDAD" id="unidades" required>
                                
                              </select>
        </div>
        <div class="col-md-1"><button type="button" class="btn btn-info" id="boton" data-toggle="modal" data-target="#myUnidad">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                              </button>
        </div>
      </div><br>

      <div class="row" align="center">
        <div class="col-md-3"><label>Cantidad:*</label></div>
        <div class="col-md-2"><input type="text" style="text-align:center" name="INSUMO_CANTIDAD" required class="form-control" placeholder="Cantidad del produ" onKeyPress="return SoloNumeros(event)"></div>
        <div class="col-md-3"><label>P. Venta:*</label></div>
        <div class="col-md-2"><input type="text" style="text-align:center" name="INSUMO_PRECIO" class="form-control" placeholder="Precio de venta del produ" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8"></div>
      </div><br>

      <div class="row" align="center">
        <div class="col-md-3"><label>Serie:</label></div>
        <div class="col-md-2"><input type="text" style="text-align:center" name="INSUMO_SERIE" class="form-control" placeholder="Serie del produ"></div>
        <div class="col-md-3"><label>Proveedor:</label></div>
        <div class="col-md-2"><select class="form-control" name="RELA_PROVEEDOR">
                                <option value="">Seleccione la opcion...</option>
                                <?php 
                                    $buscar = mysql_query ("select ID_PROVEEDOR, NOMBRE_RAZON_SOCIAL from proveedor;",$conexion)
                                    or die ("Error en la consulta de SQl");
                                    while ($row = mysql_fetch_array ($buscar))
                                    {
                                    echo '<option
                                    value = "'.$row['ID_PROVEEDOR'].'">'.$row['NOMBRE_RAZON_SOCIAL'].'</option>';
                                    }      
                                ?>
                              </select>
        </div>
      </div><br>
    </div><br>
    <table align="center">
          <tr>
              <!--td><a href="Lista_Insumo.php" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span>&nbsp;Volver</a>&nbsp;</td-->
              <td><button class="btn btn-success" type="submit">Guardar</button>&nbsp;</td>
              <td><button class="btn btn-danger" type="reset">Cancelar</button></td>
          </tr>
    </table>
</form>


    <script src="jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/agregar_marca.js"></script>
    <script type="text/javascript" src="js/agregar_modelo.js"></script>
    <script type="text/javascript" src="js/agregar_categoria.js"></script>
    <script type="text/javascript" src="js/agregar_unidad.js"></script>
    <script type="text/javascript" src="../Validaciones/Validar.js"></script>
    <script type="text/javascript">
      function comprobarCamposRequired(){
         var correcto=true;
         //var campos=$('input[type="text"]:required');
         var select=$('select:required');
         $(campos).each(function() {
            if($(this).val()==''){
               correcto=false;
               $(this).addClass('error');
            }
         });
         $(select).each(function() {
            if($(this).val()==''){
               correcto=false;
               $(this).addClass('error');
            }
         });
         return correcto;
      }
    </script>
  </body>
</html>  