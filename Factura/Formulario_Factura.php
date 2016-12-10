<?php 
session_start();
include '../conexion.php';
$resultado = mysql_query("SELECT * FROM factura") or mysql_error(($conexion));
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
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class='glyphicon glyphicon-list-alt'></i> Nueva Factura</h4>
        </div>
            <div class="panel-body">
                <?php 
                    include 'modal/buscar_productos.php';
                ?>

                <?php 
                    include 'modal/buscar_fallas.php';
                ?>       
                
                <form class="form-horizontal" role="form" id="datos_factura">

                    <div class="form-group row">
                        <label for="nombre_cliente" class="col-md-1 control-label">Cliente *</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="PERSONA_APELLIDO" placeholder="Selecciona un cliente" required>
                            <input id="ID_PERSONA" type='hidden'> 
                        </div>

                        <label for="celular" class="col-md-1 control-label">Nombre</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="PERSONA_NOMBRE" placeholder="Nombre" required readonly>
                             
                        </div>

                        <label for="celular" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="fecha" placeholder="Fecha" value="<?php echo date("d/m/Y"); ?>" readonly>
                             
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="celular" class="col-md-1 control-label">C.U.I.T/C.U.I.L</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="PERSONA_CUIT" placeholder="C.U.I.T/C.U.I.L" required readonly>
                             
                        </div>
                        <label for="celular" class="col-md-1 control-label">Teléfono</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="PERSONA_TEL" placeholder="Telefono" required readonly>
                             
                        </div>
                        <label for="celular" class="col-md-1 control-label">Celular</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control input-sm" id="PERSONA_CEL" placeholder="Celular" required readonly>
                             
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vendedor" class="col-md-1 control-label">Vendedor</label>
                            <div class="col-md-3"><select class="form-control input-sm" id="id_vendedor" disabled="">
                                            <option>Seleccione Operador</option>
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
                                          </select>
                            </div>

                        

                        <label for="pago" class="col-md-1 control-label">Tipo Fac</label>
                            <div class="col-md-3"><select class="form-control input-sm" id="fac" disabled>
                                            <?php
                                                $buscar = mysql_query ("SELECT ID_TIPO_FACT, TIPO_DESCRIPCION FROM tipo_factura;",$conexion)
                                                or die ("Error en la consulta de SQl");
                                                while ($row = mysql_fetch_array ($buscar))
                                                {
                                                echo '<option
                                                value = "'.$row['ID_TIPO_FACT'].'">'.$row['TIPO_DESCRIPCION'].'</option>';
                                                }      
                                            ?>
                                          </select>
                            </div>
                        <label for="pago" class="col-md-1 control-label">Pago</label>
                            <div class="col-md-3"><select class="form-control input-sm" id="condiciones">
                                            <?php
                                                $buscar = mysql_query ("SELECT ID_MODO_PAGO, PAGO_DESCRIPCION FROM modo_pago;",$conexion)
                                                or die ("Error en la consulta de SQl");
                                                while ($row = mysql_fetch_array ($buscar))
                                                {
                                                echo '<option
                                                value = "'.$row['ID_MODO_PAGO'].'">'.$row['PAGO_DESCRIPCION'].'</option>';
                                                }      
                                            ?>
                                          </select>
                            </div>     
                    </div>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
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
    <script type="text/javascript" src="Javascript/busca_factura_p.js"></script>
    <link rel="stylesheet" href="../jquery-ui-themes-1.12.0/themes/smoothness/jquery-ui.css">
    <!--link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"-->
    <script src="../jquery-ui-1.12.0/jquery-ui.js"></script>
    <script>
        $(function() {
                        $("#PERSONA_APELLIDO").autocomplete({
                            source: "../ajax/autocomplete/clientes.php",
                            minLength: 2,
                            select: function(event, ui) {
                                //console.log(ui.item.PERSONA_APELLIDO)
                                //alert(ui.item.PERSONA_APELLIDO);
                                //return false;
                                //event.preventDefault();
                                $('#ID_PERSONA').val(ui.item.ID_PERSONA);
                                $('#PERSONA_APELLIDO').val(ui.item.PERSONA_APELLIDO);
                                $('#PERSONA_NOMBRE').val(ui.item.PERSONA_NOMBRE);
                                $('#PERSONA_CUIT').val(ui.item.PERSONA_CUIT);
                                $('#PERSONA_TEL').val(ui.item.PERSONA_TEL);
                                $('#PERSONA_CEL').val(ui.item.PERSONA_CEL);
                                                                
                                
                             }
                        });
                         
                        
                    });
                    
    $("#PERSONA_APELLIDO" ).on( "keydown", function( event ) {
                        if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
                        {
                            $("#ID_PERSONA" ).val("");
                            $("#PERSONA_CUIT" ).val("");
                            $("#PERSONA_CEL" ).val("");
                            $('#PERSONA_TEL').val("");
                            $("#PERSONA_NOMBRE" ).val("");
                                            
                        }
                        if (event.keyCode==$.ui.keyCode.DELETE){
                            $("#PERSONA_APELLIDO" ).val("");
                            $("#ID_PERSONA" ).val("");
                            $("#PERSONA_CUIT" ).val("");
                            $("#PERSONA_CEL" ).val("");
                            $('#PERSONA_TEL').val("");
                            $("#PERSONA_NOMBRE" ).val("");
                        }
            }); 
    </script>
    <script type="text/javascript" src="Javascript/nueva_factura.js"></script>
    
</body>
</html>       