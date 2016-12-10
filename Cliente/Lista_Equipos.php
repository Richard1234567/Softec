<?php 
session_start();
include '../conexion.php';
//$resultado = mysql_query("SELECT * FROM persona") or mysql_error(($conexion));
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
            <a href="Lista_Clientes.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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


<h3 align="center">LISTA DE EQUIPOS</h3><br>

<?php
    include_once("../conexion.php");

    //$con = new DB;
    //$pacientes = $con->conectar();
    $pacientes = $_GET['id'];
    $strConsulta = "SELECT * from diagnostico join equipo on RELA_EQUIPO = ID_EQUIPO join estado_equipo 
                    on RELA_ESTADO = ID_ESTADO join marca on RELA_MARCA = ID_MARCA join modelo on RELA_MODELO = ID_MODELO join persona on RELA_PERSONA = ID_PERSONA WHERE ID_PERSONA = '$pacientes'";
    $pacientes = mysql_query($strConsulta);
?>   

<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
    <thead>
        <tr class="table-info" align="center">
            <td class="td">#</td>
            <td class="td">Fec. Alta</td>
            <td class="td">Marca</td>
            <td class="td">Modelo</td>
            <td class="td">Estado</td>
        </tr>
    </thead>
    <tbody>
    <?php while ($reg = mysql_fetch_array($pacientes)) { ?>
        <tr style="background: #fff;" align="center">
            <td class="td"><?php echo $reg ['ID_EQUIPO'] ?></td>
            <td class="td"><?php echo $reg ['FECHA_ALTA'] ?></td>
            <td class="td"><?php echo $reg ['MARCA_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $reg ['MODELO_DESCRIPCION'] ?></td>
            <td class="td"><button  class="btn" disabled style="background: #58ACFA; width: 190px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><?php echo $reg ['ESTADO_DESCRIPCION'] ?></button>
            </td>
        </tr>
    <?php } ?>    
    </tbody>
</table> 

<br>
<!--table align="center">
    <tr>
        <td><a href="Lista_Clientes.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a></td>
    </tr>
</table-->
</body>
</html>