<?php 
session_start();
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM insumo JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA
JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN proveedor ON RELA_PROVEEDOR = ID_PROVEEDOR 
JOIN tipo_servicio ON RELA_TIPO_SERVICIO = ID_TIPO_SERVICIO;") or mysql_error(($conexion));
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bower_components/animate.css/animate.min.css">
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
            <a href="Lista_Reportes.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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

<h4 align="center">Filtrar Por Fechas</h4><br>

    <table border="0" align="center">
        <tr align="center">
            <td><strong>Fecha  Desde: &nbsp;</strong></td>
            <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
            <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>
<form action="Reporte_Proveedores.php">             
            <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
            <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
        </tr>
    </table>
</form> <br>

<div class="container-fluid">
    <div style="margin:0 0 30 1168px;">
        <td>
            <a target="_blank" href="javascript:reportePDF();">
                <button type="button" class="btn btn-danger">
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                </button>
            </a>
        </td>
    </div>
</div>

<div id="resultados">
    <div id="agrega-registros">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td>#</td>
                <td>Fecha</td>
                <td>Proveedor</td>
                <td>CUIT</td>
                <td>Contacto</td>
                <td>Correo</td>
                <td>Categoría Insumo</td>
                <td>Marca Insumo</td>
                <td>Modelo Insumo</td>
                <td>Tipo de Servicio</td>
            </tr>
            <?
                while($row = mysql_fetch_array($resultado))
                {
                    $fecha=date("d/m/Y", strtotime($row['FECH_ALTA']));
            ?>
            <tr style="background: #fff;" align="center">
                <td><?php echo $row['ID_PROVEEDOR'] ?></td>
                <td><?php echo $fecha ?></td>
                <td><?php echo $row['NOMBRE_RAZON_SOCIAL'] ?></td>
                <td><?php echo $row['PROVEEDOR_CUIT'] ?></td>
                <td><?php echo $row['TELEFONO'] ?></td>
                <td><?php echo $row['CORREO'] ?></td>
                <td><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
                <td><?php echo $row['MARCA_INS_DESC'] ?></td>
                <td><?php echo $row['INS_MODELO_DESC'] ?></td>
                <td><?php echo $row['DESCRIPCION'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script src="jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="js/busca_fecha_p.js"></script>
<script type="text/javascript" src="js/imprimir_r_proveedores.js"></script>
</body>
</html>