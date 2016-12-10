<?php 

	include '../conexion.php'; 
	$boton = $_POST["boton"];
	if ($boton === "consultar") {

        $buscar = mysql_query ("select ID_COMPROBANTE, COMPROBANTE from tipo_comprobante;",
                  $conexion)
        or die ("Error en la consulta de SQl");
        $opciones = "<option value=''>Seleccione Tipo..</option>";
        while ($row = mysql_fetch_array ($buscar))
        {
        $opciones .="<option value='".$row["ID_COMPROBANTE"]."'>".$row["COMPROBANTE"]."</option>";
        }
        echo $opciones;          
	}
	if ($boton === "registrar") {
		$tipo = $_POST["tipo"];
		$sql = "INSERT INTO tipo_comprobante VALUES (0,'$tipo')";

		$result = mysql_query($sql);

		if($result)
		{
		    echo("El Comprobante ".$tipo. " ha sido agregado");
		} 
		else
		{
		   echo("Hubo algun error");
		}
	}
?>