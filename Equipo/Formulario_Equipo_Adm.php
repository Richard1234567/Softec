<?php 
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:../login.php");
}
include '../conexion.php';
//$registro = mysql_query("SELECT * from persona;") or (mysql_error($conexion));
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
            <a href="Lista_equipos.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li"><a href="Cliente/Lista_Clientes.php">Clientes</a></li>
                <li class="li"><a href="Equipo/Lista_Equipos.php">Equipos</a></li>
                <li class="li"><a href="Proveedor/Lista_Proveedor.php">Proveedores</a></li>
                <li class="li"><a href="Factura/Lista_Facturas.php">Facturación</a></li>
                <li class="li"><a href="Insumos/Lista_Insumo.php">Insumos</a></li>
                <li class="li"><a href="Compras/Lista_Compras.php">Compras</a></li>
                <li class="li"><a href="Reporte/Lista_Reportes.php">Reportes</a></li>
                <li class="li"><a href="Operadores/Operador_Ventas.php">Actualizar Datos</a></li>
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>   
        </div>
</nav>

<h3 align="center">Formulario de Equipo</h3><br>
<?php include 'modal/modal_marca.php'; ?>
<?php include 'modal/modal_modelo.php'; ?>
<?php include 'modal/modal_tipo.php'; ?>

<form action="Alta_Equipos.php" method="post">
    <?php include '../Funcion_Caracter.php'; ?>
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="col-md-3"><label>Cód. Equipo:</label></div>
            <div class="col-md-2"><input type="" name="COD_EQUIPOS" class="form-control" value="<?php echo "$temp"?>" readonly></div>
            <div class="col-md-2"><label>Fecha:*</label></div>
            <div class="col-md-2"><input type="date" name="FECHA_ALTA" class="form-control" required></div>
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>Serie:</label></div>
            <div class="col-md-2"><input type="" name="EQUIPO_SERIE" class="form-control"></div>
            <div class="col-md-2"><label>Tipo Equipo:*</label></div>
            <div class="col-md-2"><select class="form-control" name="RELA_TIPO" id="select-tipo" required>
                                  
                                  </select>
            </div>
            <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myTipo">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                                  </button>
            </div>
            
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>Marca*</label></div>
            <div class="col-md-2"><select class="form-control" name="RELA_MARCA" id="select-marca" required>
                                  
                                  </select>
            </div>
            <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myMarca">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                                  </button>
            </div>
            
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>Modelo*</label></div>
            <div class="col-md-2"><select class="form-control" name="RELA_MODELO" id="select-modelo">
                                                                         
                                  </select>
            </div>
            <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModelo">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                                  </button>
            </div>
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>Comentario:*</label></div>
            <div class="col-md-6"><textarea cols="9" rows="7" class="form-control" name="OBSERVACION" required></textarea></div>
        </div><br>

        <div class="row" align="center">
            <input type="hidden" name="RELA_PERSONA" value="<?php echo $_GET['id']; ?>">
            <button class="btn btn-success" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </div>
</form>

<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="javascript/agregar_marca.js"></script>
<script type="text/javascript" src="javascript/agregar_modelo.js"></script>
<script type="text/javascript" src="javascript/agregar_tipo.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
   $("#category").change(function () {
           $("#category option:selected").each(function () {
            id_category = $(this).val();
            $.post("subcategories.php", { id_category: id_category }, function(data){
                $("#subcategory").html(data);
            });            
        });
   })
});
</script>
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