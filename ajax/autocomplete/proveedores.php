<?php
if (isset($_GET['term'])){
include '../../conexion.php';
$return_arr = array();
/* If connection to database, run sql statement. */
//if ($con)
//{
	
	$fetch = mysql_query("SELECT * FROM proveedor where NOMBRE_RAZON_SOCIAL like '%" . mysql_real_escape_string(($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysql_fetch_array($fetch)) {
		$id_cliente=$row['ID_PROVEEDOR'];
		$row_array['value'] = $row['NOMBRE_RAZON_SOCIAL'];
		$row_array['ID_PROVEEDOR']=$id_cliente;
		$row_array['NOMBRE_RAZON_SOCIAL']=$row['NOMBRE_RAZON_SOCIAL'];
		$row_array['PROVEEDOR_CUIT']=$row['PROVEEDOR_CUIT'];
		$row_array['CALLE']=$row['CALLE'];
		$row_array['NUMERO']=$row['NUMERO'];
		//$row_array['PERSONA_NOMBRE']=$row['PERSONA_NOMBRE'];
		array_push($return_arr,$row_array);
    }
	
//}

/* Free connection resources. */
//mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>