<?php 

	include 'cone.php';
	//$c = new Buscador;
	//$c->Conectar();
	$q = $_GET['q'];
			

	$query = mysql_query("SELECT * FROM falla JOIN precio ON RELA_PRECIO = ID_PRECIO WHERE FALLA_DESC LIKE '%$q%' LIMIT 3");
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
		<table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px; font-family: Times; font-size:18px;">
            <tr align="center" style="font-family: Times; font-size:18px;">
                <td style="font-family: Times; font-size:18px;">#</td>
                <td style="font-family: Times; font-size:18px;">Fallas Descripción</td>
                <td style="font-family: Times; font-size:18px;">Acción</td>
            </tr>
    <?php             
		$c=1;	while ($row = mysql_fetch_assoc($query)) {
	?>		
		 	<tr style="background: #fff;" align="center">
				<td class="td"> <? echo $c?></td>
				<td class="td"><? echo $row['FALLA_DESC']?></td>
				<td class="td"><input type="checkbox" name="colores[]" value="<? echo $row['FALLA_DESC']?>" /></td>
			</tr>
	<?				
		$c++; }
	?>	
		</table>
	<?	
	}
?>