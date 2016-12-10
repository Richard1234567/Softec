<?php
$conexion = new mysqli('localhost','root','','softec');

$id_category = $_POST['id_category'];
$opciones = '<option value="0"> Elige una Marca</option>';

$result = $conexion->query("select * from marca join categoria on  marca.id_categoria = categoria.ID_CATEGORIA where categoria.ID_CATEGORIA  = ".$id_category."");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $opciones .= '<option value="'.$row['ID_MARCA'].'">'.$row['MARCA_DESCRIPCION'].'</option>';
    }
}
echo $opciones;
?>