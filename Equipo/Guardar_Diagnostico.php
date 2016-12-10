<?php 
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
  <br>
  <br>
<div>
<table class="tabla-mensaje" alingn="center">
<?php  

	include '../conexion.php';

  $colores = $_POST['colores'];
  $Precio = $_POST['PRECIO_TOTAL'];
  $Equipo = $_POST['RELA_EQUIPO'];
  $Estado = $_POST['RELA_ESTADO'];
 
  foreach($colores as $color){
      $valor = "".$color."";
      $colores_aux[] = $valor;
  }
  $valores = implode(', ', $colores_aux);
  $sql_valores = "('" .$valores. "','" .$Precio. "', NOW(), '" .$Equipo. "','" .$Estado. "')";
   
  //$sql_insert = "INSERT INTO TBL_COLORES (color) VALUES " . $sql_valores. ";";
  //echo $sql_insert;

	//$Comentario = $_POST['DIAGNOSTICO_DESC'];
	//$Precio = $_POST['PRECIO_TOTAL'];
	//$Equipo = $_POST['RELA_EQUIPO'];
	//$Estado = $_POST['RELA_ESTADO'];
	

	$sql = "INSERT INTO diagnostico (DIAGNOSTICO_DESC,PRECIO_TOTAL,FECHA_DIAGNOSTICO,RELA_EQUIPO,RELA_ESTADO)";
	$sql .= "VALUES " .$sql_valores. ";";

  //echo $sql;
	//exit();

	if($resultado = mysql_query($sql)){
?>    
		<tr class="table-info" align="center">
      <td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">El Diagnóstico fue dado de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
    </tr>
<?php     
		} else {
			if (!$resultado) {
		    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		    $mensaje .= 'Consulta completa: ' . $sql;
		    die($mensaje);
							}
		}
		
		mysql_close($conexion);

?>
</table>
<br>
<div align="center">
    <a href="../Reportes/Lista_Diagnosticos.php">
      <button type="button" class="btn btn-danger">
        <span class="fa fa-print" aria-hidden="true"></span> IMPRIMIR
      </button> 
    </a>

    <a href="../Equipo/Novedades_del_Dia.php">
      <button type="button" class="btn btn-warning">
        <span class="fa fa-desktop" aria-hidden="true"></span> NOVEDADES
      </button> 
    </a>
  </div>
</div>
<br>
</body>
</html>  