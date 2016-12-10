<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="softec";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
    die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$alumnos="SELECT * from insumo join categoria on RELA_CATEGORIA = ID_CATEGORIA join insumo_marca on RELA_INS_MARCA = ID_INS_MARCA 
join insumo_modelo on RELA_INS_MODELO = ID_INS_MODELO;";
$resAlumnos=$conexion->query($alumnos);
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link href="../bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="../ico/icono png softec.png">

</head>
<body>
<nav role="navigation" class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="Lista_Insumo.php" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li"><a href="../Cliente/Lista_Clientes.php">Clientes</a></li>
                <li class="li"><a href="../Equipo/Lista_Equipos.php">Equipos</a></li>
                <li class="li"><a href="../Proveedor/Lista_Proveedor.php">Proveedores</a></li>
                <li class="li"><a href="../Factura/Lista_Facturas.php">Facturación</a></li>
                <li class="li"><a href="../Insumos/Lista_Insumo.php">Insumos</a></li>
                <li class="li"><a href="../Compras/Lista_Compras.php">Compras</a></li>
                <li class="li"><a href="../Reporte/Lista_Reportes.php">Reportes</a></li>
                <li class="li"><a href="../Operadores/Operador_Ventas.php">Actualizar Datos</a></li>
                <li class="li"><a href="../Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>

<h3 align="center">LISTA DE PRODUCTOS</h3>
<br>
<h4 align="center">Filtrar Por Fechas</h4> <br>
<form action="Lista_Insumo.php">

    <table border="0" align="center">
    <tr align="center">
      <td><strong>Fecha  Desde: &nbsp;</strong></td>
      <td><input name="fecha" type = "date" id="bd-desde" class="form-control"></td>
      <td><strong>&nbsp;Fecha  Hasta: &nbsp;</strong></td>  
      <td> <input name="fecha2" type = "date" id="bd-hasta" class="form-control"></td>
      <td>&nbsp;<button class="btn btn-info">Filtrar</button></td>
    </tr>
  </table>
</form>

<div style="width: 97%; height: 31px; background: #EEEBEB; margin: 40 0 0 20px;">
      <!--<button class="button1">Borrar</button>-->
      <input type="" placeholder="Buscar Producto" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1075px; width: 220px; height: 30px;">
</div><br>

<body>
        <section>
            <form method="post">
            <div id='resultados'>
                <div id="agrega-registros">
                    <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">

                        <tr class="table-info" align="center">
                            <td class="td">Id_Producto</td>
                            <td class="td">Categoría</td>
                            <td class="td">Marca</td>
                            <td class="td">Modelo</td>
                            <td class="td">Precio</td>
                            <td class="td">Ingresar Porcentaje (Ej: 0.10) </td>
                        </tr>

                        <?php

                        while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))

                        {

                            echo'<tr style="background: #fff;" align="center">

                                <td hidden><input class="form-control" name="idalu[]" value="'.$registroAlumnos['ID_INSUMO'].'" /></td>
                                 <td><input class="form-control" readonly name="idalu2['.$registroAlumnos['ID_INSUMO'].']" value="'.$registroAlumnos['ID_INSUMO'].'" /></td>
                                 <td><input class="form-control" readonly name="nom['.$registroAlumnos['ID_INSUMO'].']" value="'.$registroAlumnos['CATEGORIA_DESCRIPCION'].'" /></td>
                                 <td><input class="form-control" readonly name="nom['.$registroAlumnos['ID_INSUMO'].']" value="'.$registroAlumnos['MARCA_INS_DESC'].'" /></td>
                                 <td><input class="form-control" readonly name="nom['.$registroAlumnos['ID_INSUMO'].']" value="'.$registroAlumnos['INS_MODELO_DESC'].'" /></td>
                                 <td><input class="form-control" name="carr['.$registroAlumnos['ID_INSUMO'].']" value="'.$registroAlumnos['INSUMO_PRECIO'].'" /></td>
                                 <td><input class="form-control" name="gru['.$registroAlumnos['ID_INSUMO'].']" value="'.$registroAlumnos['grupo'].'"/></td>
                                 </tr>';
                        }
                    
                        ?>
                       <!-- <td><input name="gru['.$registroAlumnos['id_alumno'].']" value="'.$registroAlumnos['grupo'].'"/></td> --> 
                    </table><br>
        
            <input type="submit" name="actualizar" value="Actualizar Registros" style="margin: 0 0 0 1160px;" class="btn btn-info col-md-offset-9" />
                            </div>
            </div><br>
        </form>

        <?php

            if(isset($_POST['actualizar']))
            {
                foreach ($_POST['idalu'] as $ids) 
                {
                    $editID=mysqli_real_escape_string($conexion, $_POST['idalu2'][$ids]);
                    $editNom=mysqli_real_escape_string($conexion, $_POST['nom'][$ids]);
                    $editCarr=mysqli_real_escape_string($conexion, $_POST['carr'][$ids]);
                    $editGru=mysqli_real_escape_string($conexion, $_POST['gru'][$ids]);
                    //$porcentaje=$_POST['porcentaje'];
                    //$porc1 = $editCarr * $porcentaje;
                    //$porc2 =  $porc1/ 100;
                    //$total = $editCarr + $porc2;
                    //$total = $editCarr * $editGru ;
                    ////////////////////////////////////////////////ACTUALIZO IMPORTES///////////////////////////////////////
                    if(isset($_POST['actualizar']))
            {
                    $total = mysqli_real_escape_string($conexion, $_POST['carr'][$ids]  + $_POST['carr'][$ids] * $_POST['gru'][$ids]  );
                    //$editCarr = mysqli_real_escape_string($conexion, $_POST['carr'][$ids] + $total );
                    //var_dump ($total);

                    $actualizar=$conexion->query("UPDATE insumo SET ID_INSUMO='$editID',  INSUMO_PRECIO='$total',
                                                                        grupo='$editGru' WHERE ID_INSUMO='$ids'");
                    
                    $actualizar1=$conexion->query("UPDATE insumo SET grupo= 0 WHERE ID_INSUMO='$ids'");
                                                                        
            }
            else
            {
                    $total = mysqli_real_escape_string($conexion, $_POST['carr'][$ids] * $_POST['gru'][$ids]  );
                    //$editCarr = mysqli_real_escape_string($conexion, $_POST['carr'][$ids] + $total );
                    var_dump ($total);
                    $actualizar=$conexion->query("UPDATE insumo SET ID_INSUMO='$editID',  INSUMO_PRECIO='$total',
                                                                        grupo='$editGru' WHERE ID_INSUMO='$ids'");
                    
                    $actualizar1=$conexion->query("UPDATE insumo SET grupo= 0 WHERE ID_INSUMO='$ids'");
                }
            
                }

                if($actualizar==true)
                {
                    echo "Actualizo Correctamente! <a href='actualizar_registros.php'>REFRESCAR GRILLA</a>";
                }

                else
                {
                    echo "NO Actualizo!";
                }
            }

        ?>



        </section>

        <footer>
        </footer>
    </body>
</html>
<script src="../js/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="../js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="js/busca_insumo_por.js"></script>
<script type="text/javascript" src="js/busca_fecha_por.js"></script>