<?php

	include '../conexion.php';

	$boton = $_POST['boton'];
	if ($boton === "consultar") {
		$buscar = mysql_query("SELECT ID_TIPO_SERVICIO, DESCRIPCION FROM tipo_servicio;",$conexion) or die("Error en la consulta SQL");
		$opciones = "<option value=''>Seleccione Servicio</option>";
		while ($row = mysql_fetch_array ($buscar))
          {
          $opciones .="<option value='".$row["ID_TIPO_SERVICIO"]."'>".$row["DESCRIPCION"]."</option>";
          }
          echo $opciones; 

	}

	if ($boton === "registrar") {
		$servicios = $_POST["servicios"];
		$sql = "INSERT INTO tipo_servicio VALUES (0,'$servicios')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Servicio ".$servicios. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}

?>