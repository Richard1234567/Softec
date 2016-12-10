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

	include '../conexion.php';
  include '../Validar_Campos_Vacios.php';

	
	$Fecha      = $_POST['FEC_ALTA'];
	$Codigo     = $_POST['COD_INSUMO'];
	$Cantidad   = $_POST['INSUMO_CANTIDAD'];
	$Precio     = $_POST['INSUMO_PRECIO'];
	$Marca      = $_POST['RELA_INS_MARCA'];
	$Modelo     = $_POST['RELA_INS_MODELO'];
	$Serie      = $_POST['INSUMO_SERIE'];
	$Categoria  = $_POST['RELA_CATEGORIA'];
	$Medida     = $_POST['RELA_UNIDAD'];
	$Proveedor  = $_POST['RELA_PROVEEDOR'];

	$Serie = validar_campos_vacios($Serie);
	

	$sql  = "INSERT INTO insumo (FEC_ALTA, COD_INSUMO, INSUMO_CANTIDAD, INSUMO_PRECIO, RELA_INS_MARCA, RELA_INS_MODELO, INSUMO_SERIE,";
	$sql .= "RELA_CATEGORIA, RELA_UNIDAD, RELA_PROVEEDOR)";
	$sql .= "VALUES ('" . $Fecha . "','" . $Codigo . "','" . $Cantidad . "','" . $Precio . "','" . $Marca . "','" . $Modelo . "',";
	$sql .= "'" . $Serie . "','" . $Categoria . "','" . $Medida . "','" . $Proveedor . "');";

	//echo $sql;
	//exit();

	if($resultado = mysql_query($sql)){
?>		
			<tr class="table-info" align="center">
		      	<td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">El Insumo fue dado de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
		      	</td>
	    	</tr>
<?php
			print "<meta http-equiv=Refresh content=\"2 ; url= Lista_Insumo.php\">"; 
		} else {
			if (!$resultado) {
		    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		    $mensaje .= 'Consulta completa: ' . $sql;
		    die($mensaje);
							}
		}
		
		mysql_close($conexion);	


?>