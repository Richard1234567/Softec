<?php
/*-----------------------
Autor: Obed Alvarado
http://www.obedalvarado.pw
Fecha: 27-02-2016
Version de PHP: 5.6.3
----------------------------*/
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'softec');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['fecha'])){
			$errors[] = "Fecha vacío";
		} else if (empty($_POST['apellido'])){
			$errors[] = "Apellido vacío";
		} else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['dni'])){
			$errors[] = "DNI vacío";
		} else if (empty($_POST['correo'])){
			$errors[] = "Correo vacío";
		} else if (empty($_POST['telefono'])){
			$errors[] = "Telefono vacío";
		} else if (empty($_POST['celular'])){
			$errors[] = "Celular vacío";
		} else if (empty($_POST['usuario'])){
			$errors[] = "Usuario vacío";
		} else if (empty($_POST['contraseña'])){
			$errors[] = "Contraseña vacío";
		} else if (empty($_POST['perfil'])){
			$errors[] = "Perfil vacío";
		}  
			else if (
				!empty($_POST['fecha']) && 
				!empty($_POST['apellido']) &&
				!empty($_POST['nombre']) &&
				!empty($_POST['dni']) &&
				!empty($_POST['correo']) &&
				!empty($_POST['telefono']) &&
				!empty($_POST['celular']) &&
				!empty($_POST['usuario']) &&
				!empty($_POST['contraseña']) &&
				!empty($_POST['perfil'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
		$apellido=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$dni=mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$celular=mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));
		$usuario=mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));
		$contraseña=mysqli_real_escape_string($con,(strip_tags($_POST["contraseña"],ENT_QUOTES)));
		$perfil=mysqli_real_escape_string($con,(strip_tags($_POST["perfil"],ENT_QUOTES)));
		$id=mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));
		$sql="UPDATE operador SET  FECHA_ALTA='".$fecha."', APELLIDO_OPERADOR='".$apellido."',
		NOMBRE_OPERADOR='".$nombre."', DNI_OPERADOR='".$dni."', CORREO_OPERADOR='".$correo."', US_NOMBRE='".$usuario."', US_PASSWORD='".$contraseña."', CLAVEPERMISO='".$perfil."', OPERDOR_TEL='".$telefono."', OPERADOR_CEL='".$celular."'	WHERE id='".$id."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>	