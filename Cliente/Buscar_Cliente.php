<?php 

	include '../conexion.php';
	//$c = new Buscador;
	//$c->Conectar();
	$q = $_GET['q'];
	//echo $q;
	//exit();
			

	$query = mysql_query("SELECT * FROM persona WHERE PERSONA_APELLIDO LIKE '%$q%' OR PERSONA_DNI LIKE '%$q%' OR PERSONA_NOMBRE LIKE '%$q%'");
?>	
	<?php 
		if (mysql_num_rows($query)<=0){
	?>		
		<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
			<tr class="table-info" align="center">
				<td class="td">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
			</tr>
		</table>

	<?php	
		} else {
	?>		
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
				$c=1;	while ($row = mysql_fetch_assoc($query)) {
			?>		
			    <tr style="background: #fff;" align="center">
                  <td class="td"><?php echo $row['ID_PERSONA'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_FEC_ALTA'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_APELLIDO'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_NOMBRE'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_DNI'] ?></td>
                  <td class="td"><?php echo $row['PERSONA_CEL'] ?></td>
                  <td>
                    <a href="http://localhost/buscador/Cliente/Modificar_Cliente.php?id=<?php echo $row['ID_PERSONA']?>">
                    <button type="button" class="btn btn-warning">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                    </button>
                    <a href="http://localhost/buscador/Equipo/Formulario_Equipo_Adm.php?id=<? echo $row['ID_PERSONA']?>">
                    <button type="button" class="btn btn-default">
                      <span class="fa fa-desktop" aria-hidden="true"></span> Equipo
                    </button>
                    </a>                 
                    <a href="http://localhost/buscador/Cliente/Lista_Equipos.php?id=<? echo $row['ID_PERSONA']?>">
                    <button type="button" class="btn btn-info">
                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ver
                    </button>
                    </a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Ficha" onclick="consultas(<?php echo $row['ID_PERSONA']; ?>)">
                                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ficha
                     </button>
                    <!--a target="_blank" href="http://localhost/buscador/Imprimir/Reporte/Reporte_Cliente.php?id=<? //echo $row['ID_PERSONA']?>"><!--button  class="btn" style="background: #428bca; width: 90px; height: 30px; margin: 5 0 0 0px; font-family: Georgia; color:#fff;"><span class="glyphicon glyphicon-print" aria-hidden="true">
                                        </span></button>
                    </a-->                 
                    <a href="javascript:eliminarcliente(<?php echo $row['ID_PERSONA']?>);">
                      <button type="button" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar
                      </button>
                    </a>
                  </td>
                </tr>
			<?php	
			$c++; }
			?>
			</table>
			<?php 
				}
			?>
		</div>	