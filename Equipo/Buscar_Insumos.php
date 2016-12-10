<?php
include('../conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
  $desde = $hasta;
}

if(isset($hasta)==false){
  $hasta = $desde;
}

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA WHERE FEC_ALTA BETWEEN '$desde' AND '$hasta' ORDER BY ID_INSUMO ASC");
if (mysql_num_rows($registro)<=0){
?>    
    <table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
    <tr class="table-info" align="center">
    <td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
    </tr>
    </table><br>
<?php   
  } else {
?>    
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
                  while ( $reg = mysql_fetch_assoc($registro)) {
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
                      <a href="javascript:eliminarinsumo(<?php echo $reg['ID_INSUMO']?>);">
                        <button type="button" class="btn btn-danger">
                          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                        </button>
                      </a>
                    </td>
              </tr>
 <?php     
      }
    }
    ?>
              </TABLE>
            </div        