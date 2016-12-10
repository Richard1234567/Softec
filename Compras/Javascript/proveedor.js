
		$(document).ready(function(){
			cargar(1);
		});
		//$('#hola').on('click', function(){
		//	alert();
		//});


		function cargar(page){
			var p= $("#p").val();
			$("#proveedor").fadeIn('slow');
			//console.log('http://localhost/buscador/ajax/productos_factura.php?page='+page);
			$.ajax({
				url:'http://localhost/buscador/ajax/datos_proveedor.php?action=ajax&page='+page+'&p='+p,
				 beforeSend: function(objeto){
				 $('#proveedor').html('<img src="http://localhost/buscador/ajax/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".proveedor_div").html(data).fadeIn('slow');
					$('#proveedor').html('');
					
				}
			})
		}

		
		
			function eliminar (id)
				{
					
					$.ajax({
				        type: "GET",
				        url: "../ajax/agregar_pedidos.php",
				        data: "id="+id,
						 beforeSend: function(objeto){
							$("#resultado").html("Mensaje: Cargando...");
						  },
				        success: function(datos){
						$("#resultado").html(datos);
						}
							});

				}
				
		$("#datos_pedido").submit(function(){
			//v$('#bd-desde').on('change', function(){
			var ID_PROVEEDOR = $("#ID_PROVEEDOR").val();
		    var PROVEEDOR_CUIT = $("#PROVEEDOR_CUIT").val();
	        var CALLE = $("#CALLE").val();
	        var NUMERO = $("#NUMERO").val();
	        var fecha = $("#fecha").val();
			
			if (ID_PROVEEDOR==""){
			  alert("Debes seleccionar un proveedor");
			  $("#NOMBRE_RAZON_SOCIAL").focus();
			  return false;
		  }
		 VentanaCentrada('../pdf/documentos/pedidos_pdf.php?ID_PROVEEDOR='+ID_PROVEEDOR+'&PROVEEDOR_CUIT='+PROVEEDOR_CUIT+'&CALLE='+CALLE+'&NUMERO='+NUMERO+'&fecha='+fecha,'Factura','','1024','768','true');
	 	});
			
		
