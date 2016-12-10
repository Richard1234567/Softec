<?php
include('../conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if(isset($desde)==false){
  $desde = $hasta;
}

if(isset($hasta)==false){
  $hasta = $desde;
}

//echo $desde, $hasta;

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM persona WHERE PERSONA_FEC_ALTA BETWEEN '$desde' AND '$hasta';");
if (mysql_num_rows($registro)<=0){
?>    
    <table class="tabla table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
    <tr class="table-info" align="center">
    <td align="center" style="font-family: Times; font-size:18px;">No Existen Registros con esos datos! Por Favor realize una nueva Búsqueda.</td>
    </tr>
    </table><br>
<?php   
  } else {
?>  
<div id="agrega-registros">
	<table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
        <tr class="table-info" align="center">
            <td class="td">#</td>
            <td class="td">Fec. Alta</td>
            <td class="td">Apellido/s</td>
            <td class="td">Nombre/s</td>
            <td class="td">DNI</td>
            <td class="td">Consultar</td>
            <td class="td">Opciones</td>
        </tr>
    <?php 
        while ($reg = mysql_fetch_array($registro))
		  {
    ?>        
        <tr style="background: #fff;" align="center">
            <td class="td"><?php echo $reg['ID_PERSONA'] ?></td>
            <td class="td"><?php echo $reg['PERSONA_FEC_ALTA'] ?></td>
            <td class="td"><?php echo $reg['PERSONA_APELLIDO'] ?></td>
            <td class="td"><?php echo $reg['PERSONA_NOMBRE'] ?></td>
            <td class="td"><?php echo $reg['PERSONA_DNI'] ?></td>
            <td class="td">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="consultas(<?php echo $reg['ID_PERSONA'];?>)">
                  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                </button>
            <td>
            <a href="http://localhost/buscador/Equipo/Lista_Equi.php?id=<?php echo $reg['ID_PERSONA'] ?>">
                <button type="button" class="btn btn-warning">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ver
                </button>
            </a>
            <a href="http://localhost/buscador/Equipo/Lista_Equi_M.php?id=<?php echo $reg['ID_PERSONA'] ?>">
                <button type="button" class="btn btn-warning">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modificar
                </button>
            </a>                 
           </td>
        </tr>
    <?php     
        }
    }
    ?>    
</table>
</div>