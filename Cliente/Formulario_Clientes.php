<?php 
include '../conexion.php';
session_start();
if (@!isset($_SESSION["US_NOMBRE"])) {
  header("location:../login.php");
}
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

<h3 align="center">Formulario de Clientes</h3><br>

<?php include 'Modal/modal_barrio.php'; ?>

<form action="Alta_Clientes.php" method="post">

    <div class="container-fluid">

        <h4 align="center">Datos del Cliente</h4>
        <?php include '../Funcion_Caracter.php'; ?>
          <div class="row" align="center">
              <div class="col-md-3"><label>Cód. Clie:</label></div>
              <div class="col-md-2"><input type="" class="form-control" name="COD_CLIE" value="<?php echo "$temp"?>" readonly></div>
              <div class="col-md-3"><label>Apellido/s: *</label></div>
              <div class="col-md-3"><input type="" class="form-control" name="PERSONA_APELLIDO" required onkeypress="return soloLetras(event)"></div>
          </div>
            <br>      
          <div class="row" align="center">
              <div class="col-md-3"><label>Fec. Alta: *</label></div>
              <div class="col-md-2"><input type="date" class="form-control" name="PERSONA_FEC_ALTA" required></div>
              <div class="col-md-3"><label>Nombre/s: *</label></div>
              <div class="col-md-3"><input type="" class="form-control" name="PERSONA_NOMBRE" required onkeypress="return soloLetras(event)"></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><select class="form-control" name="RELA_TIPO_DOCUMENTO" required>
                                    <option>Tipo Documento</option>
                                    <?php 
                                        $buscar = mysql_query ("select ID_TIPO_DOCUMENTO, DOCUMENTO_DESCRIPCION from tipo_documento;",$conexion)
                                        or die ("Error en la consulta de SQl");
                                        while ($row = mysql_fetch_array ($buscar))
                                        {
                                        echo '<option
                                        value = "'.$row['ID_TIPO_DOCUMENTO'].'">'.$row['DOCUMENTO_DESCRIPCION'].'</option>';
                                        }      
                                    ?>
                                    </select>
              </div>
              <div class="col-md-2"><input type="" class="form-control" name="PERSONA_DNI" maxlength="9" required onKeyPress="return SoloNumeros(event)"></div>
              <div class="col-md-3"><label>Fec. Nac.</label></div>
              <div class="col-md-2"><input type="date" class="form-control" name="PERSONA_FECNAC"></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>CUIL/CUIT :</label></div>
              <div class="col-md-2"><input type="" class="form-control" name="PERSONA_CUIL" onKeyPress="return SoloNumeros(event)"></div>
              
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Tipo Persona: *</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_TIPO_PERSONA" required>
                                    <option>Seleccione...</option>
                                    <?php 
                                        $buscar = mysql_query ("select ID_TIPO_PERSONA, DESCRIPCION from tipo_persona;",$conexion)
                                        or die ("Error en la consulta de SQl");
                                        while ($row = mysql_fetch_array ($buscar))
                                        {
                                        echo '<option
                                        value = "'.$row['ID_TIPO_PERSONA'].'">'.$row['DESCRIPCION'].'</option>';
                                        }      
                                    ?>
                                    </select>
              </div>
              <div class="col-md-3"><label>Tipo Sexo: *</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_TIPO_SEXO" required>
                                    <option>Seleccione...</option>
                                    <?php 
                                        $buscar = mysql_query ("select ID_TIPO_SEXO, TIPO_SEXO_DESC from tipo_sexo;",$conexion)
                                        or die ("Error en la consulta de SQl");
                                        while ($row = mysql_fetch_array ($buscar))
                                        {
                                        echo '<option
                                        value = "'.$row['ID_TIPO_SEXO'].'">'.$row['TIPO_SEXO_DESC'].'</option>';
                                        }      
                                    ?>
                                    </select>
              </div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Elije un País:</label></div>
              <div class="col-md-2"><select class="form-control" id="paises" name="paises">
                                        <?php 
                                          $dbhost = "localhost";
                                          $dbuser = "root";
                                          $dbpass = "";
                                          $dbname = "softec";
                               
                                          $db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
                               
                                          $paises = $db->query("SELECT * FROM paises ORDER BY nombre");
                                        ?> 
                                        <option value="0">Seleccione un país</option>
                                        <?php while($pais = $paises->fetch_object()) { ?>
                                        <option value="<?php echo $pais->id; ?>"><?php echo $pais->nombre; ?></option>
                                        <?php } ?>                                  
                                        </select>
              </div>
              <div class="col-md-3"><label>Elije una Provincia:</label></div>
              <div class="col-md-2"><select class="form-control" id="provincias" name="provincias">
                                        
                                    </select>
              </div>
          </div>
            <br>
          <h4 align="center">Datos de Contacto</h4>  
          <div class="row" align="center">
            <div class="col-md-3"><label>Teléfono:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_TEL" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
            <div class="col-md-3"><label>Celular: *</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_CEL" class="form-control" required="" onKeyPress="return SoloNumeros(event)"></div>
          </div>  

          <br>

          <div class="row" align="center">
            <div class="col-md-3"><label>Fax:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_FAX" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
            <div class="col-md-3"><label>Correo:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_CORREO" class="form-control"></div>
          </div>

          <br>

          <h4 align="center">Domicilio</h4>  
          <div class="row" align="center">
            <div class="col-md-3"><label>Calle: *</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_CALLE" class="form-control" onkeypress="return soloLetras(event)"></div>
            <div class="col-md-3"><label>Número: *</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_NUMERO" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
          </div>  

          <br>

          <div class="row" align="center">
            <div class="col-md-3"><label>Casa:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_CASA" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
            <div class="col-md-3"><label>Manzana:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_MANZANA" class="form-control" onkeypress="return soloLetras(event)"></div>
          </div>

          <br>

          <div class="row" align="center">
            <div class="col-md-3"><label>Sector:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_SECTOR" class="form-control" onkeypress="return soloLetras(event)"></div>
            <div class="col-md-3"><label>Piso:</label></div>
            <div class="col-md-2"><input type="" name="PEROSNA_PISO" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
          </div>

          <br>

          <div class="row" align="center">
            <div class="col-md-3"><label>Cód. Postal:</label></div>
            <div class="col-md-2"><input type="" name="PERSONA_CP" class="form-control" onKeyPress="return SoloNumeros(event)"></div>
            <div class="col-md-3"><label>Barrio:</label></div>
            <div class="col-md-2"><select class="form-control" id="select-barrio" name="RELA_BARRIO">
                                    
                                  </select>
            </div>
            <div class="col-md-1"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myBarrio">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                                  </button>
            </div>
          </div>
    </div>
    
            <br>
            <div align="center">
                
                <button class="btn btn-success" type="submit">Guardar</button>
                
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
</form>
            <!--div align="center">
              <a href="Lista_Clientes.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
            </div-->

<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="js/agregar_contactos.js"></script> 
<script>
        $('#paises').change(function(){
            var id_pais = $(this).val();
             $.post("ajax.php", {data: 'provincias', id_pais: id_pais}, function(result) {
                 $("#provincias").html(result);
             });
        });
 
        $('#provincias').change(function(){
            var id_provincia = $(this).val();
            $.post("ajax.php", {data: 'ciudades', id_provincia: id_provincia}, function(result) {
                $("#ciudades").html(result);
            });
        });
    </script>
<script type="text/javascript" src="js/agregar_barrio.js"></script>
<script type="text/javascript" src="../Validaciones/Validar.js"></script>   
  </body>
</html>      