<meta charset="utf-8">
<?php

include '../conexion.php';

 
  
$checkbox = $_POST['checkbox']; // Devuelve un array que contiene los valores de los campos activos 

$suma = 0; 



if(count($checkbox) > 0){ // Me fijo si hay algun valor seleccionado, sino estaría el IF provocaría un warning del PHP 

foreach($checkbox as $valor){ // Recorre el array 
$chk = "".$valor."";
$chk1[] = $chk;
$suma += $valor; // Va sumando los valores 

} 
$valores1 = implode(', ', $chk1);
$sql_valores = "('" .$valores1. "')";
} 

$colores = $_POST['colores'];
$Equipo = $_POST['RELA_EQUIPO']; 
 foreach($colores as $color){
    $valor = "".$color."";
    $colores_aux[] = $valor;
}

$valores = implode(', ', $colores_aux);
$sql_valores = "('" .$valores. "','".$suma."','".$Equipo."')";
$sql_insert = "INSERT INTO diagnostico (DIAGNOSTICO_DESC,PRECIO_TOTAL,RELA_EQUIPO) VALUES " . $sql_valores. ";";
//echo $sql_insert;

$resultado = mysql_query($sql_insert);

		if (!$resultado) {
		    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
		    $mensaje .= 'Consulta completa: ' . $sql_insert;
		    die($mensaje);
		}
			
            mysql_close ($conexion);
            print "<meta http-equiv=Refresh content=\"2 ; url= informes.php\">"; 
            echo "El Diagnostico fue Guardado con éxito!.";

?>