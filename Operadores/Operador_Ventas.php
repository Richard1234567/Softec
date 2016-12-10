<?php
session_start();

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
<h3 align="center">Datos del Operador: <?php echo $_SESSION['US_NOMBRE']; ?></h3><br>





<div class="container-fluid">
<?php  

if (isset($_SESSION['US_NOMBRE'])) {
    //echo "su id es: " .$_SESSION['id'];
    

?>
    <form action="Actualizar_operador.php" method="post">
    
        <div class="row" align="center">
            <div class="col-md-3"><label>Apellido</label></div>
            <div class="col-md-2"><input type="" name="APELLIDO_OPERADOR" class="form-control" value="<?php echo $_SESSION['APELLIDO_OPERADOR'] ?>"></div>
            <div class="col-md-3"><label>Nombre</label></div>
            <div class="col-md-2"><input type="" name="NOMBRE_OPERADOR" class="form-control" value="<?php echo $_SESSION['NOMBRE_OPERADOR'] ?>"></div>
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>DNI</label></div>
            <div class="col-md-2"><input type="" name="DNI_OPERADOR" class="form-control" value="<?php echo $_SESSION['DNI_OPERADOR'] ?>"></div>
            <div class="col-md-3"><label>E-mail</label></div>
            <div class="col-md-2"><input type="" name="CORREO_OPERADOR" class="form-control" value="<?php echo $_SESSION['CORREO_OPERADOR'] ?>"></div>
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>Teléfono</label></div>
            <div class="col-md-2"><input type="" name="OPERDOR_TEL" class="form-control" value="<?php echo $_SESSION['OPERDOR_TEL'] ?>"></div>
            <div class="col-md-3"><label>Celular</label></div>
            <div class="col-md-2"><input type="" name="OPERADOR_CEL" class="form-control" value="<?php echo $_SESSION['OPERADOR_CEL'] ?>"></div>
        </div><br>

        <div class="row" align="center">
            <div class="col-md-3"><label>Usuario</label></div>
            <div class="col-md-2"><input type="" name="US_NOMBRE" class="form-control" value="<?php echo $_SESSION['US_NOMBRE'] ?>"></div>
            <div class="col-md-3"><label>Contraseña</label></div>
            <div class="col-md-2"><input type="" name="US_PASSWORD" class="form-control" value="<?php echo $_SESSION['US_PASSWORD'] ?>"></div>
        </div><br>

        <div class="row" align="center">
            <button class="btn btn-success">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
        </div>
<?php
}

?>        
    </form>     
</div>

</body>
</html>