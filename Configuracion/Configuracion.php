<?php 
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
 
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> <!--Llamamos al archivo CSS a través de CDN -->
  	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
  </head>
  <body>

<nav class="nav">
	<a href=""><img src="../img/hp.jpg" class="img"></a>
    <ul class="ul">
        <li class="li"><a href="Cliente/Lista_Cliente.php">Clientes</a></li>
        <li class="li"><a href="Equipo/Lista_Equipo.php">Equipos</a></li>
        <li class="li"><a href="Proveedor/Lista_Proveedor.php">Proveedores</a></li>
        <li class="li"><a href="#">Facturación</a></li>
        <li class="li"><a href="#">Insumos</a></li>
        <li class="li"><a href="#">Compras</a></li>
        <li class="li"><a href="#">Reportes</a></li>
        <li class="li"><a href="#">Calendario</a></li>
        <li class="li"><a href="#">Auditoria</a></li>
        <li class="li"><a href="#">Configuración</a></li>


    </ul>
</nav>

<h3 align="center">Datos de la Empresa</h3><br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Nombre:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
              <div class="col-md-2"><label>Calle:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Número:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
              <div class="col-md-2"><label>País:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Provincia:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
              <div class="col-md-2"><label>Teléfono:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Correo:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
              <div class="col-md-2"><label>Sitio Web:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
            </div>
            <br>

            <div align="center">
                <button class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
                <button class="btn btn-info">Volver</button>
            </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
  </body>
</html>
