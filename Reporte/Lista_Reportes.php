<?php 
session_start();
include '../conexion.php';
//$resultado = mysql_query("select * from proveedor") or mysql_error(($conexion));
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bower_components/animate.css/animate.min.css">
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

<h3 align="center">LISTA DE MOVIMIENTOS</h3>
<br>
<h5 align="center">Selecciona un Módulo para Reporte</h5><br>

<div class="container-fluid">
    <div style="width:180px; height:125px; margin:0 -120 -30 250px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
            <a href="Reporte_Clientes.php"><img src="../Iconos PNG/cliente.png" style="width:80px; height:80px; margin: 20 0 0 45px;"><br><br><br><br>
            <h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -55 -15 0 -25px;" align="center">Clientes</h5></a>
    </div>

    <div style="width:180px; height:125px; margin:0 -120 -30 150px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
            <a href="Reporte_Proveedores.php"><img src="../Iconos PNG/proveedores.png" style="width:80px; height:80px; margin: 20 0 0 45px;"><br><br><br><br>
            <h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -55 -15 0 -25px;" align="center">Proveedores</h5></a>
    </div>

    <div style="width:180px; height:125px; margin:0 -120 -30 150px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
            <a href="Reporte_Insumos.php"><img src="../Iconos PNG/iconoarticulos.png" style="width:80px; height:80px; margin: 20 0 0 45px;"><br><br><br><br>
            <h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -55 -15 0 -25px;" align="center">Insumos</h5></a>
    </div>

    <div style="width:180px; height:125px; margin:0 -120 -30 150px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
            <a href="Reporte_Compras.php"><img src="../Iconos PNG/Compras.png" style="width:80px; height:80px; margin: 20 0 0 45px;"><br><br><br><br>
            <h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -55 -15 0 -25px;" align="center">Compras</h5></a>
    </div>
</div>

<div class="container-fluid">
    <div style="width:180px; height:125px; margin:40 -120 -30 250px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
            <a href="Reporte_Ventas.php"><img src="../Iconos PNG/ventas3.png" style="width:80px; height:80px; margin: 20 0 0 45px;"><br><br><br><br>
            <h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -55 -15 0 -25px;" align="center">Ventas</h5></a>
    </div>
</div>