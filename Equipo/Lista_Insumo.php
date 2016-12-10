<?php 
session_start();
include '../conexion.php';
$sql = "SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA;"
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
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>

<h3 align="center">LISTA DE PRODUCTOS</h3>
<br>
<h4 align="center">Filtrar Por Fechas</h4> <br>

<form action="Lista_Insumo.php">

    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table>
</form> 

  <div class="container-fluid">
    <!--div style="margin: 0 0 -35 1100px;">
      <td>
              <a href="Formulario_Insumo.php">
              <button type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Insumo
              </button>
              </a>
        </td>
    </div>

    <div style="margin: 0 0 -30 1200px;">
        <td>
            <a target="_blank" href="../Imprimir/Reporte/Reporte_Lista_Insumo.php">
            <button type="button" class="btn btn-danger">
              <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
            </button>     
            </a>
        </td>
    </div-->

    <div style="width: 97%; height: 31px; background: #EEEBEB; margin: 40 0 0 20px;">
      <!--<button class="button1">Borrar</button>-->
      <input type="" placeholder="Buscar Producto" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1090px; width: 220px; height: 30px;">
    </div>
  </div><br>

<?php 
    if(isset($_POST['filtro'])){
    switch($_POST['filtro']){
      //case "todos":
      //  $sql = "select * from insumo join insumo_marca on RELA_INS_MARCA = ID_INS_MARCA join insumo_modelo on RELA_INS_MODELO = //ID_INS_MODELO join categoria on RELA_CATEGORIA = ID_CATEGORIA";
      //  break;
      case  "bajo":
        $sql = "select * from insumo join insumo_marca on RELA_INS_MARCA = ID_INS_MARCA join insumo_modelo on RELA_INS_MODELO = ID_INS_MODELO join categoria on RELA_CATEGORIA = ID_CATEGORIA where INSUMO_CANTIDAD <=20 and INSUMO_CANTIDAD >=1;";
        break;
      case "nada":
        $sql = "select * from insumo join insumo_marca on RELA_INS_MARCA = ID_INS_MARCA join insumo_modelo on RELA_INS_MODELO = ID_INS_MODELO join categoria on RELA_CATEGORIA = ID_CATEGORIA where INSUMO_CANTIDAD = 0";
        break;
    }
  }else{
    $sql = "select * from insumo join insumo_marca on RELA_INS_MARCA = ID_INS_MARCA join insumo_modelo on RELA_INS_MODELO = ID_INS_MODELO join categoria on RELA_CATEGORIA = ID_CATEGORIA";
  }    
?> 
<?php 
    $result = mysql_query($sql);
      if(!$result )
      {
        die('Ocurrio un error al obtener los valores de la base de datos: ' . mysql_error());
      }
?>    

          <div id='resultados'> 
            <div id="agrega-registros">

              <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
                <tr class="table-info" align="center">
                    <td class="td">#</td>
                    <td class="td">Fec. Alta</td>
                    <td class="td">Categoria</td>
                    <td class="td">Marca</td>
                    <td class="td">Modelo</td>
                    <td class="td">Precio</td>
                    <td class="td">Cantidad</td>
                    <td class="td">Estado</td>
                    <td class="td">Opciones</td>
                </tr>
              <?php    
                  while ( $reg = mysql_fetch_assoc($result)) {
                    $fecha=date("d/m/Y", strtotime($row['FEC_ALTA']));
                    $cantidad = $reg ['INSUMO_CANTIDAD'];
                    $cant_alta  = 100;
                    $cant_medio = 50;
                    $cant_baja  = 20;
                    $sin_stock  = 0;

                  if ($cantidad >= $cant_alta)
                  {
                    $mensaje = '<span class="label label-success">STOCK ALTO</span>';
                    //echo $mensaje;
                  }
                    elseif ($cantidad >= 51)
                  {
                      $mensaje = '<span class="label label-success">STOCK ALTO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= $cant_medio)
                  {
                      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= 21)
                  {
                      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= $cant_baja)
                  {
                      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= 1)
                  {
                      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
                      //echo $mensaje;
                  }
                    else
                  {
                      $mensaje = '<span class="label label-default">SIN STOCK</span>';
                      //echo $mensaje;
                }
              ?>
               
                  <tr style="background: #fff;" align="center">
                    <td class="td"><?php echo $reg['ID_INSUMO'] ?></td>
                    <td class="td"><?php echo $reg['FEC_ALTA'] ?></td>
                    <td class="td"><?php echo $reg['CATEGORIA_DESCRIPCION'] ?></td>
                    <td class="td"><?php echo $reg['MARCA_INS_DESC'] ?></td>
                    <td class="td"><?php echo $reg['INS_MODELO_DESC'] ?></td>
                    <td class="td">$<?php echo $reg['INSUMO_PRECIO'] ?></td>
                    <td class="td"><?php echo $reg['INSUMO_CANTIDAD'] ?></td>
                    <td class="td"><?php echo $mensaje ?></td>
                    <td>
                      <!--a href="#"><button  class="btn" style="background: #F9C246; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                          </span></button></a> 
                      <a href="#"><button  class="btn" style="background: #ccc 93.5%; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-signal" aria-hidden="true">
                                          </span></button></a>                 
                      <a href="#"><button  class="btn" style="background: #58ACFA; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true">
                                          </span></button></a> 
                                          </span></button-->
                      <a href="javascript:eliminarinsumo(<?php echo $reg['ID_INSUMO']?>);">
                        <button type="button" class="btn btn-danger">
                          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                        </button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?> 
              </TABLE>
            </div>
          </div>

          <!--table align="center">
            <tr> <br>
              <td>
                <a href="../Menu_Ventas.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
              </td>
            </tr>
          </table--> 

    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script type="text/javascript" src="javascript/busca_insumo.js"></script>
    <script type="text/javascript" src="javascript/busca_fecha.js"></script>
    <script type="text/javascript" src="javascript/eliminar_insumo.js"></script>
  </body>
</html> 