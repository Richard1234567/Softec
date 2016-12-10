<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_INS_MARCA, MARCA_INS_DESC from insumo_marca;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione una Marca</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_INS_MARCA"]."'>".$row["MARCA_INS_DESC"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$marcas = $_POST["marcas"];
		$sql = "INSERT INTO insumo_marca VALUES (0,'$marcas')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("La Marca ".$marcas. " ha sido agregado.!");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>			