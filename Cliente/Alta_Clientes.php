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
  <link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
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

		//$p_Id=isset($Cod_Clie = $_POST['COD_CLIE'] ? intval($Cod_Clie = $_POST['COD_CLIE']);
		$Cod_Clie = $_POST["COD_CLIE"];
		$Ape = $_POST["PERSONA_APELLIDO"];
		$Fec_Alta = $_POST["PERSONA_FEC_ALTA"];
		$Nomb = $_POST["PERSONA_NOMBRE"];
		$Doc = $_POST["RELA_TIPO_DOCUMENTO"];
		$Docu = $_POST["PERSONA_DNI"];
		$Fech_Nac = $_POST["PERSONA_FECNAC"];
		$Cuil = $_POST["PERSONA_CUIL"];
		//$Cuit = $_POST["PERSONA_CUIT"];
		$Tipo_Persona = $_POST["RELA_TIPO_PERSONA"];
		$Tipo_Sexo = $_POST["RELA_TIPO_SEXO"];
		$Pais = $_POST["paises"];
		$Provincia = $_POST["provincias"];
		$Ciudad = $_POST["ciudades"];
		$Tel = $_POST["PERSONA_TEL"];
		$Correo = $_POST["PERSONA_CORREO"];
		$Cel = $_POST["PERSONA_CEL"];
		$Fax = $_POST["PERSONA_FAX"];
		$Calle = $_POST["PERSONA_CALLE"];
		$Numero = $_POST["PERSONA_NUMERO"];
		$Manzana = $_POST["PERSONA_MANZANA"];
		$Casa = $_POST["PERSONA_CASA"];
		$Sector = $_POST["PERSONA_SECTOR"];
		$Piso = $_POST["PEROSNA_PISO"];
		$CP = $_POST["PERSONA_CP"];
		$Barrio = $_POST["RELA_BARRIO"];

		//
		//var_dump($Tel);
		//exit();

		$Tel = validar_campos_vacios($Tel);
		$Cel = validar_campos_vacios($Cel);
		$CP = validar_campos_vacios($CP);
		$Piso = validar_campos_vacios($Piso);
		//$Cuit = validar_campos_vacios($Cuit);
		$Casa = validar_campos_vacios($Casa);
		$Manzana = validar_campos_vacios($Manzana);
		$Sector = validar_campos_vacios($Sector);
		//$Cuit = validar_campos_vacios($Cuit);
		$Cuil = validar_campos_vacios($Cuil);
		$Fech_Nac = validar_campos_vacios($Fech_Nac);
		$Correo = validar_campos_vacios($Correo);

		//echo $Tel;
		//exit();

		$sql = "INSERT INTO persona (COD_CLIE,PERSONA_FEC_ALTA,PERSONA_DNI,PERSONA_APELLIDO,PERSONA_NOMBRE,";
		$sql .= "PERSONA_FECNAC,PERSONA_TEL,PERSONA_CEL,PERSONA_CORREO,PERSONA_CUIL,PERSONA_CALLE,";
		$sql .= "PERSONA_NUMERO,PERSONA_CASA,PERSONA_MANZANA,PERSONA_SECTOR,PEROSNA_PISO,PERSONA_CP,PERSONA_FAX,";
		$sql .= "RELA_TIPO_DOCUMENTO,RELA_TIPO_PERSONA,RELA_PAIS,RELA_PROVINCIA,RELA_TIPO_SEXO,RELA_BARRIO)";
		$sql .= "VALUES (".$Cod_Clie.", '".$Fec_Alta."', ".$Docu.", '".$Ape."', '".$Nomb."',";
		$sql .= "'".$Fech_Nac."', '".$Tel."', '".$Cel."', '".$Correo."', '".$Cuil."', '".$Calle."',";
		$sql .= "'".$Numero."', '".$Casa."', '".$Manzana."', '".$Sector."', '".$Piso."', '".$CP."', '".$Fax."',";
		$sql .= "'".$Doc."', '".$Tipo_Persona."', '".$Pais."', '".$Provincia."', '".$Tipo_Sexo."', '".$Barrio."')";
		//echo $sql;
		//exit();		



		if($resultado = mysql_query($sql)){
?>			
		<tr class="table-info" align="center">
	      	<td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">El Cliente fue dado de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
	      	</td>
	    </tr>
<?php			
			print "<meta http-equiv=Refresh content=\"2 ; url= Lista_Clientes.php\">"; 
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
</div>
<br>
<!--div align="center">
    <a href="../Reportes/Lista_Diagnosticos.php"><button class="btn" style="background: #d9534f; color: #fff; width: 160px; height: 30px; font-family: Georgia, Cambria, Times, "Arial";">IMPRIMIR&nbsp;&nbsp;<span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></span>
    </button></a>

    <a href="../Equipo/Lista_Equi.php"><button class="btn" style="background: #f0ad4e; color: #fff; width: 190px; height: 30px; font-family: Georgia, Cambria, Times, "Arial";">LISTA DE EQUIPOS</button> 
    </button></a>
  </div>
</div-->
  </body>
</html>  