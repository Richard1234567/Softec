<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_UNIDAD, UNIDAD_DESCRIPCION from unidad_medida;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione una Unidad</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_UNIDAD"]."'>".$row["UNIDAD_DESCRIPCION"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$unidad = $_POST["unidad"];
		$sql = "INSERT INTO unidad_medida VALUES (0,'$unidad')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("La Unidad ".$unidad. " ha sido agregado.!");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>			