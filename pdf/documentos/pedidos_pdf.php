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
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados al pedido')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$ID_PROVEEDOR=intval($_GET['ID_PROVEEDOR']);
	$PROVEEDOR_CUIT=intval($_GET['PROVEEDOR_CUIT']);
	$CALLE=intval($_GET['CALLE']);
	$NUMERO=intval($_GET['NUMERO']);
	$fecha=intval($_GET['fecha']);
	$id_vendedor=intval($_GET['id_vendedor']);
	//s$condiciones=mysqli_real_escape_string($con,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($con, "select LAST_INSERT_ID(numero_pedido) as last from pedido_proveedor order by id_pedido desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_pedido=$rw['last']+1;
	//$numero_factura=$rw_factura['numero_factura']+1;	
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/pedido_html.php');
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
