<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	$id_pedido= intval($_GET['id_pedido']);
	$sql_count=mysqli_query($con,"select * from pedido_proveedor where id_pedido='".$id_pedido."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Pedido no encontrado')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_factura=mysqli_query($con,"select * from pedido_proveedor where id_pedido='".$id_pedido."'");
	$rw_factura=mysqli_fetch_array($sql_factura);
	$numero_pedido=$rw_factura['numero_pedido'];
	$ID_PROVEEDOR=$rw_factura['ID_PROVEEDOR'];
	$id_vendedor=$rw_factura['id_vendedor'];
	$fecha_pedido=$rw_factura['fecha_pedido'];
	//$condiciones=$rw_factura['condiciones'];
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_pedido_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
