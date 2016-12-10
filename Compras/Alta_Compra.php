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

	$tipo					= $_POST['RELA_COMPROBANTE'];
	$comprobante			= $_POST['NUM_REMITO'];
	$categoria				= $_POST['RELA_CATEGORIA'];
	$marca					= $_POST['RELA_INS_MARCA'];
	$modelo					= $_POST['RELA_INS_MODE'];
	$codigo                 = $_POST['codigo'];
	$cantidad               = $_POST['cantidad'];               
	$subt					= $_POST['COMPRA_SUBTOTAL'];
	$total					= $_POST['COMPRA_TOTAL'];
	$iva					= $_POST['COMPRA_IVA'];
	$compra 			    = $_POST['monto'];
 	$venta 			        = $_POST['venta'];
 	$fecha					= $_POST['FECHA_COMPRA'];

 	foreach( $codigo as $key => $n ) {
  		 $sql  =	"INSERT INTO compra (FECHA_COMPRA,COD_INSUMO,COMPRA_CANTIDAD,COMPRA_PRECIO,COMPRA_VENTA,NUM_COMPROBANTE,";
 		   $sql .="COMPRA_SUBTOTAL,COMPRA_IVA,COMPRA_TOTAL,RELA_COMPROBANTE)";
 		   $sql .="VALUES ('".$fecha."','".$codigo[$key]."','".$cantidad[$key]."','".$compra[$key]."','".$venta[$key]."','".$comprobante."','".$subt."', '".$iva."','".$total."','".$tipo."')";


       /* tabla duplicada */
       $sql2  = "INSERT INTO historico_compra (ID_INSUMO,FECHA_COMPRA_H,PRECIO_COMPRA_H,PRECIO_VENTA_H)";
       $sql2 .="VALUES ('".$codigo[$key]."','".$fecha."','".$compra[$key]."','".$venta[$key]."')";
       $result = mysql_query($sql2) or die(mysql_error());
       //echo $sql;
       //echo $result;
       //exit();

        $sql_update=mysql_query("SELECT * from insumo WHERE COD_INSUMO = '".$codigo[$key]."';") or mysql_error(($conexion));
        $rw_user=mysql_fetch_array($sql_update);

        $valorActual=$rw_user['INSUMO_CANTIDAD']; 

        // Y DESPUÉS 

        $valorNuevo=$valorActual + $cantidad[$key]; 
        //echo $valorNuevo;
        //exit();


        // Y YA CON EL UPDATE 

        mysql_query("UPDATE insumo SET INSUMO_CANTIDAD=".$valorNuevo."

                     WHERE COD_INSUMO = '".$codigo[$key]."';");

			if(!mysql_query($sql)){	
?>				
	 								

?>	    

<?php 
$mensaje = mysql_error();
	 		}else{
	 			$mensaje = "Registro Insertado.";
	 		}
			//print "<meta http-equiv=Refresh content=\"2 ; url= Lista_Clientes.php\">"; 
		} 
		
		mysql_close($conexion);	
?>		
<tr class="table-info" align="center">
	      	<td alingn="center"><button class="btn btn-success" style="width:1300px; margin: 150 0 0 30px;"><?php echo $mensaje;?><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
	      	</td>
</tr>
<tr class="table-info" align="center">
	      	<td alingn="center"><br>
	      		<a class="btn btn-info" href="Formulario_Compras.php" role="button"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Volver a compras.</a>
	      	</td>

</tr>
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
<script>
	//alert("Datos modificados exitosamente.");
	//window.history.back();
</script>