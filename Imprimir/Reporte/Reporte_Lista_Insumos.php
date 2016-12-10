<?php

	include 'config.php';

	ob_start();

?>
<style type="text/css">
	.header {
		width:760px;
		height:70px;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		background: #ccc;
	}

	.tr {
		background: white;
	}

	.tabla {
		width: 760px;
		height: auto;
		color:#000000;
		border:solid 1px #cccccc;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px;
		margin: 0 0 0 0px;
		
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

 $resultado = mysql_query("SELECT * FROM insumo JOIN insumo_marca ON RELA_INS_MARCA = ID_INS_MARCA JOIN insumo_modelo ON RELA_INS_MODELO = ID_INS_MODELO JOIN categoria ON RELA_CATEGORIA = ID_CATEGORIA WHERE FEC_ALTA BETWEEN '$desde' AND '$hasta'") or mysql_error(($conexion));

?>



<div class="header">
	<h3 align="center">Informe de Equipos</h3>
</div><br>

<div class="tabla">
	<table align="center">
		<tr class="table-info" align="center">
            <td class="td">#</td>
            <td class="td">Fec. Alta</td>
            <td class="td">Categoria</td>
            <td class="td">Marca</td>
            <td class="td">Modelo</td>
            <td class="td">Precio</td>
            <td class="td">Cantidad</td>
            <td class="td">Estado</td>
        </tr>
		<?php    
                  while ( $reg = mysql_fetch_assoc($resultado)) {
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
              	<tr style="background: #fff;" align="center">
        		    <td class="td"><?php echo $reg['ID_INSUMO'] ?></td>
                    <td class="td"><?php echo $reg['FEC_ALTA'] ?></td>
                    <td class="td"><?php echo $reg['CATEGORIA_DESCRIPCION'] ?></td>
                    <td class="td"><?php echo $reg['MARCA_INS_DESC'] ?></td>
                    <td class="td"><?php echo $reg['INS_MODELO_DESC'] ?></td>
                    <td class="td">$<?php echo $reg['INSUMO_PRECIO'] ?></td>
                    <td class="td"><?php echo $reg['INSUMO_CANTIDAD'] ?></td>
                    <td class="td"><?php echo $mensaje ?></td>
	            </tr>
 <?php     
      }

    ?>
              </TABLE>
            </div>


<?php 

	$conten = ob_get_clean();

	include '../pdf/html2pdf.class.php';

	$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
	$pdf->writeHTML($conten);
	$pdf->pdf->IncludeJS('print(TRUE)');
	$pdf->output('Informe de Equipos.PDF');

?>