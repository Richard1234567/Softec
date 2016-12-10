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

  $Cliente = $_POST["ID_PERSONA"];
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
  $Ciudad = $_POST["RELA_CIUDAD"];
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
  
  $sql = "UPDATE persona SET PERSONA_FEC_ALTA = '$Fec_Alta', 
                    PERSONA_DNI = '$Docu', 
                    PERSONA_APELLIDO = '$Ape', 
                    PERSONA_NOMBRE = '$Nomb',
                    PERSONA_FECNAC = '$Fech_Nac', 
                    PERSONA_TEL = '$Tel',
                    PERSONA_CEL = '$Cel',
                    PERSONA_CORREO = '$Correo', 
                    PERSONA_CUIL = '$Cuil',
                    
                    PERSONA_CALLE = '$Calle',
                    PERSONA_NUMERO = '$Numero', 
                    PERSONA_CASA = '$Casa',
                    PERSONA_MANZANA = '$Manzana', 
                    PERSONA_SECTOR = '$Sector', 
                    PEROSNA_PISO = '$Piso',
                    PERSONA_CP = '$CP',
                    PERSONA_FAX = '$Fax',
                    RELA_TIPO_DOCUMENTO = '$Doc', 
                    RELA_TIPO_PERSONA = '$Tipo_Persona',
                    RELA_PAIS = '$Pais',
                    RELA_PROVINCIA = '$Provincia',
                    RELA_CIUDAD = '$Ciudad',
                    RELA_TIPO_SEXO = '$Tipo_Sexo',
                    RELA_BARRIO = '$Barrio' 
                    WHERE ID_PERSONA = '".$Cliente."'";
  //Sirve para validar si el UPDATE funciona correctamente. 
  //printf ("Registros actualizados: %d\n", mysql_affected_rows());
  //mysql_query("COMMIT");

	if($resultado = mysql_query($sql)){
?>    
		<tr class="table-info" align="center">
      <td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">El Cliente fue Modificado con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
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

?>
</table>
</body>
</html>  