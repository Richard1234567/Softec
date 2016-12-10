<!DOCTYPE html>
<html>
<head>
	<title>Enviar Formulario por AJAX</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#btn_enviar").click(function(){
				var url="dame_datos.php";
				$.ajax({
					type: "POST",
					url: url,
					data: $("#formulario").serialize(),
					success: function(data)
					{
						$("#respuesta").html(data);
					}
				});
				return false;
			});
		});
	</script>
</head>
<body>
<br>
	<form method="post" id="formulario">
		<table>
			<tr>
			<td>Introduce un nombre:</td><td><input type="text" name="nombre" class="form-control"></td>
			<td>Introduce un color:</td><td><select name="color" class="form-control">
											<option>color</option>
											<option value="rojo">Rojo</option>
											<option value="verde">Verde</option>
											<option value="azul">Azul</option>
											</select>
			</td>
			<td></td><td><input type="button" id="btn_enviar" value="Buscar nombre"></td>
			</tr>
		</table>

	</form>

	<div id="respuesta"></div>

</body>
</html>