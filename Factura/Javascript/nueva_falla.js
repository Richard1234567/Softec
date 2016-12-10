
		 

		function agregar (id)
			{
			var falla=document.getElementById('falla_'+id).value;
			var precio_venta=document.getElementById('precio_venta_'+id).value;
			
			//var mano=document.getElementById('mano_'+id).value;
			//Inicia validacion
			
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta_'+id).focus();
			return false;
			}
			if (isNaN(falla))
			{
			alert('Esto no es un numero');
			document.getElementById('falla_'+id).focus();
			return false;
			}
			//Fin validacion
			
			$.ajax({
		        type: "POST",
		        url: "../ajax/agregar_fallas.php",
		         data: "id="+id+"&precio_venta="+precio_venta+"&falla="+falla,
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
				        url: "../ajax/agregar_fallas.php",
				        data: "id="+id,
						 beforeSend: function(objeto){
							$("#resultado").html("Mensaje: Cargando...");
						  },
				        success: function(datos){
						$("#resultado").html(datos);
						}
							});

				}
				
		$("#datos_factura").submit(function(){
			//v$('#bd-desde').on('change', function(){
			var ID_PERSONA = $("#ID_PERSONA").val();
		    var id_vendedor = $("#id_vendedor").val();
	        var condiciones = $("#condiciones").val();
	        //var hola = $("#hola");
			
			if (ID_PERSONA==""){
			  alert("Debes seleccionar un cliente");
			  $("#nombre_cliente").focus();
			  return false;
		  }
		 VentanaCentrada('../pdf/documentos/facturas_pdf.php?ID_PERSONA='+ID_PERSONA+'&id_vendedor='+id_vendedor+'&condiciones='+condiciones,'Factura','','1024','768','true');
	 	});
			
		
