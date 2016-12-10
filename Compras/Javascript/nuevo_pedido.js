
		$(document).ready(function(){
			load(1);
		});
		//$('#hola').on('click', function(){
		//	alert();
		//});


		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			//console.log('http://localhost/buscador/ajax/productos_factura.php?page='+page);
			$.ajax({
				url:'http://localhost/buscador/ajax/productos_pedidos.php?page='+page,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="http://localhost/buscador/ajax/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	function agregar (id)
		{
			var precio_total_r=document.getElementById('precio_total_r_'+id).value;
			var cantidad=document.getElementById('cantidad_'+id).value;
			//Inicia validacion
			
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_total_r))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_total_r_'+id).focus();
			return false;
			} 
			//Fin validacion
			
			$.ajax({
		        type: "POST",
		        url: "../ajax/agregar_pedidos.php",
		        data: "id="+id+"&cantidad="+cantidad+"&precio_total_r="+precio_total_r,
		        //data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
				 beforeSend: function(objeto){
					$("#resultado").html("Mensaje: Cargando...");
				  },
		        success: function(datos){
				$("#resultado").html(datos);
				//alert(datos);
				}
					});
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
		    var id_vendedor = $("#id_vendedor").val();
	        var PROVEEDOR_CUIT = $("#PROVEEDOR_CUIT").val();
			
			if (ID_PROVEEDOR==""){
			  alert("Debes seleccionar un cliente");
			  $("#nombre_cliente").focus();
			  return false;
		  }
		 VentanaCentrada('../pdf/documentos/pedidos_pdf.php?ID_PROVEEDOR='+ID_PROVEEDOR+'&id_vendedor='+id_vendedor+'&PROVEEDOR_CUIT='+PROVEEDOR_CUIT,'Factura','','1024','768','true');
	 	});
			
		
