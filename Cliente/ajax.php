<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "softec";
 
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 
if($_POST['data'] == 'provincias') {
    $provincias = $db->query("SELECT * FROM provincias WHERE id_pais = " . $_POST['id_pais']);
    echo '<option value="0">Seleccione una provincia</option>';
    while($provincia = $provincias->fetch_object()) {
        echo '<option value="' . $provincia->id . '">' . $provincia->nombre . '</option>';
    }
} elseif($_POST['data'] == 'ciudades') {
    $ciudades = $db->query("SELECT * FROM ciudades WHERE id_provincia = " . $_POST['id_provincia']);
    echo '<option value="0">Seleccione una ciudad</option>';
    while($ciudad = $ciudades->fetch_object()) {
        echo '<option value="' . $ciudad->id . '">' . $ciudad->nombre . '</option>';
    }
}
?>