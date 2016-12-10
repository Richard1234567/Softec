<html>
	<head>
		<meta charset="UTF-8">
		<title>Informe de Equipo</title>
	</head>
		<body>
			<div id = "muestra">
				<?php 

					include '../conexion.php';
					$registro = mysql_query("select * from equipo join persona on RELA_PERSONA = ID_PERSONA join diagnostico on RELA_EQUIPO = ID_EQUIPO
					join falla on RELA_FALLA = ID_FALLA join precio on RELA_PRECIO = ID_PRECIO;") or
					(mysql_error($conexion));

					echo '<h1 align="center">Informe de Diagnostico</h1>';
					echo '<table border="1" align="center">';
					echo '<tr align="center">';
					echo '<td><label>Cód. Equipo</label>';
					echo '<td><label>Apellido</label>';
					echo '<td><label>Nombre</label>';
					echo '<td><label>DNI</label>';
					echo '<td><label>Diagnostico</label>';
					echo '<td><label>Total</label>';
					echo '</td>';
					echo '</tr>';
					while ($reg = mysql_fetch_array($registro))
	 				{
	 					echo '<tr align="center">';
	 					echo '<td>';
	 					echo $reg ['COD_EQUIPOS'];
	 					echo '</td>';
	 					echo '<td>';
	 					echo $reg ['PERSONA_APELLIDO'];
	 					echo '</td>';
	 					echo '<td>';
	 					echo $reg ['PERSONA_NOMBRE'];
	 					echo '</td>';
	 					echo '<td>';
	 					echo $reg ['PERSONA_DNI'];
	 					echo '</td>';
	 					echo '<td>';
	 					echo $reg ['DIAGNOSTICO_DESC'];
	 					echo '</td>';
	 					echo '<td>';
	 					echo '<label>$</label>';
	 					echo $reg['PRECIO_TOTAL'];
	 					echo '</td>';
	 					echo '</tr>';
	 				}	
					echo '</table>';
				?>
				<br>
				<div align="center">
					<input type="button" value="Imprimir" value="Imprimir Reporte" 
					onclick="javascript:imprSelec('muestra');function imprSelec(muestra)
					{var ficha=document.getElementById(muestra);
					var ventimp=window.open(' ','popimpr');
					ventimp.document.write(ficha.innerHTML);
					ventimp.document.close();
					ventimp.print();ventimp.close();};">

					<script type="text/javascript">
					function imprSelec(muestra)
					{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');
					ventimp.document.write(ficha.innerHTML);
					ventimp.document.close();ventimp.print();ventimp.close();}
					</script>
				</div>
			</div>
		</body>	
</html>