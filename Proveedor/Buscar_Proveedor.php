<?php 

	include '../conexion.php';
	//$c = new Buscador;
	//$c->Conectar();
	$q = $_GET['q'];
			

	$query = mysql_query("SELECT * FROM proveedor JOIN tipo_servicio ON RELA_TIPO_SERVICIO = ID_TIPO_SERVICIO WHERE NOMBRE_RAZON_SOCIAL LIKE '%$q%';");
	if (mysql_num_rows($query)<=0){
?>        
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
            </tr>
        </table>
<?php		
	} else {
?>        
	<div id='resultados'> 
    	<div id="agrega-registros">
	        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
	            <tr class="table-info" align="center">
	                <td class="td">#</td>
	                <td class="td">Fec. Alta</td>
	                <td class="td">Nombre R/S</td>
	                <td class="td">Cuit</td>
	                <td class="td">Teléfono</td>
	                <td class="td">E-mail</td>
	                <td class="td">Dirección</td>
	                <td class="td">Opciones</td>
	            </tr>  
    <?
	                while($row = mysql_fetch_array($query, MYSQL_ASSOC))
	                {
                        $fecha=date("d/m/Y", strtotime($row['FEC_ALTA']));
	                ?>    
	            <tr style="background: #fff;" align="center">
	                <td class="td"><?php echo $row['ID_PROVEEDOR'] ?></td>
	                <td class="td"><?php echo $fecha?></td>
	                <td class="td"><?php echo $row['NOMBRE_RAZON_SOCIAL'] ?></td>
	                <td class="td"><?php echo $row['PROVEEDOR_CUIT'] ?></td>
	                <td class="td"><?php echo $row['TELEFONO'] ?></td>
	                <td class="td"><?php echo $row['CORREO'] ?></td>
	                <td class="td"><?php echo $row['CALLE'] ?></td>
	                <td class="td">


                     <a href="http://localhost/buscador/Proveedor/Insumo_p.php?id=<? echo $row['ID_PROVEEDOR']?>">
                        <button type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Insumo
                        </button>
                     </a> 
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="consultas(<?php echo $row['ID_PROVEEDOR']; ?>)" >
                                  <span class="fa fa-users" aria-hidden="true"></span> Ficha
                     </button>
                      
                    </td>
	            </tr>     
	                <?         
	                } 
	                ?>
	        </table> 
        </div>  
    </div>
   <?php } ?> 