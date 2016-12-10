<?php
$conexion = new mysqli('localhost','root','','softec');

$id_marca = $_POST['id_marca'];
$opciones = '<option value="0"> Elige un Modelo</option>';

$result = $conexion->query("select * from modelo join marca on  modelo.id_marca = marca.ID_MARCA where marca.ID_MARCA ".$id_marca."");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $opciones .= '<option value="'.$row['ID_MODELO'].'">'.$row['MODELO_DESCRIPCION'].'</option>';
    }
}
echo $opciones;
?>