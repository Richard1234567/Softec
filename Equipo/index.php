<?php
	
	require('conexion.php');
	
	$sql = "SELECT * FROM customer";
	$result=$mysqli->query($sql);
	
?>
<html>
	<head>
		
		<script type="text/javascript" language="javascript" src="js/jquery.js">
		</script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js">
		</script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js">
		</script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js">
		</script>
		
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/dataTables.bootstrap.min.css">
		
		<script>
			$(document).ready(function() {
				$('#example').DataTable({
					"order": [[ 1, "asc" ]],
					"language": {
								"sProcessing":     "Procesando...",
								"sLengthMenu":     "Mostrar _MENU_ registros",
								"sZeroRecords":    "No se encontraron resultados",
								"sEmptyTable":     "NingÃºn dato disponible en esta tabla",
								"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
								"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
								"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
								"sInfoPostFix":    "",
								"sSearch":         "Buscar:",
								"sUrl":            "",
								"sInfoThousands":  ",",
								"sLoadingRecords": "Cargando...",
								"oPaginate": {
									"sFirst":    "Primero",
									"sLast":     "Ãšltimo",
									"sNext":     "Siguiente",
									"sPrevious": "Anterior"
								},
								"oAria": {
									"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
									"sSortDescending": ": Activar para ordenar la columna de manera descendente"
								},
					}
				});
			} );
			
		</script>
		
	</head>
	
	<body>
		<br>
		<div class="container-fluid">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id</th>
						<th>nombre</th>
						<th>Apellido</th>
						<th>Correo Electronico</th>
						<th>Fecha Alta</th>
						<th>fecha Modificacion</th>
					</tr>
				</thead>
				
				<tbody>
					<?php while($row = $result->fetch_assoc()){  ?>
						<tr>
							<td><?php echo $row['customer_id']; ?></td>
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['create_date']; ?></td>
							<td><?php echo $row['last_update']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>	
	</body>
</html>	