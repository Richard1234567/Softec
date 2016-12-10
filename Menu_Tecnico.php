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
                <li><a href="Equipo/Novedades_del_dia.php">Novedades</a></li>
                <li><a href="Equipo/Lista_Insumo.php">Buscar Insumos</a></li>
                <li><a href="Equipo/Lista_Insumos.php">Reportes</a></li>
                <li><a href="Operadores/Operador_Tecnico.php">Actualizar Datos</a></li>
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
	<h1 align="center">Bienvenido/a!&nbsp;<?php echo $_SESSION['US_NOMBRE'];?>&nbsp;Seleccione un Módulo de abajo para comenzar</h1>
	<div id="resultado"></div>

	<!--div class="productos">
		<a href="Cliente/Lista_Clientes.php"><img src="Iconos PNG/cliente.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Clientes<br>Agregar,Listar,<br>Buscar Clientes</h5></a>
	</div-->

	<!--div class="productos">
		<a href="Equipo/Lista_Equipos.php"><img src="Iconos PNG/Computadora.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Equipos<br>Agregar,Listar,<br>Buscar Equipos</h5></a>
	</div-->

	<!--div class="productos">
		<a href="Proveedor/Lista_Proveedor.php"><img src="Iconos PNG/proveedores.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Proveedores<br>Agregar,Listar,<br>&nbsp;&nbsp;Buscar Proveedor</h5></a>
	</div-->

	<!--div class="productos">
		<a href=""><img src="Iconos PNG/FACTURACION.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Factura<br>Nuevo,Listar,<br>Buscar Factura</h5></a>
	</div-->

	<div class="container-fluid">
		<div style="width:260px; height:155px; margin:40 -120 -30 110px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Equipo/Novedades_del_dia.php"><img src="Iconos PNG/calendar.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -120 -10 0 120px;" align="center">Ver Novedades</h5></a>
		</div>

		<!--div class="productos1">
			<a href=""><img src="Iconos PNG/Compras.png" class="img-div"><br><br><br><br>
			<h5 class="h5" align="center">Compras<br>Órdenes de<br> Compras</h5></a>
		</div>

		<div class="productos1">
			<a href=""><img src="Iconos PNG/Ventas.png" class="img-div"><br><br><br><br>
			<h5 class="h5" align="center">Ventas<br>Generar Nueva<br> Venta</h5></a>
		</div>

		<div class="productos1">
			<a href=""><img src="Iconos PNG/Reportes.png" class="img-div"><br><br><br><br>
			<h5 class="h5" align="center">Reportes<br>Generar Nuevo</h5></a>
		</div-->

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Equipo/Lista_Insumo.php"><img src="Iconos PNG/iconoarticulos.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -120 -10 0 120px;" align="center">Insumos<br>Buscar Insumos</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Equipo/Lista_Insumos.php"><img src="Iconos PNG/iconos_reportes.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -120 -10 0 120px;" align="center">Reportes<br>Generar Listados</h5></a>
		</div>

		<div style="width:260px; height:155px; margin:40 -120 -30 140px; float:left; border:solid 1px #cccccc; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px;">
			<a href="Operadores/Operador_Tecnico.php"><img src="Iconos PNG/Refresh.png" style="width:100px; height:100px; margin: 20 0 0 25px;"><br><br><br><br>
			<h5 style="font-family: Georgia; font-size: 11pt; color:#58ACFA; margin: -120 -10 0 120px;" align="center">Actualizar<br>Datos</h5></a>
		</div>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br>	

	<!--div class="productos2">
		<a href=""><img src="Iconos PNG/auditoria_informatica.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Auditorias<br>Ver Auditoria</h5></a>
	</div-->

	<!--div class="productos2">
		<a href=""><img src="Iconos PNG/backup.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Nuevo<br>Backup</h5></a>
	</div>

	<div class="productos2">
		<a href=""><img src="Iconos PNG/Configuracion.png" class="img-div"><br><br><br><br>
		<h5 class="h5" align="center">Configuración<br>Del Sistema</h5></a>
	</div-->
<div class="footer">
    <pre style="margin:40 0 0 0px;"><center>Softec V1.0 <?php echo date("d/m/Y"); ?><br> Contacto: <i>Raguirre.adrian@hotmail.com</i><br>Cel:(370) - 381395 <i class="fa fa-refresh  fa-spin fa-lg fa-fw"></i></center></pre>
</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
  </body>
</html>  
