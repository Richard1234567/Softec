<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_TIPO_EQUIPO, TIPO_EQUIPO_DESC from tipo_equipo;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione un Tipo</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_TIPO_EQUIPO"]."'>".$row["TIPO_EQUIPO_DESC"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$equipo = $_POST["equipo"];
		$sql = "INSERT INTO tipo_equipo VALUES (0,'$equipo')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Tipo ".$equipo. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>		