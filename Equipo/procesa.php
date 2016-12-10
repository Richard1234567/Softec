<?php
if(isset($_POST["id_marca"]))
	{
		$opciones = '<option value="0"> Elige un modelo</option>';

		$conexion= new mysqli("localhost","root","","softec");
		$strConsulta = "select * from modelo join marca on modelo.id_marca = marca.ID_MARCA where marca.ID_MARCA  = ".$_POST["id_marca"];
		$result = $conexion->query($strConsulta);
		

		while( $fila = $result->fetch_array() )
		{
			$opciones.='<option value="'.$fila["ID_MODELO"].'">'.$fila["MODELO_DESCRIPCION"].'</option>';
		}

		echo $opciones;
	}
?>
