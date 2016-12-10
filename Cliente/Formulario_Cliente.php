<?php 
include '../conexion.php';
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
 
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> <!--Llamamos al archivo CSS a través de CDN -->
  	<!--link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"-->
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script type="text/javascript" src="../js1/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="../js1/cargar_paises.js"></script>
  </head>
  <body>

<nav class="nav">
	<a href=""><img src="../img/hp.jpg" class="img"></a>
    <ul class="ul">
        <li class="li"><a href="Cliente/Lista_Cliente.php">Clientes</a></li>
        <li class="li"><a href="#">Equipos</a></li>
        <li class="li"><a href="#">Proveedores</a></li>
        <li class="li"><a href="#">Facturación</a></li>
        <li class="li"><a href="#">Insumos</a></li>
        <li class="li"><a href="#">Compras</a></li>
        <li class="li"><a href="#">Reportes</a></li>
        <li class="li"><a href="#">Calendario</a></li>
        <li class="li"><a href="#">Auditoria</a></li>
        <li class="li"><a href="#">Configuración</a></li>


    </ul>
</nav>

<h3 align="center">Formulario de Clientes</h3><br>

<form action="Alta_Clientes.php" method="post">
    
        <h4 align="center">Datos de Persona</h4><br>
        <?php include '../Funcion_Caracter.php'; ?>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Cód Clie:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="COD_CLIE" value="<?php echo "$temp"?>" readonly></div>
              <div class="col-md-2"><label>Apellido/s:</label></div>
              <div class="col-md-3"><input type="text"  class="form-control" name="PERSONA_APELLIDO" required></div>
            </div>
            <br>
            <div class="row div" align="center">
              <div class="col-md-3"><label>Fec. Alta:</label></div>
              <div class="col-md-2"><input type="date"  class="form-control" name="PERSONA_FEC_ALTA" required></div>
              <div class="col-md-2"><label>Nombre/s:</label></div>
              <div class="col-md-3"><input type="text"  class="form-control" name="PERSONA_NOMBRE" required></div>
            </div>
            <br>
            <div class="row div" align="center">
                <div class="col-md-3"><select class="form-control" name="RELA_TIPO_DOCUMENTO" required>
                                    <option>Tipo Documento</option>
                                    <?php
                                    //include '../conexion.php'; 
                                    $buscar = mysql_query ("select ID_TIPO_DOCUMENTO, DOCUMENTO_DESCRIPCION from tipo_documento;",
                                              $conexion)
                                    or die ("Error en la consulta de SQl");
                                    while ($row = mysql_fetch_array ($buscar))
                                    {
                                    echo '<option
                                    value = "'.$row['ID_TIPO_DOCUMENTO'].'">'.$row['DOCUMENTO_DESCRIPCION'].'</option>';
                                    }
                                    ?>
                                    </select>
                </div>
                <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_DNI" required></div>
                <div class="col-md-2"><label>Fec. Nacimiento:</label></div>
                <div class="col-md-2"><input type="date"  class="form-control" name="PERSONA_FECNAC"></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>CUIL</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CUIL"></div>
              <div class="col-md-2"><label>CUIT</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CUIT"></div>
            </div>
            <br>

            <div class="row div" align="center">
                <div class="col-md-3"><label>Tipo Persona:</label></div>
                <div class="col-md-2"><select class="form-control" name="RELA_TIPO_PERSONA" required>
                                    <option>Seleccione...</option>
                                    <?php 
                                    //include '../conexion.php';
                                    $buscar = mysql_query ("select ID_TIPO_PERSONA, DESCRIPCION from tipo_persona;",
                                              $conexion)
                                    or die ("Error en la consulta de SQl");
                                    while ($row = mysql_fetch_array ($buscar))
                                    {
                                    echo '<option
                                    value = "'.$row['ID_TIPO_PERSONA'].'">'.$row['DESCRIPCION'].'</option>';
                                    }
                                    ?>
                                    </select>
                </div>
                <div class="col-md-2"><label>Sexo:</label></div>
                <div class="col-md-2"><select class="form-control" name="RELA_TIPO_SEXO" required>
                                      <option>Seleccione...</option>
                                      <?php 
                                      //include '../conexion.php';
                                      $buscar = mysql_query ("select ID_TIPO_SEXO, TIPO_SEXO_DESC from tipo_sexo;",
                                                $conexion)
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

            <div class="row div" align="center">
              <div class="col-md-3"><select class="form-control" id="paises" name="paises">
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
              <div class="col-md-3"><select class="form-control" id="provincias" name="provincias">
                                    
                                    </select>
              </div>
             <!-- <div class="col-md-3"><select class="form-control" id="ciudades" name="ciudades">
                                    
                                    </select>
              </div> -->
              <div class="col-md-1"><label>Agregar</label><a href=""><img src="../Iconos PNG/direccion.png" class="img-direccion" data-toggle="modal" data-target="#myModal"></a></div> 
            </div>
            <dl>
            <br>
        <h4 align="center">Datos de Contacto</h4><br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Teléfono:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_TEL" required></div>
              <div class="col-md-2"><label>Celular:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CEL" required></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Fax:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_FAX"></div>
              <div class="col-md-2"><label>E-Mail:</label></div>
              <div class="col-md-2"><input type="text"  class="form-control" name="PERSONA_CORREO"></div>
            </div>
            <br>

        <h4 align="center">Domicilio</h4><br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Calle:</label></div>
              <div class="col-md-2"><input type="text"  class="form-control" name="PERSONA_CALLE" required></div>
              <div class="col-md-2"><label>Número:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_NUMERO" required></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Manzana:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_MANZANA"></div>
              <div class="col-md-2"><label>Casa:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CASA"></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Sector:</label></div>
              <div class="col-md-2"><input type="text"  class="form-control" name="PERSONA_SECTOR"></div>
              <div class="col-md-2"><label>Piso:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PEROSNA_PISO"></div>
            </div>
            <br>

            <div class="row div" align="center">
              <div class="col-md-3"><label>Código Postal:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CP"></div>
              <div class="col-md-2"><select class="form-control" name="RELA_BARRIO" required>
                                    <option>Seleccione uno...</option>
                                    <?php 
                                    $buscar = mysql_query ("select ID_BARRIO, BARRIO_DESC from barrio;",$conexion)
                                    or die ("Error en la consulta de SQl");
                                    while ($row = mysql_fetch_array ($buscar))
                                    {
                                    echo '<option
                                    value = "'.$row['ID_BARRIO'].'">'.$row['BARRIO_DESC'].'</option>';
                                    }      
                                    ?>
                                    </select>
              </div>
              <div class="col-md-2"><label>Agregar Barrios</label><a href=""><img src="../Iconos PNG/Agregar_Barrios.png" class="img-barrio"></a></div>
            </div>

            <br>
            <div align="center">
                <a href="../Menu_Administrador.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
                <button class="btn btn-success" type="submit">Guardar</button>
                
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  
</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid"> 
  <div class="footer-formularios">
    
      <div class="panel-footer"><h5 align="center"><?php $csite_name = 'SOFTEC V1.0'; ?>
      Copyright&copy; <?php echo date( 'm/d/y' ); ?> - <?php echo $csite_name; ?>&nbsp;Diseñado por  Aguirre, Richard A. Cel:(0370) 4381395 Correo: Raguirre.adrian@hotmail.com</h5></div>
  
  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
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
  </body>
</html>  