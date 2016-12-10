<?php


	include '../conexion.php';
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_CATEGORIA, CATEGORIA_DESCRIPCION from categoria",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione Categoria</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_CATEGORIA"]."'>".$row["CATEGORIA_DESCRIPCION"]."</option>";
        }
        echo $opciones;          
	}

?>	