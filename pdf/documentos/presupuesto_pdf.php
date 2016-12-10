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
	$sql_count=mysqli_query($con,"select * from tmp_presupuesto where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados al presupuesto')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$ID_PERSONA=intval($_GET['ID_PERSONA']);
	$id_vendedor=intval($_GET['id_vendedor']);
	$condicion=mysqli_real_escape_string($con,(strip_tags($_REQUEST['condicion'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($con, "select LAST_INSERT_ID(ID_PRESUPUESTO) as last from presupuesto order by ID_PRESUPUESTO desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_presupuesto=$rw['last']+1;	
	
	

    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/presupuesto_html.php');
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
        $html2pdf->Output('Presupuesto.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
