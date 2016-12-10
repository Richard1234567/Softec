<?php

	include 'config.php';

	ob_start();

?>
<style type="text/css">
	.header {
		width:750px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		background: #ccc;
	}

	.tr {
		background: #ccc;
	}
</style>

<?php 
if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
?>

<?php 

//CONSULTA
$productos = mysql_query("SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA WHERE FEC_ALTA BETWEEN '$desde' AND '$hasta' ORDER BY ID_INSUMO ASC");

?>

<div class="header">
	<h3 align="center">Informe de Productos</h3>
</div><br>
<table align="center" border="1" WIDTH=200>
	<tr align="center" class="tr">
		<td WIDTH=70>#</td>
        <td WIDTH=80>Fec. Alta</td>
        <td WIDTH=100>Categoria</td>
        <td WIDTH=100>Marca</td>
        <td WIDTH=70>Modelo</td>
        <td WIDTH=70>Precio</td>
        <td WIDTH=60>Cantidad</td>
        <td WIDTH=100>Estado</td>
	</tr>
	<?php while($reg = mysql_fetch_array($productos)){
					$cantidad = $reg ['INSUMO_CANTIDAD'];
                    $cant_alta  = 100;
                    $cant_medio = 50;
                    $cant_baja  = 20;
                    $sin_stock  = 0;

                  if ($cantidad >= $cant_alta)
                  {
                    $mensaje = '<span class="label label-success">STOCK ALTO</span>';
                    //echo $mensaje;
                  }
                    elseif ($cantidad >= 51)
                  {
                      $mensaje = '<span class="label label-success">STOCK ALTO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= $cant_medio)
                  {
                      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= 21)
                  {
                      $mensaje = '<span class="label label-warning">STOCK MEDIO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= $cant_baja)
                  {
                      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
                      //echo $mensaje;
                  }
                    elseif ($cantidad >= 1)
                  {
                      $mensaje = '<span class="label label-danger">STOCK BAJO</span>';
                      //echo $mensaje;
                  }
                    else
                  {
                      $mensaje = '<span class="label label-default">SIN STOCK</span>';
                      //echo $mensaje;
                }
	?>
	<tr align="center">
		<td WIDTH=70><?php echo $reg['COD_INSUMO'] ?></td>
        <td WIDTH=80><?php echo $reg['FEC_ALTA'] ?></td>
        <td WIDTH=100><?php echo $reg['CATEGORIA_DESCRIPCION'] ?></td>
        <td WIDTH=100><?php echo $reg['MARCA_INS_DESC'] ?></td>
        <td WIDTH=70><?php echo $reg['INS_MODELO_DESC'] ?></td>
        <td WIDTH=70>$<?php echo $reg['INSUMO_PRECIO'] ?></td>
        <td WIDTH=60><?php echo $reg['INSUMO_CANTIDAD'] ?></td>
        <td WIDTH=100><?php echo $mensaje ?></td>
	</tr>
	<?php     
      }
    
    ?>
</table>
<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Lista_Stock.PDF');

?>