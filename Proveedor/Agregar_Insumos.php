<?php

	include '../conexion.php';

	$boton = $_POST['boton'];
	if ($boton === "consultar") {
		$buscar = mysql_query("SELECT ID_INSUMO_PRO, DESCRIPCION_INSUMO_PRO FROM tipo_insumo_prov;",$conexion) or die("Error en la consulta SQL");
		$opciones = "<option value=''>Seleccione Insumo</option>";
		while ($row = mysql_fetch_array ($buscar))
          {
          $opciones .="<option value='".$row["ID_INSUMO_PRO"]."'>".$row["DESCRIPCION_INSUMO_PRO"]."</option>";
          }
          echo $opciones; 

	}

	if ($boton === "registrar") {
		$insumos = $_POST["insumos"];
		$cantidad = $_POST["cantidad"];
		$precio = $_POST["precio"];
		$sql = "INSERT INTO tipo_insumo_prov VALUES (0,'$insumos','$cantidad','$precio')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Insumo ".$insumos. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}

?>