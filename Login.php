<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Acceso de Usuarios</title>
</head>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="ico/icono png softec.png">
<body>

<div class="container"><br>

<div align="center">
	<img src="img/LOGO SOFTEC.png" class="img-responsive"><br>
</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h4 align="center"><i class="fa fa-lock"></i> Por Favor Ingrese su Usuario y Contraseña</h4>
		</div>
			<div class="panel-body">
				<form method="post" action="script_acceso_usuario.php" >
					<h2 align="center">Bienvenid@s</h2>
						<div class="form-group">
							<label>Usuario</label>
							<input autofocus="" type="text" name="US_NOMBRE"  placeholder="Usuario" class="form-control"><br>
							<label>Contraseña</label>
							<input type="password" name="US_PASSWORD"  placeholder="Contraseña" class="form-control"><br>
						</div>
						<div class="row" align="center">
							<button class="btn btn-large btn-primary" type="submit">Iniciar</button>
	        				<button class="btn btn-large btn-primary" type="reset">cancelar</button>
						</div>
				</form>
			</div>
	</div>
</div>
	


</body>
</html>