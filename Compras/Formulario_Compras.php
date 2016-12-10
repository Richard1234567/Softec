<?php 
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:../login.php");
}
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
  <link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../select2/dist/css/select2.min.css">
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
            <a href="Lista_Compras.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
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

<h3 align="center">Registrar Compra</h3><br>
<?php include 'modal/modal_compras.php'; ?>
<?php include 'modal/modal_lista.php'; ?>
<form action="Alta_Compra.php" method="post">
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="col-md-3"><label>Tipo Comprobante</label></div>
            <div class="col-md-2"><select class="form-control Comprobante" name="RELA_COMPROBANTE" id="select-comprobante">
                                    <option>Seleccione</option>
                                    <?php 
                                        $buscar = mysql_query ("select ID_COMPROBANTE, COMPROBANTE from tipo_comprobante;",$conexion)
                                        or die ("Error en la consulta de SQl");
                                        while ($row = mysql_fetch_array ($buscar))
                                        {
                                        echo '<option
                                        value = "'.$row['ID_COMPROBANTE'].'">'.$row['COMPROBANTE'].'</option>';
                                        }      
                                    ?>
                                  </select>
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Agregar
              </button>
            </div>
            <div class="col-md-3"><label>N° Comprobante</label></div>
            <div class="col-md-2"><input type="text" style="text-align:center" name="NUM_REMITO" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
        </div><br>

        

        <div class="row" align="center">
            <div class="col-md-3"><label>Fecha</label></div>
            <div class="col-md-2"><input type="date" name="FECHA_COMPRA" class="form-control" required></div>
        </div><br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myCompras">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar Productos
                </button>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <table class="table table-bordered table-hover" id="tablaAlineamientos">
                        <tr class="info">
                            <td align="center"><strong>Código</strong></td>
                            <td align="center"><strong>Descripcion</strong></td>
                            <td align="center"><strong>Cantidad</strong></td>
                            <td align="center"><strong>Precio Compra/Lote/Unidad</strong></td>
                            <td align="center"><strong>Precio Venta/Lote/Unidad</strong></td>
                            <td align="center"><strong>Opciones</strong></td>
                        </tr>
                        
                    </table>
                    <table class="table">
                        <tr class="info">
                            <td align="center"><strong>Subtotal</strong></td>
                            <td align="center"><strong>IVA</strong></td>
                            <td align="center"><strong>Total</strong></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="COMPRA_SUBTOTAL" class="form-control" id="sub" readonly></td>
                            <td><input type="text" name="COMPRA_IVA" class="form-control" id="iva" readonly></td>
                            <td><input type="text" name="COMPRA_TOTAL" class="form-control" id="total" readonly></td>
                        </tr>
                    </table>
                    <div class="row" align="center">
                        <button class="btn btn-success" type="submit">Guardar</button> 
                    </div>
                </div>
            </div>
        </div>    
    </div>
</form>
<div id="resultado" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->  


<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="Javascript/insumo.js"></script>
<script type="text/javascript" src="javascript/prueba.js"></script>
<script type="text/javascript" src="javascript/agregar_lista.js"></script>
<script type="text/javascript" src="../select2/dist/js/select2.full.min.js"></script>
  

<script type="text/javascript">


$('.categoria').select2({    
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});
</script>
<script type="text/javascript">


$('.marca').select2({    
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});
</script>
<script type="text/javascript">


$('.modelo').select2({    
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});
</script>
<script type="text/javascript">


$('.Comprobante').select2({    
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});
</script>
<script type="text/javascript" src="../Validaciones/Validar.js"></script>
</body>
</html>