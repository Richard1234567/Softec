<?php 
session_start();
include '../conexion.php';
$registro = mysql_query("SELECT * from persona;") or (mysql_error($conexion));
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
            <a href="../Menu_Tecnico.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="../Equipo/Novedades_del_dia.php">Novedades</a></li>
                <li><a href="../Equipo/Lista_Insumo.php">Buscar Insumos</a></li>
                <li><a href="../Equipo/Lista_Insumos.php">Reportes</a></li>
                <li><a href="../Operadores/Operador_Tecnico.php">Actualizar Datos</a></li>
                <li class="li"><a href="../Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
<h3 align="center">NOVEDADES</h3><br>

<h4 align="center">Filtrar Por Fechas</h4> <br>



    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
<form action="Novedades_del_dia.php">      
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table><br>
</form>
 <br><br>
<?php include 'modal/modal_consulta.php'; ?>

    <div id="agrega-registros">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td class="td">#</td>
                <td class="td">Fec. Alta</td>
                <td class="td">Apellido/s</td>
                <td class="td">Nombre/s</td>
                <td class="td">DNI</td>
                <td class="td">Consultar</td>
                <td class="td">Opciones</td>
            </tr>
        <?php 
            while ($reg = mysql_fetch_array($registro))
    		  {
        ?>        
            <tr style="background: #fff;" align="center">
                <td class="td"><?php echo $reg['ID_PERSONA'] ?></td>
                <td class="td"><?php echo $reg['PERSONA_FEC_ALTA'] ?></td>
                <td class="td"><?php echo $reg['PERSONA_APELLIDO'] ?></td>
                <td class="td"><?php echo $reg['PERSONA_NOMBRE'] ?></td>
                <td class="td"><?php echo $reg['PERSONA_DNI'] ?></td>
                <td class="td">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="consultas(<?php echo $reg['ID_PERSONA'];?>)">
                      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </button>
                <td>
                <a href="http://localhost/buscador/Equipo/Lista_Equi.php?id=<?php echo $reg['ID_PERSONA'] ?>">
                    <button type="button" class="btn btn-warning">
                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ver
                    </button>
                </a>
                <a href="http://localhost/buscador/Equipo/Lista_Equi_M.php?id=<?php echo $reg['ID_PERSONA'] ?>">
                    <button type="button" class="btn btn-warning">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                    </button>
                </a>                 
               </td>
            </tr>
        <?php     
            }
        ?>    
        </table>
    </div>
    <!--table align="center">
        <tr> <br>
            <td>
                <a href="../Menu_Tecnico.php"><button class="btn btn-warning" ><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
            </td>
        </tr>
    </table-->



    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script type="text/javascript" src="Consultar_Estado.js"></script>
    <script type="text/javascript" src="javascript/busca_fecha_novedades.js"></script>
    


</body>
</html>       