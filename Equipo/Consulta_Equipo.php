<?php 

    include '../conexion.php';

    $id = $_GET['id'];
    

    //var_dump($id);

    $registro = mysql_query(" SELECT * FROM diagnostico JOIN equipo ON RELA_EQUIPO = ID_EQUIPO JOIN marca ON RELA_MARCA = ID_MARCA 
                              JOIN modelo ON RELA_MODELO = ID_MODELO  
                              JOIN estado_equipo ON RELA_ESTADO = ID_ESTADO JOIN persona ON RELA_PERSONA = ID_PERSONA 
                              WHERE ID_PERSONA = '".$id."';") or (mysql_error($conexion));

?>    

<table class="table table-hover table-condensed">
  <tr class="info" align="center">
      <td >Fec. Alta</td>
      <td >Equipo Marca</td>
      <td >Equipo Modelo</td>
      <td >Diagnóstico</td>
      <td >Precio Total</td>
      <td >Estado Equipo</td>
  </tr>
    <?php 
        while ($reg = mysql_fetch_array($registro))
      {
        $fecha=date("d/m/Y", strtotime($reg['FECHA_DIAGNOSTICO']));
    ?>        
  <tr align="center">
      <td ><?php echo $fecha ?></td>
      <td ><?php echo $reg['MARCA_DESCRIPCION'] ?></td>
      <td ><?php echo $reg['MODELO_DESCRIPCION'] ?></td>
      <td ><?php echo $reg['DIAGNOSTICO_DESC'] ?></td>
      <td ><?php echo "$" .$reg['PRECIO_TOTAL'] ?></td>
      <td ><label class="label label-info"><?php echo $reg['ESTADO_DESCRIPCION'] ?></label></td>
  </tr>
    <?php     
        }
    ?>    
</table>
