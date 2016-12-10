<?php 
session_start();
include '../conexion.php';
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
            <a href="Lista_Proveedor.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
<body>

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class='btn btn-success' id="btnNuevoAlineamiento"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</div>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<form action="Insumo_del_Proveedor.php" method="post">
					<table class="table table-bordered table-hover" id="tablaAlineamientos">
						<tr class="info">
							<!--td align="center"><strong>Fecha</strong></td-->
                            <td align="center"><strong>Insumos</strong></td>
							<td align="center"><strong>Opciones</strong></td>
						</tr>
						<tr>
							<!--td><input type="date" name="fecha[]" class="form-control" required onkeypress="return soloLetras(event)">
                            </td-->
                            <td><input type="text" name="estrategias[]" class="form-control" required onkeypress="return soloLetras(event)">
                            </td>
							<td class="text-center"><div class='btn btn-danger'>Eliminar</div></td>
						</tr>
					</table>
					<div class="row" align="center">
					<input type="hidden" name="id_proveedor" value="<?php echo $_GET['id']; ?>">
						<button class="btn btn-success" type="submit">Guardar</button>
						
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="js/edicion.js"></script>
<script type="text/javascript" src="../Validaciones/Validar.js"></script> 
</body>
</html>