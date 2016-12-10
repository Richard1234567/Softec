<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "softec";
 
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 
if($_POST['data'] == 'provincias') {
    $provincias = $db->query("SELECT * FROM modelo WHERE id_marca = " . $_POST['id_marca']);
    echo '<option value="0">Seleccione una provincia</option>';
    while($provincia = $provincias->fetch_object()) {
        echo '<option value="' . $provincia->id . '">' . $provincia->MODELO_DESCRIPCION . '</option>';
    }
} elseif($_POST['data'] == 'ciudades') {
    $ciudades = $db->query("SELECT * FROM ciudades WHERE id_provincia = " . $_POST['id_provincia']);
    echo '<option value="0">Seleccione una ciudad</option>';
    while($ciudad = $ciudades->fetch_object()) {
        echo '<option value="' . $ciudad->id . '">' . $ciudad->nombre . '</option>';
    }
}
?>