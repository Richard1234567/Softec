<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_MODELO, MODELO_DESCRIPCION from modelo;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione Modelo</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_MODELO"]."'>".$row["MODELO_DESCRIPCION"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$modelo = $_POST["modelo"];
		$sql = "INSERT INTO modelo VALUES (0,'$modelo')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Modelo ".$modelo. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>		