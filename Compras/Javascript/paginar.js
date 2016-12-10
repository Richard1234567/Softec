function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'Tabla_Compras.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='../img/ajax-loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}