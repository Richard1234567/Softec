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
	
	include '../Conexion.php';
	include '../Validar_Campos_Vacios.php';

		$Codigo = $_POST["COD_EQUIPOS"];
		$category = $_POST["RELA_MARCA"];
		$subcategory = $_POST["RELA_MODELO"];
		$Serie = $_POST["EQUIPO_SERIE"];
		$Fecha = $_POST["FECHA_ALTA"];
		$Comentario = $_POST["OBSERVACION"];
		$Tipo = $_POST["RELA_TIPO"];
		$Persona = $_POST["RELA_PERSONA"];

		//var_dump($Persona);
		//exit();
		$Serie = validar_campos_vacios($Serie);

		$sql = "INSERT INTO equipo (COD_EQUIPOS,FECHA_ALTA,OBSERVACION,EQUIPO_SERIE,RELA_TIPO,RELA_MODELO,RELA_MARCA,RELA_PERSONA)";
		$sql .="VALUE ('".$Codigo."','".$Fecha."','".$Comentario."','".$Serie."','".$Tipo."','".$subcategory."','".$category."','".$Persona."')";
		//echo $sql;
		//exit();
		//$resultado = mysql_query($sql);

		if($resultado = mysql_query($sql)){
?>			
		<tr class="table-info" align="center">
	      	<td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">El Equipo fue dado de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
	      	</td>
    	</tr>
<?php    	
			//print "<meta http-equiv=Refresh content=\"2 ; url= ../Cliente/Lista_Clientes.php\">"; 
		} else {
			if (!$resultado) {
		    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		    $mensaje .= 'Consulta completa: ' . $sql;
		    die($mensaje);
							}
		}
		
		mysql_close($conexion);						

		//if (!$resultado) {
		//    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		//    $mensaje .= 'Consulta completa: ' . $sql;
		//    die($mensaje);
		//}
		//	
        //    mysql_close ($conexion);
        //    echo "El Cliente fue Dado de Alta con Éxito!.";
?>
</table>
<br>
	<div align="center">
		<a href="../Reportes/Lista_Clie.php"><button class="btn" style="background: #d9534f; color: #fff; width: 160px; height: 30px; font-family: Georgia, Cambria, Times, "Arial";">IMPRIMIR&nbsp;&nbsp;<span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a>

		
		<a href="../Cliente/Lista_Clientes.php"><button class="btn" style="background: #f0ad4e; color: #fff; width: 190px; height: 30px; font-family: Georgia, Cambria, Times, "Arial";">LISTA DE USUARIOS</button> 
    </button></a>
	</div>
</div>
<br>
</body>
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
</html>  