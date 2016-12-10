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

<form action="Alta_Clientes.php" method="post" id="productForm">

    <div class="container-fluid">

        <h4 align="center">Datos del Cliente</h4>
        <?php include '../Funcion_Caracter.php'; ?>
          <div class="row" align="center">
              <div class="col-md-3"><label>Cód. Clie:</label></div>
              <div class="col-md-2"><input type="" class="form-control" name="COD_CLIE" value="<?php echo "$temp"?>" readonly></div>
              <div class="col-md-3"><label>Apellido/s:</label></div>
              <div class="col-md-3"><input type="" class="form-control" name="PERSONA_APELLIDO" required></div>
          </div>
            <br>      
          <div class="row" align="center">
              <div class="col-md-3"><label>Fec. Alta:</label></div>
              <div class="col-md-2"><input type="date" class="form-control" name="PERSONA_FEC_ALTA" required></div>
              <div class="col-md-3"><label>Nombre/s:</label></div>
              <div class="col-md-3"><input type="" class="form-control" name="PERSONA_NOMBRE" required></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><select class="form-control" name="color" required>
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
              <div class="col-md-2"><input type="" class="form-control" name="PERSONA_DNI" required></div>
              <div class="col-md-3"><label>Fec. Nac.</label></div>
              <div class="col-md-2"><input type="date" class="form-control" name="PERSONA_FECNAC"></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>CUIL:</label></div>
              <div class="col-md-2"><input type="" class="form-control" name="PERSONA_CUIL"></div>
              <div class="col-md-3"><label>CUIT:</label></div>
              <div class="col-md-2"><input type="" class="form-control" name="PERSONA_CUIT"></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Tipo Persona:</label></div>
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
              <div class="col-md-3"><label>Tipo Sexo:</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_TIPO_SEXO" id="bootstrapSelectForm">
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
          <div class="row" align="center">
          <h4 align="center">Datos de Contacto</h4>
              <div class="col-md-3"><label>Teléfono:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_TEL" required></div>
              <div class="col-md-3"><label>Celular:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CEL" required></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Fax:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_FAX"></div>
              <div class="col-md-3"><label>E-mail:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CORREO"></div>
          </div>

          <div class="row" align="center">
          <h4 align="center">Domicilios</h4>
              <div class="col-md-3"><label>Calle:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CALLE" required></div>
              <div class="col-md-3"><label>Numero:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_NUMERO" required></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Manzana:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_MANZANA"></div>
              <div class="col-md-3"><label>Casa:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CASA"></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Sector:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_SECTOR"></div>
              <div class="col-md-3"><label>Piso:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PEROSNA_PISO"></div>
          </div>
            <br>
          <div class="row" align="center">
              <div class="col-md-3"><label>Cód. Postal:</label></div>
              <div class="col-md-2"><input type=""  class="form-control" name="PERSONA_CP"></div>
              <div class="col-md-3"><label>Elije un Barrio:</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_BARRIO" required>
                                    <option>Seleccione...</option>
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
              <div class="col-md-2"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button></div>
          </div>
    </div>

            <br>
            <div align="center">
                <a href="../Menu_Administrador.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> VOLVER</button></a>
                <button class="btn btn-success" type="submit">Guardar</button>
                
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4"><label>Agregar Barrio:</label></div>
            <div class="col-md-4"><input type="text" name="barrio" class="form-control"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="registrar();">Save changes</button>
      </div>
    </div>
  </div>
</div>

</form>

<?php 

  include '../conexion.php';

  $sql = "SELECT INSUMO_CANTIDAD FROM insumo";
  
  $resultado = mysql_query($sql);

  $fila = mysql_fetch_array($resultado);

  $cantidad = $fila ['INSUMO_CANTIDAD'];

  $cant_alta  = 100;
  $cant_medio = 50;
  $cant_baja  = 20;
  $sin_stock  = 0;


  //if ($cantidad >= $cant_alta) {
  //  $mensaje =  "Alto";
  //  echo $mensaje;
  //} elseif ($cantidad >= $cant_medio) {
  //  $mensaje =  "Medio";
  //  echo $mensaje;
  //} elseif ($cantidad >= $cant_baja) {
  //  $mensaje =  "Bajo";
  //  echo $mensaje; 
  //}
  //  else {
  //    $mensaje =  "Sin Stock";
  //  echo $mensaje;
  //  }

  if ($cantidad >= $cant_alta)
  {
    $mensaje = '<span class="label label-success">STOCK ALTO</span>';
    echo $mensaje;
  }
    elseif ($cantidad >= 51)
  {
      $mensaje = '<span class="label label-success">STOCK ALTO</span>';
      echo $mensaje;
  }
    elseif ($cantidad >= $cant_medio)
  {
      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
      echo $mensaje;
  }
    elseif ($cantidad >= 21)
  {
      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
      echo $mensaje;
  }
    elseif ($cantidad >= $cant_baja)
  {
      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
      echo $mensaje;
  }
    elseif ($cantidad >= 1)
  {
      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
      echo $mensaje;
  }
    else
  {
      $mensaje = '<span class="label label-default">SIN STOCK</span>';
      echo $mensaje;
}

  //} elseif ($cantidad >= $cant_medio && $cantidad >= 21) {
  //  $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
  //  echo $mensaje;
  //} elseif ($cantidad >= $cant_baja && $cantidad >= 1) {
  //  $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
  //  echo $mensaje;
  //}
  //  else {
  //  $mensaje = '<span class="label label-primary">SIN STOCK</span>';
  //  echo $mensaje;
  //  }

?>

<div class="container-fluid"> 
  <div class="footer-formularios">
    
      <div class="panel-footer"><h5 align="center"><?php $csite_name = 'SOFTEC V1.0'; ?>
      Copyright&copy; <?php echo date( 'm/d/y' ); ?> - <?php echo $csite_name; ?>&nbsp;Diseñado por  Aguirre, Richard A. Cel:(0370) 4381395 Correo: Raguirre.adrian@hotmail.com</h5></div>
  
  </div>
</div>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script> 
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