function eliminarcompra(id){
	var url = 'Eliminar_Compras.php';
	var pregunta = confirm('¿Esta seguro de eliminar esta Compra?');
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