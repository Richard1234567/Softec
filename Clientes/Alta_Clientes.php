<?php 
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
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
		$Cuit = $_POST["PERSONA_CUIT"];
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
		$Cuit = validar_campos_vacios($Cuit);
		$Casa = validar_campos_vacios($Casa);
		$Manzana = validar_campos_vacios($Manzana);
		$Sector = validar_campos_vacios($Sector);
		$Cuit = validar_campos_vacios($Cuit);
		$Cuil = validar_campos_vacios($Cuil);
		$Fech_Nac = validar_campos_vacios($Fech_Nac);
		$Correo = validar_campos_vacios($Correo);

		//echo $Tel;
		//exit();

		$sql = "INSERT INTO persona (COD_CLIE,PERSONA_FEC_ALTA,PERSONA_DNI,PERSONA_APELLIDO,PERSONA_NOMBRE,";
		$sql .= "PERSONA_FECNAC,PERSONA_TEL,PERSONA_CEL,PERSONA_CORREO,PERSONA_CUIL,PERSONA_CUIT,PERSONA_CALLE,";
		$sql .= "PERSONA_NUMERO,PERSONA_CASA,PERSONA_MANZANA,PERSONA_SECTOR,PEROSNA_PISO,PERSONA_CP,PERSONA_FAX,";
		$sql .= "RELA_TIPO_DOCUMENTO,RELA_TIPO_PERSONA,RELA_PAIS,RELA_PROVINCIA,RELA_CIUDAD,RELA_TIPO_SEXO,RELA_BARRIO)";
		$sql .= "values (".$Cod_Clie.", '" .$Fec_Alta. "', '" .$Docu. "', '" .$Ape. "', '" .$Nomb. "', '" .$Fech_Nac. "',";
		$sql .= "".$Tel.", '".$Cel."', '".$Correo."', '".$Cuil."', '" .$Cuit. "', '".$Calle."', '".$Numero."', '".$Casa."', '".$Manzana."', '".$Sector."',";
		$sql .= "'" .$Piso. "', '" .$CP. "', '" .$Fax. "', '" .$Doc. "', '" .$Tipo_Persona. "', '" .$Pais. "', ";
		$sql .= "'" .$Provincia. "', '" .$Ciudad. "', '" .$Tipo_Sexo. "', '" .$Barrio. "')";
		//echo $sql;
		//exit();		



		if($resultado = mysql_query($sql)){
			echo '<tr class="table-info" align="center">';
			echo '<td alingn="center">El Cliente fue dado de Alta con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></td>';
			echo '</tr>';
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
<div>
  <div class="footer1">
  	
  		<div class="panel-footer"><h5 align="center"><?php $csite_name = 'SOFTEC V1.0'; ?>
  		Copyright&copy; <?php echo date( 'm/d/y' ); ?> - <?php echo $csite_name; ?>&nbsp;Diseñado por  Aguirre, Richard A. Cel:(0370) 4381395 Correo: Raguirre.adrian@hotmail.com</h5></div>
  
  </div>
</div>
    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script src="../js/js.js" language="javascript"></script>
  </body>
</html>  