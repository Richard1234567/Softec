
		$(document).ready(function(){
			load(1);
		});
		//$('#hola').on('click', function(){
		//	alert();
		//});


		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			//console.log('http://localhost/buscador/ajax/productos_factura.php?action=&page='+page+'&q='+q);
			$.ajax({
				url:'http://localhost/buscador/ajax/productos_factura.php?action=page='+page+'&q='+q,
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
			var mano=document.getElementById('mano_'+id).value;
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
			if (isNaN(mano))
			{
			alert('Esto no es un numero');
			document.getElementById('mano_'+id).focus();
			//console.log(id_mano);
			return false;
			}
			//Fin validacion
			
			$.ajax({
		        type: "POST",
		        url: "../ajax/agregar_facturacion.php",
		        data: "id="+id+"&precio_total_r="+precio_total_r+"&cantidad="+cantidad+'&mano='+mano,
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
				        url: "../ajax/agregar_facturacion.php",
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
		 VentanaCentrada('../pdf/documentos/factura_pdf.php?ID_PERSONA='+ID_PERSONA+'&id_vendedor='+id_vendedor+'&condiciones='+condiciones,'Factura','','1024','768','true');
	 	});
			
		
