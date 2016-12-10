<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_PRECIO, PRECIO_DESCRIPCION from precio;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione El Precio</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_PRECIO"]."'>".$row["PRECIO_DESCRIPCION"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$precio = $_POST["precio"];
		$sql = "INSERT INTO precio VALUES (0,'$precio')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Precio ".$precio. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>