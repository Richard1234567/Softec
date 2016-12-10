<?php include '../conexion.php';

    $id = $_GET['id'];

    //var_dump($id);

    $sql = "SELECT * FROM persona JOIN equipo ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO JOIN diagnostico ON RELA_EQUIPO = ID_EQUIPO WHERE ID_EQUIPO =  '".$id."'";

    $resultado = mysql_query($sql);

  ?>
    <?php 
      $sql_user=mysql_query("select * from persona where ID_PERSONA='".$id."'");
      $rw_user=mysql_fetch_array($sql_user);
      //echo $rw_user['PERSONA_APELLIDO']. ", " . $rw_user['PERSONA_NOMBRE'];
    ?>
    <h4>Cliente: <?php echo $rw_user['PERSONA_APELLIDO']. ", " . $rw_user['PERSONA_NOMBRE']; ?></h4>
      <div class="table-responsive">
        <table class="table table-hover table-condensed">
        <tr  class="info" align="center">
          <td align="center"><strong>Fecha Alta</strong></td>
          <td align="center"><strong>Equipo Marca</strong></td>
          <td align="center"><strong>Equipo Modelo</strong></td>
          <td align="center"><strong>Fecha Diagnóstico</strong></td>
          <td align="center"><strong>Diagnóstico</strong></td>
          <td align="center"><strong>Total Diagnóstico</strong></td>
        </tr>
        <?php while ($row = mysql_fetch_assoc($resultado)) 
          {
            $fecha=date("d/m/Y", strtotime($row['FECHA_ALTA']));
        ?>
        <tr align="center">
          <td><?php echo  $fecha?></td>
          <td><?php echo  $row['MARCA_DESCRIPCION']?></td>
          <td><?php echo  $row['MODELO_DESCRIPCION']?></td>
          <td><?php echo  $row['FECHA_DIAGNOSTICO']?></td>
          <td><?php echo  $row['DIAGNOSTICO_DESC']?></td>
          <td><?php echo  $row['PRECIO_TOTAL']?></td>
        </tr>
        <?php } ?>
        </table>
      </div>