<?php

include '../conexion.php';

 
  
$checkbox = $_POST['checkbox'];

 
foreach($checkbox as $color){
    $valor = "".$color."";
    $colores_aux[] = $valor;
}



$valores = implode(', ', $colores_aux);



$sql_valores = "('" .$valores. "')";
 
$sql_insert = "INSERT INTO TBL_COLORES (color) VALUES " . $sql_valores. ";";
echo $sql_insert

?>