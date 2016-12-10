<?php
include('../conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM insumo WHERE ID_INSUMO = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA ORDER BY ID_INSUMO ASC");

?>
<div id='resultados'> 
            <div id="agrega-registros">

              <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
                <tr class="table-info" align="center">
                    <td class="td">#</td>
                    <td class="td">Fec. Alta</td>
                    <td class="td">Categoria</td>
                    <td class="td">Marca</td>
                    <td class="td">Modelo</td>
                    <td class="td">Precio</td>
                    <td class="td">Cantidad</td>
                    <td class="td">Estado</td>
                    <td class="td">Opciones</td>
                </tr>
              <?php    
                  while ( $reg = mysql_fetch_assoc($result)) {
                    $cantidad = $reg ['INSUMO_CANTIDAD'];
                    $cant_alta  = 100;
                    $cant_medio = 50;
                    $cant_baja  = 20;
                    $sin_stock  = 0;

                  if ($cantidad >= $cant_alta)
                  {
                    $mensaje = '<span class="label label-success">STOCK ALTO</span>';
                    //echo $mensaje;
                  }
                    elseif ($cantidad >= 51)
                  {
                      $mensaje = '<span class="label label-success">STOCK ALTO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= $cant_medio)
                  {
                      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= 21)
                  {
                      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= $cant_baja)
                  {
                      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= 1)
                  {
                      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
                      //echo $mensaje;
                  }
                    else
                  {
                      $mensaje = '<span class="label label-default">SIN STOCK</span>';
                      //echo $mensaje;
                }
              ?>
               
                  <tr style="background: #fff;" align="center">
                		<td class="td"><?php echo $reg['ID_INSUMO'] ?></td>
                    <td class="td"><?php echo $reg['FEC_ALTA'] ?></td>
                    <td class="td"><?php echo $reg['CATEGORIA_DESCRIPCION'] ?></td>
                    <td class="td"><?php echo $reg['MARCA_INS_DESC'] ?></td>
                    <td class="td"><?php echo $reg['INS_MODELO_DESC'] ?></td>
                    <td class="td">$<?php echo $reg['INSUMO_PRECIO'] ?></td>
                    <td class="td"><?php echo $reg['INSUMO_CANTIDAD'] ?></td>
                    <td class="td"><?php echo $mensaje ?></td>
                    <td>
                    <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<?php echo $reg['ID_INSUMO']?>"><button  class="btn" style="background: #F9C246; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                        </span></button></a> 
                    <a href="http://localhost/buscador/Equipo/Formulario_Equipo_Adm.php?id=<?php echo $reg['ID_INSUMO']?>"><button  class="btn" style="background: #ccc 93.5%; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-signal" aria-hidden="true">
                                        </span></button></a>                 
                    <a href="http://localhost/buscador/Cliente/Lista_Equipos.php?id=<?php echo $reg['ID_INSUMO']?>"><button  class="btn" style="background: #58ACFA; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true">
                                        </span></button></a> 
                                        </span></button>
                    <a href=""><button  class="btn" style="background: #FA5858; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-trash" aria-hidden="true">
                                        </span></button></a></td>
                  </tr>
                  <?php } ?> 
              </TABLE>
            </div>
          </div>