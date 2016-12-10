<?php 
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "root", "")
        or die("No se pudo realizar la conexion");
        mysql_select_db("softec",$conex)
        or die("ERROR con la base de datos");

//Inicio de variables de sesión
if (!isset($_SESSION)) {
  session_start();
}

//Recibir los datos ingresados en el formulario
$usuario= $_REQUEST['US_NOMBRE'];
$contrasena= $_REQUEST['US_PASSWORD'];


 //Consultar si los datos son están guardados en la base de datos
$consulta= "SELECT * FROM operador WHERE US_NOMBRE='".$usuario."' AND US_PASSWORD='".$contrasena."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());

if($fila=mysql_fetch_array($resultado)){ 
             
            $role = $fila["CLAVEPERMISO"]; 
             
            switch($role){ 
                 
                case 'admin1':
                      $_SESSION['id'] = $fila['id'];
                      $_SESSION['US_NOMBRE'] = $fila['US_NOMBRE']; 
                      header('location: Menu_Administrador.php'); 
                   
                      break; 
                 
                case 'admin2': 
                    $_SESSION['id'] = $fila['id'];
                    $_SESSION['APELLIDO_OPERADOR'] = $fila['APELLIDO_OPERADOR'];
                    $_SESSION['NOMBRE_OPERADOR'] = $fila['NOMBRE_OPERADOR'];
                    $_SESSION['DNI_OPERADOR'] = $fila['DNI_OPERADOR'];
                    $_SESSION['CORREO_OPERADOR'] = $fila['CORREO_OPERADOR'];
                    $_SESSION['OPERDOR_TEL'] = $fila['OPERDOR_TEL'];
                    $_SESSION['OPERADOR_CEL'] = $fila['OPERADOR_CEL'];
                    $_SESSION['US_PASSWORD'] = $fila['US_PASSWORD'];
                    $_SESSION['US_NOMBRE'] = $fila['US_NOMBRE']; 
                    header('location: Menu_Ventas.php'); 
                    
                    break; 
                
                case 'admin3': 
                    $_SESSION['id'] = $fila['id'];
                    $_SESSION['APELLIDO_OPERADOR'] = $fila['APELLIDO_OPERADOR'];
                    $_SESSION['NOMBRE_OPERADOR'] = $fila['NOMBRE_OPERADOR'];
                    $_SESSION['DNI_OPERADOR'] = $fila['DNI_OPERADOR'];
                    $_SESSION['CORREO_OPERADOR'] = $fila['CORREO_OPERADOR'];
                    $_SESSION['OPERDOR_TEL'] = $fila['OPERDOR_TEL'];
                    $_SESSION['OPERADOR_CEL'] = $fila['OPERADOR_CEL'];
                    $_SESSION['US_PASSWORD'] = $fila['US_PASSWORD'];
                    $_SESSION['US_NOMBRE'] = $fila['US_NOMBRE']; 
                    header('location: Menu_Tecnico.php'); 
                    
                    break;
                 
            } 
             
        }else{ 
            
            echo '<script>alert("LOS DATOS NO CONINCIDEN")</script> ';
            echo "<script>location.href='login.php'</script>";   
        }
mysql_close($conex);
?>