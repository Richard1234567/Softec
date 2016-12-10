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
            <a href="Novedades_del_Dia.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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

<h3 align="center">Modificar Equipo</h3><br>

<form action="" method="post">
    
        <h4 align="center">Datos del Equipo</h4><br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Cód Equipo:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
              <div class="col-md-2"><label>Marca:</label></div>
              <div class="col-md-2"><select class="form-control">
                                    <option>Seleccione uno...</option>
                                    </select>
              </div>
              <div class="col-md-2"><a href=""><img src="../Iconos PNG/add.png" class="icon-user-pc"></a></div>
            </div>
            <br>
            

            <div class="row div" align="center">
              <div class="col-md-3"><label>Serie:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control"></div>
              <div class="col-md-2"><label>Modelo:</label></div>
              <div class="col-md-2"><select class="form-control">
                                    <option>Seleccione uno...</option>
                                    </select>
              </div>
              <div class="col-md-2"><a href=""><img src="../Iconos PNG/add.png" class="icon-user-pc"></a></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Comentario:</label></div>
              <div class="col-md-6"><textarea class="form-control"  rows="6"></textarea></div>
            </div>
            <br>
            <div align="center">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
                <button type="reset" class="btn btn-info">Volver</button>
            </div>
  
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
  </body>
</html>  