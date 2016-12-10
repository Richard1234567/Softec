
$( "#guardar_insumo" ).submit(function( event ) {
  $('#guardar_datos_p').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "hola.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_p").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_p").html(datos);
			$('#guardar_datos_p').attr("disabled", false);
			//load(1);
		  }
	});
  event.preventDefault();
})


/*
$(document).ready(function(){
	$("#guardar").click(function(){
		$.ajax({
			type:'post',
			url:'Agregar_insumo_p_php',
			dataType:'json',
			data: {estrategias: $("#estrategias").val()},
			
			success: function(data){
				$("#resultados_ajax_p").html(datos);
			}
		});
		
	});
});
*/