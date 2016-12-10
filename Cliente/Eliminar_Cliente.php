<?php
include('../conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM persona WHERE ID_PERSONA = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM persona ORDER BY ID_PERSONA ASC");

?>

<!--CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX -->

<div id='resultados'> 
    <div id="agrega-registros">
      <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
        <tr class="table-info" align="center">
            <td class="td">#</td>
            <td class="td">Fec. Alta</td>
            <td class="td">Apellido/s</td>
            <td class="td">Nombre/s</td>
            <td class="td">D.N.I.</td>
            <td class="td">Contacto</td>
            <td class="td">Opciones</td>
        </tr> 
<?php             
	while($row = mysql_fetch_array($registro)){
?>		
		<tr style="background: #fff;" align="center">
          	<td class="td"><?php echo $row['ID_PERSONA'] ?></td>
          	<td class="td"><?php echo $row['PERSONA_FEC_ALTA'] ?></td>
          	<td class="td"><?php echo $row['PERSONA_APELLIDO'] ?></td>
          	<td class="td"><?php echo $row['PERSONA_NOMBRE'] ?></td>
          	<td class="td"><?php echo $row['PERSONA_DNI'] ?></td>
          	<td class="td"><?php echo $row['PERSONA_CEL'] ?></td>
          	<td>
	          <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<? echo $row['ID_PERSONA']?>"><button  class="btn" style="background: #F9C246; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-pencil" aria-hidden="true">
	                                </span></button></a> 
	            <a href="http://localhost/buscador/Equipo/Formulario_Equipo_Adm.php?id=<? echo $row['ID_PERSONA']?>"><button  class="btn" style="background: #ccc 93.5%; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-signal" aria-hidden="true">
	                                </span></button></a>                 
	            <a href="http://localhost/buscador/Cliente/Lista_Equipos.php?id=<? echo $row['ID_PERSONA']?>"><button  class="btn" style="background: #58ACFA; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true">
	                                </span></button></a> 
	                                </span></button>
	            <a href="javascript:eliminarcliente(<?php echo $row['ID_PERSONA']?>);"><button  class="btn" style="background: #FA5858; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-trash" aria-hidden="true">
	                                </span></button>
	            </a>
            </td>
        </tr>
<?php 				
	}
?>	
</table>