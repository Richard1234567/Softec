<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_MARCA, MARCA_DESCRIPCION from marca;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione Marca</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_MARCA"]."'>".$row["MARCA_DESCRIPCION"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$marca = $_POST["marca"];
		$sql = "INSERT INTO marca VALUES (0,'$marca')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("La Marca ".$marca. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>		