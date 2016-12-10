<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>Actualizar Precios</h2>

<div>
	<form action="alta.php" method="post">
		<table border="1">
			<tr>
				<td>#</td>
				<td>Fecha</td>
				<td>Ultimo P/Compra</td>
				<td>Insumo Categoria</td>
				<td>Insumo Marca</td>
				<td>Insumo Modelo</td>
				<td>Elejir</td>
				<td>% de Aumento</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><input type="checkbox" name="precio[]"></td>
				<td><input type="number" name=""></td>
			</tr>
		</table><br>
		<button>Enviar</button>
		<button>Cancelar</button>
	</form>	
</div>

</body>
</html>