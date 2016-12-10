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
  <br>
  <br>
<div>
<table class="tabla-mensaje" alingn="center">
<?php
	
	//require 'funciones.php';

	

	include '../conexion.php';

	$codigo					= $_POST['COD_PROVEEDOR'];
	$fecha					= $_POST['FECH_ALTA'];
	$nombre					= $_POST['NOMBRE_RAZON_SOCIAL'];
	$cuit					= $_POST['PROVEEDOR_CUIT'];
	$telefono				= $_POST['TELEFONO'];
	$correo					= $_POST['CORREO'];
	$calle					= $_POST['CALLE'];
	$numero					= $_POST['NUMERO'];
	//$estrategias 			= $_POST['estrategias'];
	$servicio				= $_POST['RELA_TIPO_SERVICIO'];

	

	$sql = "INSERT INTO proveedor (COD_PROVEEDOR,FECH_ALTA,NOMBRE_RAZON_SOCIAL,PROVEEDOR_CUIT,TELEFONO,CORREO,CALLE,NUMERO,";
	$sql.= "RELA_TIPO_SERVICIO)";
	$sql .= "VALUES (" . $codigo . ",'" . $fecha . "','" . $nombre . "'," . $cuit . "," . $telefono . ",'" . $correo . "','" . $calle . "'," . $numero . "," . $servicio . ")";

	//$result = mysql_query($sql);

	//echo $sql;
	//exit();

	if($result = mysql_query($sql)){
?>
		<tr class="table-info" align="center">
	      	<td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">El Proveedor fue dado de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
	      	</td>
	    </tr>
<?php
		print "<meta http-equiv=Refresh content=\"2 ; url= Lista_Proveedor.php\">"; 
		} else {
			if (!$result) {
		    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		    $mensaje .= 'Consulta completa: ' . $sql;
		    die($mensaje);
							}
		}
		
		mysql_close($conexion);	
?>			    
