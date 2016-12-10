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


$operador 			= $_POST['id'];
$apellido			= $_POST['APELLIDO_OPERADOR'];
$nombre				= $_POST['NOMBRE_OPERADOR'];
$dni				= $_POST['DNI_OPERADOR'];
$correo				= $_POST['CORREO_OPERADOR'];
$telefono			= $_POST['OPERDOR_TEL'];
$celular			= $_POST['OPERADOR_CEL'];
$usuario			= $_POST['US_NOMBRE'];
$contraseña			= $_POST['US_PASSWORD'];

//var_dump($operador);

//echo $operador,$apellido, $nombre, $dni, $correo, $telefono, $celular, $usuario, $contraseña;

//exit();

$sql = "UPDATE operador SET APELLIDO_OPERADOR = '$apellido',
							NOMBRE_OPERADOR = '$nombre',
							DNI_OPERADOR = '$dni',
							CORREO_OPERADOR = '$correo',
							US_NOMBRE = '$usuario',
							US_PASSWORD = '$contraseña',
							OPERDOR_TEL = '$telefono',
							OPERADOR_CEL = '$celular'
							WHERE id = '".$_SESSION['id']."'";
//printf ("Registros actualizados: %d\n", mysql_affected_rows());
//mysql_query("COMMIT");

if($resultado = mysql_query($sql)){
?>    
		<tr class="table-info" align="center">
      <td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;">Tus datos se Modificaron con Éxito!.&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
    </tr>
<?php     
    print "<meta http-equiv=Refresh content=\"2 ; url= ../Menu_Tecnico.php\">"; 
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
<div class="footer">
	<pre style="margin:40 0 0 0px;"><center>Softec V1.0 <?php echo date("d/m/Y"); ?><br> Contacto: <i>Raguirre.adrian@hotmail.com</i><br>Cel:(370) - 381395 <i class="fa fa-refresh  fa-spin fa-lg fa-fw"></i></center></pre>
</div>
</body>
</html>  