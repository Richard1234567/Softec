<?php 

	include '../conexion.php';
	//$c = new Buscador;
	//$c->Conectar();
	$q = $_GET['q'];
	


	$query = mysql_query("SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA join insumo_modelo on RELA_INS_MODELO = ID_INS_MODELO join categoria on RELA_CATEGORIA = ID_CATEGORIA WHERE CATEGORIA_DESCRIPCION LIKE '%$q%' or COD_INSUMO LIKE '%$q%'");
	if (mysql_num_rows($query)<=0){
?>		
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
		<tr class="table-info" align="center">
		<td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
		</tr>
		</table><br>
<?php		
	} else {
?>

            <form method="post">
            
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

                        while ( $reg = mysql_fetch_assoc($query)) 

                        {

                            echo'<tr style="background: #fff;" align="center">

                                <td hidden><input class="form-control" name="idalu[]" value="'.$reg['ID_INSUMO'].'" /></td>
                                 <td><input class="form-control" readonly name="idalu2['.$reg['ID_INSUMO'].']" value="'.$reg['ID_INSUMO'].'" /></td>
                                 <td><input class="form-control" readonly name="nom['.$reg['ID_INSUMO'].']" value="'.$reg['CATEGORIA_DESCRIPCION'].'" /></td>
                                 <td><input class="form-control" readonly name="nom['.$reg['ID_INSUMO'].']" value="'.$reg['MARCA_INS_DESC'].'" /></td>
                                 <td><input class="form-control" readonly name="nom['.$reg['ID_INSUMO'].']" value="'.$reg['INS_MODELO_DESC'].'" /></td>
                                 <td><input class="form-control" name="carr['.$reg['ID_INSUMO'].']" value="'.$reg['INSUMO_PRECIO'].'" /></td>
                                 <td><input class="form-control" name="gru['.$reg['ID_INSUMO'].']" value="'.$reg['grupo'].'"/></td>
                                 </tr>';
                        }
                    
                        ?>
                       <!-- <td><input name="gru['.$registroAlumnos['id_alumno'].']" value="'.$registroAlumnos['grupo'].'"/></td> --> 
                    </table><br>
                    <?php 
                }
                ?>
                     
            <input type="submit" name="actualizar" value="Actualizar Registros" style="margin: 0 0 0 1160px;" class="btn btn-info col-md-offset-9" />
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
                    echo "Actualizo Correctamente! <a href='Buscar_Insumos_Por.php'>REFRESCAR GRILLA</a>";
                }

                else
                {
                    echo "NO Actualizo!";
                }
            }

        ?>
