function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../Imprimir/Reporte/Reporte_Lista_Equipo.php?desde='+desde+'&hasta='+hasta);
}