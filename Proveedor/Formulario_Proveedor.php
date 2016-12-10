<?php 
include '../conexion.php';
session_start();
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
            <a href="Lista_Proveedor.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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

<h3 align="center">Formulario de Proveedor</h3><br>
<?php include '../Funcion_Caracter.php'; ?>
<form action="Alta_proveedor.php" method="post">
 
  <div class="container-fluid">
    <div class="row" align="center">
      <div class="col-md-3"><label>Cód. Proveedor:</label></div>
      <div class="col-md-2"><input type="" name="COD_PROVEEDOR" class="form-control" value="<?php echo "$temp"?>" readonly></div>
      <div class="col-md-3"><label>Fec. Alta:*</label></div>
      <div class="col-md-2"><input type="date" name="FECH_ALTA" class="form-control" required></div>
    </div><br>

    <div class="row" align="center">
      <div class="col-md-3"><label>Nombre R. Social:*</label></div>
      <div class="col-md-2"><input type="text" name="NOMBRE_RAZON_SOCIAL" class="form-control" required onkeypress="return soloLetras(event)"></div>
      <div class="col-md-3"><label>C.U.I.T*</label></div>
      <div class="col-md-2"><input type="text" name="PROVEEDOR_CUIT" class="form-control" required onKeyPress="return SoloNumeros(event)"></div>
    </div><br>

    <div class="row" align="center">
      <div class="col-md-3"><label>Teléfono:*</label></div>
      <div class="col-md-2"><input type="text" name="TELEFONO" class="form-control" required onKeyPress="return SoloNumeros(event)"></div>
      <div class="col-md-3"><label>Correo:*</label></div>
      <div class="col-md-2"><input type="text" name="CORREO" class="form-control" required></div>
    </div><br>

    <div class="row" align="center">
      <div class="col-md-3"><label>Dirección:*</label></div>
      <div class="col-md-2"><input type="text" name="CALLE" class="form-control" required onkeypress="return soloLetras(event)"></div>
      <div class="col-md-3"><label>Número:*</label></div>
      <div class="col-md-2"><input type="text" name="NUMERO" class="form-control" required onKeyPress="return SoloNumeros(event)"></div>
    </div><br>

    <div class="row" align="center">
      <div class="col-md-3"><label>Servicio:*</label></div>
      <div class="col-md-2"><select class="form-control" id="servicio" name="RELA_TIPO_SERVICIO" required>
              
                            </select>                    
      </div>
      <div class="col-md-3"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myServicio">
                              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                            </button>
      </div>
  </div><br>

  <div class="row" align="center">
    <button class="btn btn-success" type="submit">Guardar</button>
    <button class="btn btn-danger" type="reset">Cancelar</button>
  </div>
</form> 


  <!-- Modal -->
    <div class="modal fade" id="myServicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Servicio</h4>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3"><label>Nuevo Servicio:</label></div>
                <div class="col-md-7"><input type="text" name="servicios" class="form-control"></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="registrar();">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script type="text/javascript" src="../select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript" src="js/agregar_servicio.js"></script>
    <script type="text/javascript" src="js/edicion.js"></script>
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