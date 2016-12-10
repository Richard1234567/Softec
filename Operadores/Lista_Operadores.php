<?php
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:login.php");
}
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM operador") or mysql_error(($conexion));
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
 
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link href="../bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="../bower_components/animate.css/animate.min.css">
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
            <a href="../Menu_Administrador.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li"><a href="Cliente/Lista_Cliente.php">Clientes</a></li>
		        <li class="li"><a href="Equipo/Lista_Equipos.php">Equipos</a></li>
		        <li class="li"><a href="Proveedor/Lista_Proveedor.php">Proveedores</a></li>
		        <li class="li"><a href="#">Facturación</a></li>
		        <li class="li"><a href="Insumos/Lista_Insumo.php">Insumos</a></li>
		        <li class="li"><a href="#">Compras</a></li>
		        <li class="li"><a href="#">Reportes</a></li>
		        <li class="li"><a href="#">Calendario</a></li>
		        <li class="li"><a href="#">Auditoria</a></li>
		        <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
<h3 align="center">Lista de Operadores</h3>
<?php include 'modal/modal_operador.php'; ?>
<?php include 'modal/modal_operador_mo.php'; ?>
<?php include 'modal/modal_eliminar.php'; ?>
<div class="container-fluid">
    <div style="margin: 0 0 -35 1100px;">
      <td> 
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Operador">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Operador
          </button>
        </td>
    </div>
</div><br><br>    
<div class="container-fluid">
  <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: 10 0 0 20px;">
    <tr class="table-info" align="center">
      <td class="td">#</td>
      <td class="td">Fec. Alta</td>
      <td class="td">Apellido Usuario</td>
      <td class="td">Nombre Usuario</td>
      <td class="td">D.N.I.</td>
      <td class="td">Teléfono</td>
      <td class="td">Celular</td>
      <td class="td">E-mail</td>
      <td class="td">Opciones</td>
    </tr>
    <?php 
      while ($row = mysql_fetch_array ($resultado)) {
    ?>
    <tr style="background: #fff;" align="center">
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['FECHA_ALTA']; ?></td>
      <td><?php echo $row['APELLIDO_OPERADOR']; ?></td>
      <td><?php echo $row['NOMBRE_OPERADOR']; ?></td>
      <td><?php echo $row['DNI_OPERADOR']; ?></td>
      <td><?php echo $row['OPERDOR_TEL']; ?></td>
      <td><?php echo $row['OPERADOR_CEL']; ?></td>
      <td><?php echo $row['CORREO_OPERADOR']; ?></td>
      <td>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $row['id']?>" data-apellido="<?php echo $row['APELLIDO_OPERADOR']; ?>" data-nombre="<?php echo $row['NOMBRE_OPERADOR']?>" data-dni="<?php echo $row['DNI_OPERADOR']?>" data-correo="<?php echo $row['CORREO_OPERADOR']?>" data-telefono="<?php echo $row['OPERDOR_TEL']?>" data-celular="<?php echo $row['OPERADOR_CEL']?>" data-usuario="<?php echo $row['US_NOMBRE']?>" data-contraseña="<?php echo $row['US_PASSWORD']?>" data-perfil="<?php echo $row['CLAVEPERMISO']?>" data-fecha="<?php echo $row['FECHA_ALTA']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar
        </button>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>
    <div id="loader" class="text-center"> </div>
    <div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
    <div class="outer_div"></div><!-- Datos ajax Final -->
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="Javascript/operador.js"></script>

</body>
</html> 