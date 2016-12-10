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