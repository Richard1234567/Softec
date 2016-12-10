<?php include '../conexion.php';

    $id = $_GET['id'];

    //var_dump($id);

    $sql = "SELECT * FROM insumo_proveedor JOIN proveedor ON insumo_proveedor.id_proveedor = proveedor.ID_PROVEEDOR WHERE proveedor.ID_PROVEEDOR  =  '".$id."'";

    $resultado = mysql_query($sql);

  ?>

      <div class="table-responsive">
        <table class="table table-hover table-condensed">
        <tr  class="info" align="center">
          <td align="center"><strong>Fecha Compra</strong></td>
          <td align="center"><strong>Insumo por Proveedor</strong></td>
        </tr>
        <?php while ($row = mysql_fetch_assoc($resultado)) 
          {
            $fecha=date("d/m/Y", strtotime($row['FECH_ALTA']));
        ?>
        <tr align="center">
          <td><?php echo  $fecha;?></td>
          <td><?php echo  $row['insumos']?></td>
        </tr>
        <?php } ?>
        </table>
      </div>