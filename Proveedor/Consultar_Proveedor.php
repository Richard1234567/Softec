<?php 
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
 
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> <!--Llamamos al archivo CSS a través de CDN -->
  	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
  </head>
  <body>

<nav class="nav">
	<a href=""><img src="../img/hp.jpg" class="img"></a>
    <ul class="ul">
        <li class="li"><a href="Cliente/Lista_Cliente.php">Clientes</a></li>
        <li class="li"><a href="#">Equipos</a></li>
        <li class="li"><a href="#">Proveedores</a></li>
        <li class="li"><a href="#">Facturación</a></li>
        <li class="li"><a href="#">Insumos</a></li>
        <li class="li"><a href="#">Compras</a></li>
        <li class="li"><a href="#">Reportes</a></li>
        <li class="li"><a href="#">Calendario</a></li>
        <li class="li"><a href="#">Auditoria</a></li>
        <li class="li"><a href="#">Configuración</a></li>


    </ul>
</nav>

<h3 align="center">Consultar Proveedor</h3>
<br>
<br>
<div class="tabla">
    <?php 
                include '../conexion.php';
                $resultado = mysql_query("SELECT * FROM equipo") or mysql_error(($conexion));
                echo '<table class="table table-bordered">';
                echo '<tr class="table-info" align="center">';
                echo '<td><lable>Seleccionar para Borrar</label></td>';
                //echo '<td><lable>N°</label></td>';
                echo '<td><lable>Apellido/s</label></td>';
                echo '<td><lable>Nombre/s</label></td>';
                echo '<td><lable>DNI</label></td>';
                echo '<td><lable>Contacto</label></td>';
                echo '<td><lable>Acción</label></td>';
                echo '</tr>';
                    while ( $reg = mysql_fetch_array($resultado)) {
                        
                    echo '<tr align="center">';
                    echo '<td>';
                    echo '<input type="checkbox">';
                    echo '</td>';
                    //echo '<td>'.$numlista.'</td>';
                    echo '<td>';
                    echo $reg['PERSONA_APELLIDO'];
                    echo '</td>';
                    echo '<td>';
                    echo $reg['PERSONA_NOMBRE'];
                    echo '</td>';
                    echo '<td>';
                    echo $reg['PERSONA_DNI'];
                    echo '</td>';
                    echo '<td>';
                    echo $reg['PERSONA_TEL'];
                    echo '</td>';
                    echo '<td>';
                    echo '<a href = "http://localhost/buscador/Cliente/Modificar_Cliente.php?id='.$reg['ID_PERSONA'].'"><button class="btn-accion">Modificar</button></a>',
                        '<a href = "http://localhost/buscador/Equipo/Formulario_Equipo_Adm.php?id='.$reg['ID_PERSONA'].'"><button class="btn-accion">PC</button></a>',
                        '<a href = "http://localhost/buscador/Cliente/Consultar_Cliente.php?id='.$reg['ID_PERSONA'].'"><button class="btn-accion">Consultar</button></a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '<table>';
                echo  '<a href="Lista_Cliente.php">
                        <button class="regresar1"><img src="../Iconos PNG/Regresar.png" class="icon-user">Regresar</button>
                       </a>';
                echo '</table>';

            ?>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
  </body>
</html>  