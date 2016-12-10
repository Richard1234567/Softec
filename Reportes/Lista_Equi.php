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
            <a href="Lista_Clie.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li"><a href="Cliente/Lista_Clientes.php">Clientes</a></li>
                <li class="li"><a href="Equipo/Lista_Equipos.php">Equipos</a></li>
                <li class="li"><a href="Proveedor/Lista_Proveedor.php">Proveedores</a></li>
                <li class="li"><a href="Factura/Lista_Facturas.php">Facturación</a></li>
                <li class="li"><a href="Insumos/Lista_Insumo.php">Insumos</a></li>
                <li class="li"><a href="Compras/Lista_Compras.php">Compras</a></li>
                <li class="li"><a href="Reporte/Lista_Reportes.php">Reportes</a></li>
                <li class="li"><a href="Operadores/Operador_Ventas.php">Actualizar Datos</a></li>
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
<div id="content">

<h3 align="center">LISTA DE CLIENTES</h3><br>

<?php
	include_once("../conexion.php");

	//$con = new DB;
	//$pacientes = $con->conectar();
    $pacientes = $_GET['id'];
    //var_dump($pacientes);
	$strConsulta = "SELECT * FROM equipo join persona on RELA_PERSONA = ID_PERSONA 
                    join modelo on RELA_MODELO = ID_MODELO join marca on RELA_MARCA = ID_MARCA
                    WHERE ID_PERSONA = '$pacientes' ";
	$pacientes = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($pacientes);
?>    
	
	<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
        <tr class="table-info" align="center">
            <td class="td-informe">#</td>
            <td class="td-informe">Fec. Alta</td>
            <td class="td-informe">Marca</td>
            <td class="td-informe">Modelo</td>
            <td class="td-informe">Opciones</td>
        </tr>
<?php                
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysql_fetch_array($pacientes);
		$numlista = $i + 1;
?>        
		<tr style="background: #fff;" align="center">
            <td class="td-resultado"><?php  echo $numlista ?></td>
            <td class="td-resultado"><?php  echo $fila['FECHA_ALTA'] ?></td>
            <td class="td-resultado"><?php  echo $fila['MARCA_DESCRIPCION'] ?></td>
            <td class="td-resultado"><?php  echo $fila['MODELO_DESCRIPCION'] ?></td>
            <td>
            	<a target="_blank" href="http://localhost/buscador/Reportes/Ticket_Comprobante.php?id=<?php echo $fila['ID_EQUIPO']?>">
                    <button type="button" class="btn btn-danger">
                      <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                    </button>
                </a>               
            </td>
        </tr>
<?php                    
	}
?>    
	</table>
			

</div>

</body>
</html>