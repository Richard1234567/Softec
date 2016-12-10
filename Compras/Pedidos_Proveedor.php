<?php 
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:../login.php");
}
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM pedido_proveedor") or mysql_error(($conexion));
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

<h3 align="center">Nuevo Pedido</h3><br>
<?php include 'modal/modal_productos.php'; ?>
<?php include 'modal/modal_proveedor.php'; ?>
<form id="datos_pedido">
    <div class="container-fluid">
    <div id="carga">
        <div class="row" align="center">
            <div class="col-md-4"><label>Razón Social:*</label></div>
            <div class="col-md-2"><input type="" name="" id="NOMBRE_RAZON_SOCIAL" class="form-control" required></div>
            <input id="ID_PROVEEDOR" type='hidden'>
            <div class="col-md-2"><label>CUIT:</label></div>
            <div class="col-md-2"><input type="" name="" id="PROVEEDOR_CUIT" class="form-control" disabled></div>
        </div><br>

        <div class="row" align="center">
            <div class="col-md-4"><label>Dirección:</label></div>
            <div class="col-md-2"><input type="" name="" id="CALLE" class="form-control" disabled></div>
            <div class="col-md-2"><label>N°:</label></div>
            <div class="col-md-2"><input type="" name="" id="NUMERO" class="form-control" disabled></div>
        </div><br>
    </div>
        <div class="row" align="center">
            <div class="col-md-4"><label>Fecha Compra:*</label></div>
            <div class="col-md-2"><input type="date" name="" id="fecha" class="form-control" required=""></div>
            <div class="col-md-2"><select class="form-control" id="id_vendedor" disabled="">
                                   <option>
                                       <?php
                                            $sql_vendedor=mysql_query("SELECT * FROM operador ORDER BY US_NOMBRE");
                                            while ($rw=mysql_fetch_array($sql_vendedor)){
                                                $id_vendedor=$rw["id"];
                                                $nombre_vendedor=$rw["US_NOMBRE"];
                                                if ($id_vendedor==$_SESSION['id'] ){
                                                    $selected="selected";
                                                } else {
                                                    $selected="";
                                                }
                                                ?>
                                                <option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
                                                <?php
                                            }
                                        ?>
                                   </option>
                                  </select>
            </div>
            <div class="col-md-2"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myProductos">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Agregar Productos
                                  </button>
            </div>
            <div class="col-md-1"><button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-print"></span> Imprimir Pedido
                                  </button>
            </div>
            
        </div><br>
    </div>
</form>
<div id="resultado" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->   
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Javascript/proveedor.js"></script>
<script type="text/javascript" src="Javascript/nuevo_pedido.js"></script>
<script type="text/javascript" src="Javascript/busca_pedido.js"></script>
<script type="text/javascript" src="Javascript/VentanaCentrada.js"></script>
<script type="text/javascript" src="../select2/dist/js/select2.full.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
                        $("#NOMBRE_RAZON_SOCIAL").autocomplete({
                            source: "../ajax/autocomplete/proveedores.php",
                            minLength: 2,
                            select: function(event, ui) {
                                //console.log(ui.item.PERSONA_APELLIDO)
                                //alert(ui.item.PERSONA_APELLIDO);
                                //return false;
                                //event.preventDefault();
                                $('#ID_PROVEEDOR').val(ui.item.ID_PROVEEDOR);
                                $('#NOMBRE_RAZON_SOCIAL').val(ui.item.NOMBRE_RAZON_SOCIAL);
                                $('#PROVEEDOR_CUIT').val(ui.item.PROVEEDOR_CUIT);
                                $('#CALLE').val(ui.item.CALLE);
                                $('#NUMERO').val(ui.item.NUMERO);
                                //$('#PERSONA_CEL').val(ui.item.PERSONA_CEL);
                                                                
                                
                             }
                        });
                         
                        
                    });
                    
    $("#NOMBRE_RAZON_SOCIAL" ).on( "keydown", function( event ) {
                        if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
                        {
                            $("#ID_PROVEEDOR" ).val("");
                            $("#NOMBRE_RAZON_SOCIAL" ).val("");
                            $("#PROVEEDOR_CUIT" ).val("");
                            $('#CALLE').val("");
                            $("#NUMERO" ).val("");
                                            
                        }
                        if (event.keyCode==$.ui.keyCode.DELETE){
                            $("#NOMBRE_RAZON_SOCIAL" ).val("");
                            $("#ID_PROVEEDOR" ).val("");
                            $("#PROVEEDOR_CUIT" ).val("");
                            $("#CALLE" ).val("");
                            $('#NUMERO').val("");
                            //$("#PERSONA_NOMBRE" ).val("");
                        }
            }); 
    </script>
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

</body>
</html>