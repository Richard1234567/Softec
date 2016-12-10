
function eliminarcliente(id){
	var url = 'Eliminar_Cliente.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Cliente?');
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