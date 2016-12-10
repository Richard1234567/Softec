<?php 
session_start();
include '../conexion.php';
$resultado = mysql_query("select * from proveedor") or mysql_error(($conexion));
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

<h3 align="center">LISTA DE PROVEEDOR/ES</h3>
<br>
<h4 align="center">Filtrar Por Fechas</h4> <br>




<?php include 'modal/modal_insumo.php'; ?>

    <table border="0" align="center">
		<tr align="center">
			<td><strong>Fecha  Desde: &nbsp;</strong></td>
			<td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
			<td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>
<form action="Lista_Proveedor.php">            	
			<td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
			<td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
		</tr>
	</table>
</form>	<br>

	<div style="margin: 0 0 -35 1040px;">
		<td>
            <a href="Formulario_Proveedor.php">
            <button type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Proveedor
            </button>
            </a>
    	</td>
	</div>

	<div style="margin: 0 0 -30 1168px;">
            <td>
                <a target="_blank" href="javascript:reportePDF();">
                <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                </button>
                </a>
            </td>
            
        </div>

        <div style="width: 97%; height: 31px; background: #EEEBEB; margin: 40 0 0 20px;">
            <!--<button class="button1">Borrar</button>-->
            <input type="" placeholder="Buscar Proveedor" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1090px; width: 220px; height: 30px;">
        </div>
    </div><br>

<?php 
    if(isset($_POST['filtro'])){
                switch($_POST['filtro']){
                  case "todos":
                    $sql = "select * from proveedor;";
                    break;
                }
              }else{
                $sql = "select * from proveedor;";
    }    
?>    

    <div id='resultados'> 
    	<div id="agrega-registros">
	        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
	            <tr class="table-info" align="center">
	                <td class="td">#</td>
	                <td class="td">Fec. Alta</td>
	                <td class="td">Nombre R/S</td>
	                <td class="td">Cuit</td>
	                <td class="td">Teléfono</td>
	                <td class="td">E-mail</td>
	                <td class="td">Dirección</td>
	                <td class="td">Opciones</td>
	            </tr> 

	                <?
	                while($row = mysql_fetch_array($resultado))
	                {
                        $fecha=date("d/m/Y", strtotime($row['FECH_ALTA']));
	                ?>    
	            <tr style="background: #fff;" align="center">
	                <td class="td"><?php echo $row['ID_PROVEEDOR'] ?></td>
	                <td class="td"><?php echo $fecha?></td>
	                <td class="td"><?php echo $row['NOMBRE_RAZON_SOCIAL'] ?></td>
	                <td class="td"><?php echo $row['PROVEEDOR_CUIT'] ?></td>
	                <td class="td"><?php echo $row['TELEFONO'] ?></td>
	                <td class="td"><?php echo $row['CORREO'] ?></td>
	                <td class="td"><?php echo $row['CALLE'] ?></td>
	                <td class="td">


                     <a href="http://localhost/buscador/Proveedor/Insumo_p.php?id=<? echo $row['ID_PROVEEDOR']?>">
                        <button type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Insumo
                        </button>
                     </a> 
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="consultas(<?php echo $row['ID_PROVEEDOR']; ?>)" >
                                  <span class="fa fa-users" aria-hidden="true"></span> Ficha
                     </button>
                      
                    </td>
	            </tr>    
	                <?         
	                } 
	                ?>
	        </table> 
        </div>  
    </div>

    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script type="text/javascript" src="js/busca_fecha.js"></script>
    <script src="js/busca_proveedor.js" language="javascript"></script>
    <script type="text/javascript" src="lista_insumos.js"></script>
    <script type="text/javascript" src="js/imprimir_proveedor.js"></script>
  </body>
</html>  