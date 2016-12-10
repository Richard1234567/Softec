<?php

include '../conexion.php';

$ticket = $_POST['ticket'];

$resultado = mysql_query("SELECT * FROM detalle_ticket JOIN ticket ON detalle_ticket.numero_ticket = ticket.numero_ticket 
JOIN insumo ON detalle_ticket.id_producto = insumo.ID_INSUMO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA
JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO
JOIN operador ON ticket.id_vendedor = operador.id; ") or mysql_error(($conexion))
?>

<div id="fac">
    <div id="ticket">
        <table class="table table-bordered" style=" width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px;">
            <tr class="table-info" align="center">
                <td>#</td>
                <td>Fecha Venta</td>
                <td>Categoría Insumo</td>
                <td>Marca Insumo</td>
                <td>Modelo Insumo</td>
                <td>Cantidad Vendida</td>
                <td>Total Venta</td>
                <td>Vendedor</td>
            </tr>
            <?
                while($row = mysql_fetch_array($resultado))
                {
                    $fecha=date("d/m/Y", strtotime($row['fecha_ticket']));
                    $total_venta=$row['total_venta'];
            ?>
            <tr style="background: #fff;" align="center">
                <td><?php echo $row['id_ticket'] ?></td>
                <td><?php echo $fecha ?></td>
                <td><?php echo $row['CATEGORIA_DESCRIPCION'] ?></td>
                <td><?php echo $row['MARCA_INS_DESC'] ?></td>
                <td><?php echo $row['INS_MODELO_DESC'] ?></td>
                <td><?php echo $row['cantidad'] ?></td>
                <td><?php echo "$" .number_format ($total_venta,2);  ?></td>
                <td><?php echo $row['US_NOMBRE'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script src="jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script type="text/javascript" src="js/busca_fecha_ticket.js"></script>
<script type="text/javascript" src="js/imprimir_r_ticket.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //variavel que recebe os checkbox
    var check = $(".categoria input:checkbox");
    var msg = $("#frases");
    //evento de change
    check.on("change", function(e) { //abertura da função on()
        //previne erros
        e.preventDefault();
 
        //função ajax()
        $.ajax({
            url : "processaDados.php",
            type : "POST",
            dataType : "html",
            data : $('.checks:checked').serialize()
        }).done(function(data) {
            msg.html(data);
        })
 
    });// finaliza a função on()
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //variavel que recebe os checkbox
    var fac = $(".facturas input:checkbox");
    var msg = $("#fac");
    //evento de change
    fac.on("change", function(e) { //abertura da função on()
        //previne erros
        e.preventDefault();
 
        //função ajax()
        $.ajax({
            url : "Facturacion.php",
            type : "POST",
            dataType : "html",
            data : $('.checks:checked').serialize()
        }).done(function(data) {
            msg.html(data);
        })
 
    });// finaliza a função on()
});
</script>