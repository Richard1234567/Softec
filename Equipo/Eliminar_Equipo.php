<?php
include('../conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM equipo WHERE ID_EQUIPO = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM equipo JOIN persona ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO ORDER BY ID_EQUIPO ASC");

?>

<!--CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX -->

<div id='resultados'> 
      <div id="agrega-registros">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
          <tr class="table-info" align="center">
            <td class="td">#</td>
            <td class="td">Fec. Alta</td>
            <td class="td">Serie</td>
            <td class="td">Marca</td>
            <td class="td">Modelo</td>
            <td class="td">Apellido/s</td>
            <td class="td">Nombre/s</td>
            <td class="td">DNI</td>
            <td class="td">Opciones</td>
          </tr> 
            <?php 
              while ($row = mysql_fetch_array ($resultado)) {
            ?> 
          <tr style="background: #fff;" align="center">
            <td class="td"><?php echo $row['ID_EQUIPO'] ?></td>
            <td class="td"><?php echo $row['FECHA_ALTA'] ?></td>
            <td class="td"><?php echo $row['EQUIPO_SERIE'] ?></td>
            <td class="td"><?php echo $row['MARCA_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $row['MODELO_DESCRIPCION'] ?></td>
            <td class="td"><?php echo $row['PERSONA_APELLIDO'] ?></td>
            <td class="td"><?php echo $row['PERSONA_NOMBRE'] ?></td>
            <td class="td"><?php echo $row['PERSONA_DNI'] ?></td>
            <td>
            <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<?php echo $row['ID_PERSONA'] ?>"><button  class="btn" style="background: #F9C246; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                          </span></button>
            </a> 
            <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<?php echo $row['ID_PERSONA'] ?>"><button  class="btn" style="background: #ccc 93.5%; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-signal" aria-hidden="true">
                                        </span></button>
            </a>  
            <button  class="btn" style="background: #58ACFA; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;" data-toggle="modal" data-target="#myModal" onclick="consultas(<?php echo $row['ID_PERSONA']?>);><span class="glyphicon glyphicon-print" aria-hidden="true">
                                        </span></button>               
            <a href="javascript:eliminarequipo(<?php echo $row['ID_EQUIPO']?>);"><button  class="btn" style="background: #FA5858; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
            </a>
            </td>
          </tr>
          <?php         
            }
          ?> 
        </TABLE>       
      </div>
    </div>