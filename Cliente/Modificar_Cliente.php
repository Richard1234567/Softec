<?php 
include '../conexion.php';
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
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
                <li class="li"><a href="../Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>

<h3 align="center">Modificar Cliente</h3><br>

<form action="update_clientes.php" method="post">

<?php 

$id = $_GET['id'];

$registros = mysql_query ("select * from persona where ID_PERSONA = '".$id."';");

if ($reg = mysql_fetch_array ($registros))
{
    
?>    
        <h4 align="center">Datos de Persona</h4>

          <div class="container-fluid">
            <div class="row" align="center">
              <div class="col-md-3"><label>Cód. Cliente:</label></div>
              <div class="col-md-2"><input type="" name="" class="form-control" value="<?php echo $reg['COD_CLIE'] ?>"></div>
              <div class="col-md-2"><label>Apellido/s:</label></div>
              <div class="col-md-3"><input type="" name="PERSONA_APELLIDO" class="form-control" value="<?php echo $reg['PERSONA_APELLIDO'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>Fec. Alta:</label></div>
              <div class="col-md-2"><input type="date" class="form-control" name="PERSONA_FEC_ALTA" value="<?php echo $reg['PERSONA_FEC_ALTA'] ?>"></div>
              <div class="col-md-2"><label>Nombre/s:</label></div>
              <div class="col-md-3"><input type="" name="PERSONA_NOMBRE" class="form-control" value="<?php echo $reg['PERSONA_NOMBRE'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><select class="form-control" name="RELA_TIPO_DOCUMENTO">
                                      <option>
                                        <?php
                                           $registro=mysql_query("select * from tipo_documento;",$conexion) or die(mysql_error($conexion));
                                                  
                                          $buscar = mysql_query ("Select * from persona join tipo_documento on RELA_TIPO_DOCUMENTO = ID_TIPO_DOCUMENTO where ID_TIPO_DOCUMENTO = ID_TIPO_DOCUMENTO;") or 
                                          die (mysql_error ($conexion));
                                          mysql_select_db ("softec",$conexion) or 
                                          die ("Problemas en la seleccion de base de datos");
                                          //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                          $row = mysql_fetch_array($buscar);
                                          while($reg1=mysql_fetch_array($registro))
                                          {
                                           if ($row['RELA_TIPO_DOCUMENTO']==$reg1['ID_TIPO_DOCUMENTO'])
                                                 echo "<option value=\"".$row['ID_TIPO_DOCUMENTO']."\" selected>".$row['DOCUMENTO_DESCRIPCION']."</option>";
                                                      else
                                              echo "<option value=\"".$reg1['ID_TIPO_DOCUMENTO']."\">".$reg1['DOCUMENTO_DESCRIPCION']."</option>";
                                          }
                                      ?>
                                      </option>
                                    </select>
              </div>
              <div class="col-md-2"><input type="" name="PERSONA_DNI" class="form-control" value="<?php echo $reg['PERSONA_DNI'] ?>"></div>
              <div class="col-md-2"><label>Fec. Nac.:</label></div>
              <div class="col-md-2"><input type="date" name="PERSONA_FECNAC" class="form-control" value="<?php echo $reg['PERSONA_FECNAC'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>CUIL/CUIT :</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_CUIL" class="form-control" value="<?php echo $reg['PERSONA_CUIL'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>Tipo de Persona:</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_TIPO_PERSONA">
                                      <option>
                                        <?php 
                                          $registro=mysql_query("select * from tipo_persona;",$conexion) or die(mysql_error($conexion));
                                                  
                                            $buscar = mysql_query ("Select * from persona join tipo_persona on RELA_TIPO_PERSONA = ID_TIPO_PERSONA
                                                                        where ID_TIPO_PERSONA = ID_TIPO_PERSONA;") or 
                                            die (mysql_error ($conexion));
                                            mysql_select_db ("softec",$conexion) or 
                                            die ("Problemas en la seleccion de base de datos");
                                            //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                            $row = mysql_fetch_array($buscar);
                                            while($reg2=mysql_fetch_array($registro))
                                            {
                                             if ($row['RELA_TIPO_PERSONA']==$reg2['ID_TIPO_PERSONA'])
                                                   echo "<option value=\"".$row['ID_TIPO_PERSONA']."\" selected>".$row['DESCRIPCION']."</option>";
                                                        else
                                                echo "<option value=\"".$reg2['ID_TIPO_PERSONA']."\">".$reg2['DESCRIPCION']."</option>";
                                            }
                                       ?>
                                      </option>
                                    </select>
              </div>
              <div class="col-md-2"><label>Tipo de Sexo:</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_TIPO_SEXO">
                                      <option>
                                        <?php
                                           $registro=mysql_query("select * from tipo_sexo;",$conexion) or die(mysql_error($conexion));
                                                  
                                          $buscar = mysql_query ("Select * from persona join tipo_sexo on RELA_TIPO_SEXO = ID_TIPO_SEXO where ID_TIPO_SEXO = ID_TIPO_SEXO;") or 
                                          die (mysql_error ($conexion));
                                          mysql_select_db ("softec",$conexion) or 
                                          die ("Problemas en la seleccion de base de datos");
                                          //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                          $row = mysql_fetch_array($buscar);
                                          while($reg3=mysql_fetch_array($registro))
                                          {
                                           if ($row['RELA_TIPO_SEXO']==$reg3['ID_TIPO_SEXO'])
                                                 echo "<option value=\"".$row['ID_TIPO_SEXO']."\" selected>".$row['TIPO_SEXO_DESC']."</option>";
                                                      else
                                              echo "<option value=\"".$reg3['ID_TIPO_SEXO']."\">".$reg3['TIPO_SEXO_DESC']."</option>";
                                          }
                                        ?>
                                      </option>
                                    </select>
              </div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>País:</label></div>
              <div class="col-md-2"><select class="form-control" id="paises" name="paises" value="<?php echo $reg['RELA_PAIS']; ?>">
                                      <option>
                                        <?php 
                                          $registro=mysql_query("select * from paises;",$conexion) or die(mysql_error($conexion));
                                                  
                                          $buscar = mysql_query ("select * from persona join paises on RELA_PAIS = id where id = id") or 
                                          die (mysql_error ($conexion));
                                          mysql_select_db ("softec",$conexion) or 
                                          die ("Problemas en la seleccion de base de datos");
                                          //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                          $row = mysql_fetch_array($buscar);
                                          while($reg4=mysql_fetch_array($registro))
                                          {
                                           if ($row['RELA_PAIS']==$reg4['id'])
                                                 echo "<option value=\"".$row['id']."\" selected>".$row['nombre']."</option>";
                                                      else
                                              echo "<option value=\"".$reg4['id']."\">".$reg4['nombre']."</option>";
                                          }  
                                        ?>
                                      </option>
                                    </select>
              </div>
              <div class="col-md-2"><label>Provincia:</label></div>
              <div class="col-md-2"><select class="form-control" id="provincias" name="provincias" value="<?php echo $reg['RELA_PROVINCIA']; ?>">
                                      <option>
                                        <?php 
                                          $registro=mysql_query("select * from provincias;",$conexion) or die(mysql_error($conexion));
                                                  
                                          $buscar = mysql_query ("select * from persona join provincias on RELA_PROVINCIA = id where id = id") or 
                                          die (mysql_error ($conexion));
                                          mysql_select_db ("softec",$conexion) or 
                                          die ("Problemas en la seleccion de base de datos");
                                          //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                          $row = mysql_fetch_array($buscar);
                                          while($reg5=mysql_fetch_array($registro))
                                          {
                                           if ($row['RELA_PROVINCIA']==$reg5['id'])
                                                 echo "<option value=\"".$row['id']."\" selected>".$row['nombre']."</option>";
                                                      else
                                              echo "<option value=\"".$reg5['id']."\">".$reg5['nombre']."</option>";
                                          }  
                                        ?> 
                                      </option>
                                    </select>
              </div>
            </div>

            <br>

            <h4 align="center">Datos de Contacto</h4>
            <div class="row" align="center">
              <div class="col-md-3"><label>Teléfono:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_TEL" class="form-control" value="<?php echo $reg['PERSONA_TEL'] ?>"></div>
              <div class="col-md-2"><label>Celular:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_CEL" class="form-control" value="<?php echo $reg['PERSONA_CEL'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>Fax:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_FAX" class="form-control" value="<?php echo $reg['PERSONA_FAX'] ?>"></div>
              <div class="col-md-2"><label>Correo:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_CORREO" class="form-control" value="<?php echo $reg['PERSONA_CORREO'] ?>"></div>
            </div>

            <br>

            <h4 align="center">Domicilio</h4>
            <div class="row" align="center">
              <div class="col-md-3"><label>Calle:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_CALLE" class="form-control" value="<?php echo $reg['PERSONA_CALLE'] ?>"></div>
              <div class="col-md-2"><label>Número:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_NUMERO" class="form-control" value="<?php echo $reg['PERSONA_NUMERO'] ?>"></div>
            </div>

            <br>
            
            <div class="row" align="center">
              <div class="col-md-3"><label>Casa:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_CASA" class="form-control" value="<?php echo $reg['PERSONA_CASA'] ?>"></div>
              <div class="col-md-2"><label>Manzana:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_MANZANA" class="form-control" value="<?php echo $reg['PERSONA_MANZANA'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>Sector:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_SECTOR" class="form-control" value="<?php echo $reg['PERSONA_SECTOR'] ?>"></div>
              <div class="col-md-2"><label>Piso:</label></div>
              <div class="col-md-2"><input type="" name="PEROSNA_PISO" class="form-control" value="<?php echo $reg['PEROSNA_PISO'] ?>"></div>
            </div>

            <br>

            <div class="row" align="center">
              <div class="col-md-3"><label>Cód. Postal:</label></div>
              <div class="col-md-2"><input type="" name="PERSONA_CP" class="form-control" value="<?php echo $reg['PERSONA_CP'] ?>"></div>
              <div class="col-md-2"><label>Barrio:</label></div>
              <div class="col-md-2"><select class="form-control" name="RELA_BARRIO" value="<?php echo $reg['RELA_BARRIO']; ?>">

                                      <?php
                                         $registro=mysql_query("SELECT * from barrio;") or die(mysql_error($conexion));
                                                  
                                          $buscar = mysql_query ("SELECT * from barrio join persona on RELA_BARRIO = ID_BARRIO where ID_BARRIO = ID_BARRIO;") or 
                                          die (mysql_error ($conexion));
                                          mysql_select_db ("softec",$conexion) or 
                                          die ("Problemas en la seleccion de base de datos");
                                          //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                          $row = mysql_fetch_array($buscar);
                                          while($reg6=mysql_fetch_array($registro))
                                          {
                                           if ($row['RELA_BARRIO']==$reg6['ID_BARRIO'])
                                                 echo "<option value=\"".$row['ID_BARRIO']."\" selected>".$row['BARRIO_DESC']."</option>";
                                                      else
                                              echo "<option value=\"".$reg6['ID_BARRIO']."\">".$reg6['BARRIO_DESC']."</option>";
                                          }
                                        ?>>
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
                <input type="hidden" name="ID_PERSONA" value="<?php echo $_GET['id']; ?>">
            </div>
</form>
  
<?php
    }      
    else
      echo 'No existe el Registro';
    
    mysql_close($conexion);

  ?> 

    <script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
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