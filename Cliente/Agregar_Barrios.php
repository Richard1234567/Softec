<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_BARRIO, BARRIO_DESC from barrio;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione Barrio</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_BARRIO"]."'>".$row["BARRIO_DESC"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$barrio = $_POST["barrio"];
		$sql = "INSERT INTO barrio VALUES (0,'$barrio')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El barrio ".$barrio. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>