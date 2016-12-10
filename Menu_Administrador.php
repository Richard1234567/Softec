<?php
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:login.php");
}
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
 
  <link rel="stylesheet" type="text/css" href="bootstrap personalizado/css/bootstrap.css">
  <link href="bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="bower_components/animate.css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="ico/icono png softec.png">
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
            <a href="#" class="navbar-brand"><img src="img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li"><a href="Cliente/Lista_Clientes.php">Clientes</a></li>
		        <li class="li"><a href="Equipo/Lista_Equipos.php">Equipos</a></li>
		        <li class="li"><a href="Proveedor/Lista_Proveedor.php">Proveedores</a></li>
		        <li class="li"><a href="Factura/Lista_Facturas.php">Facturación</a></li>
		        <li class="li"><a href="Insumos/Lista_Insumo.php">Insumos</a></li>
		        <li class="li"><a href="Compras/Lista_Compras_A.php">Compras</a></li>
		        <li class="li"><a href="Reporte/Lista_Reportes.php">Reportes</a></li>
		        <li class="li"><a href="Backup/backup.php">Backup</a></li>
		        <li class="li"><a href="Operadores/Lista_Operadores.php">Actualizar Datos</a></li>
		        <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
	<h1 align="center">Bienvenido/a!&nbsp;<?php echo $_SESSION['US_NOMBRE'];?>&nbsp;Seleccione un Módulo de abajo para comenzar</h1>
	
	<div class="container-fluid">
		<div style="width:260px; height:155px; margin:40 -120 -30 100px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Cliente/Lista_Clientes.php"><img src="Iconos PNG/cliente.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Clientes<br>Agregar,Listar,<br>Buscar Clientes</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Equipo/Lista_Equipos.php"><img src="Iconos PNG/Computadora.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Equipos<br>Agregar,Listar,<br>Buscar Equipos</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Proveedor/Lista_Proveedor.php"><img src="Iconos PNG/proveedores.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Proveedores<br>Agregar,Listar,<br>&nbsp;&nbsp;Buscar Proveedor</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Factura/Lista_Facturas.php"><img src="Iconos PNG/FACTURACION.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Factura<br>Nuevo,Listar,<br>Buscar Factura</h5></a>
		</div><br>
	</div>

	<div class="container-fluid">
		<div style="width:260px; height:155px; margin:40 -120 -30 100px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Insumos/Lista_Insumo.php"><img src="Iconos PNG/iconoarticulos.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Insumos<br>Nuevo,Listar,<br>Buscar Insumos</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Compras/Lista_Compras_A.php"><img src="Iconos PNG/Compras.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Compras<br>Órdenes de<br> Compras</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Reporte/Lista_Reportes.php"><img src="Iconos PNG/iconos_reportes.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Reportes<br>Generar Reporte</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Operadores/Lista_Operadores.php"><img src="Iconos PNG/refresh.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Actualizar<br>Datos</h5></a>
		</div>

		

		<!--div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Calendario/Calendario.php"><img src="Iconos PNG/calendar.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Calendario<br>Ver Novedades</h5></a>
		</div-->
	</div>

	<div class="container-fluid">
		<!--div style="width:260px; height:155px; margin:40 -120 -30 100px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Insumos/Lista_Insumo.php"><img src="Iconos PNG/Reportes.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -120 -10 0 120px;" align="center">Reportes<br>Generar Nuevo</h5></a>
		</div-->

		<!--div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Compras/Lista_Compras.php"><img src="Iconos PNG/auditoria_informatica.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Auditorias<br>Ver Auditoria</h5></a>
		</div-->

		<!--div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Backup/backup.php"><img src="Iconos PNG/backup.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Backup<br>Nuevo Backup</h5></a>
		</div-->

		<div style="width:260px; height:155px; margin:40 -120 -30 100px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Backup/backup.php"><img src="Iconos PNG/backup.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -135 -10 0 120px;" align="center">Backup<br>Nuevo Backup</h5></a>
		</div>
	</div>
<div class="footer">
	<pre style="margin:40 0 0 0px;"><center>Softec V1.0 <?php echo date("d/m/Y"); ?><br> Contacto: <i>Raguirre.adrian@hotmail.com</i><br>Cel:(370) - 381395 <i class="fa fa-refresh  fa-spin fa-lg fa-fw"></i></center></pre>
</div>	


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
  </body>
</html>  
