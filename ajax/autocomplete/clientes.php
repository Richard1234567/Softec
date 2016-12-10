<?php
if (isset($_GET['term'])){
include '../../conexion.php';
$return_arr = array();
/* If connection to database, run sql statement. */
//if ($con)
//{
	
	$fetch = mysql_query("SELECT * FROM persona where PERSONA_APELLIDO like '%" . mysql_real_escape_string(($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysql_fetch_array($fetch)) {
		$id_cliente=$row['ID_PERSONA'];
		$row_array['value'] = $row['PERSONA_APELLIDO'];
		$row_array['ID_PERSONA']=$id_cliente;
		$row_array['PERSONA_APELLIDO']=$row['PERSONA_APELLIDO'];
		$row_array['PERSONA_CEL']=$row['PERSONA_CEL'];
		$row_array['PERSONA_TEL']=$row['PERSONA_TEL'];
		$row_array['PERSONA_CUIT']=$row['PERSONA_CUIT'];
		$row_array['PERSONA_NOMBRE']=$row['PERSONA_NOMBRE'];
		array_push($return_arr,$row_array);
    }
	
//}

/* Free connection resources. */
//mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>