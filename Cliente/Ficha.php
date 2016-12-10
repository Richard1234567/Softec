<?php include '../conexion.php';

    $id = $_GET['id'];
    //$apellido = $_GET['apellido'];
    //var_dump($apellido);

    //var_dump($id);

    $sql = "SELECT * FROM persona JOIN equipo ON RELA_PERSONA = ID_PERSONA JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO JOIN facturas ON facturas.ID_PERSONA = persona.ID_PERSONA JOIN detalle_factura ON detalle_factura.numero_factura = facturas.numero_factura
JOIN presupuesto ON presupuesto.ID_PRESUPUESTO = persona.ID_PERSONA JOIN detalle_presupuesto ON detalle_presupuesto.numero_presupuesto = presupuesto.NUMERO_PRESUPUESTO
JOIN diagnostico ON RELA_EQUIPO = ID_EQUIPO JOIN insumo ON detalle_factura.id_producto = insumo.ID_INSUMO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA 
 WHERE persona.ID_PERSONA =  '".$id."'";

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
          <td align="center"><strong>Fecha Compra</strong></td>
          <td align="center"><strong>Insumo Comprado</strong></td>
          <td align="center"><strong>Cantidad Insumo</strong></td>
          <td align="center"><strong>Total Compra</strong></td>
          <td align="center"><strong>Fecha Presupuesto</strong></td>
          <td align="center"><strong>Artículo Presupuesto</strong></td>
        </tr>
        <?php while ($row = mysql_fetch_assoc($resultado)) 
          {
            $fecha=date("d/m/Y", strtotime($row['PERSONA_FEC_ALTA']));
            $fecha_p=date("d/m/Y", strtotime($row['FECHA_PRESUPUESTO']));
            $fecha_f=date("d/m/Y", strtotime($row['fecha_factura']));
            $precio_venta=$row['total_venta'];
            $precio_venta_f=number_format($precio_venta,2);//Formateo variables
            $precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
        ?>
        <tr align="center">
          <td><?php echo  $fecha?></td>
          <td><?php echo  $fecha_f?></td>
          <td><?php echo  $row['CATEGORIA_DESCRIPCION']?></td>
          <td><?php echo  $row['cantidad']?></td>
          <td><?php echo "$ "  .$precio_venta_r?></td>
          <td><?php echo  $fecha_p?></td>
          <td><?php echo  $row['CATEGORIA_DESCRIPCION']?></td>
        </tr>
        <?php } ?>
        </table>
      </div>