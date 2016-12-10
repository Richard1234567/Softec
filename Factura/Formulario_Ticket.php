<?php 
session_start();
include '../conexion.php';
//$resultado = mysql_query("SELECT * FROM factura") or mysql_error(($conexion));
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
            <a href="Lista_Facturas.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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

<div class="container-fluid">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-list-alt'></i> Nuevo Ticket</h4>
        </div>
            <div class="panel-body">
                <?php 
                    include 'modal/buscar_productos_ticket.php';
                ?>
                <?php 
                $time = time();
                //echo date("d-m-Y (H:i:s)", $time);
                ?>
                <form id="datos_ticket">
                    <div class="form-group row">
                        <label for="vendedor" class="col-md-1 control-label">Vendedor</label>
                            <div class="col-md-3"><select class="form-control input-sm" id="id_vendedor" disabled="">
                                            <option>Seleccione Operador</option>
                                            <?php
                                                $sql_vendedor=mysql_query("SELECT * FROM operador ORDER BY US_NOMBRE");
                                                while ($rw=mysql_fetch_array($sql_vendedor)){
                                                    $id_vendedor=$rw["id"];
                                                    $nombre_vendedor=$rw["US_NOMBRE"];
                                                    if ($id_vendedor==$_SESSION['id']){
                                                        $selected="selected";
                                                    } else {
                                                        $selected="";
                                                    }
                                                    ?>
                                                    <option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
                                                    <?php
                                                }
                                            ?>
                                          </select>
                            </div>
                        <pre style="width:250px; margin: 0 0 0 1050">Fecha: <?php echo date("d/m/Y"); ?> Hora: <?php echo date("H:i:s", $time); ?></pre>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myTicket">
                              <span class="glyphicon glyphicon-search"></span> Agregar productos
                            </button>
                            <button type="submit" class="btn btn-danger">
                              <span class="glyphicon glyphicon-print"></span> Imprimir
                            </button>
                        </div>  
                    </div>
                </form>
                <div id="resultado" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->   
            </div>
    </div>
</div>

<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN --> 
<script type="text/javascript" src="Javascript/VentanaCentrada.js"></script>
<script type="text/javascript" src="Javascript/nuevo_ticket.js"></script>
<script type="text/javascript" src="Javascript/busca_ticket.js"></script>
</body>
</html>