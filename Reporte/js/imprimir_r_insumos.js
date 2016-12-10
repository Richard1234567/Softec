function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../Imprimir/Reporte/Reporte_por_Fecha_Insumos.php?desde='+desde+'&hasta='+hasta);
}