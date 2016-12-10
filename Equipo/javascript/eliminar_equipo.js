
function eliminarequipo(id){
	var url = 'Eliminar_Equipo.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Equipo?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}