<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_INS_MODELO, INS_MODELO_DESC from insumo_modelo;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione un Modelo</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_INS_MODELO"]."'>".$row["INS_MODELO_DESC"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$modelos = $_POST["modelos"];
		$sql = "INSERT INTO insumo_modelo VALUES (0,'$modelos')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Modelo ".$modelos. " ha sido agregado.!");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>			