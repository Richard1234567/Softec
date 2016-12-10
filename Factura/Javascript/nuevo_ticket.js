
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
				url:'http://localhost/buscador/ajax/productos_ticket.php?action=ajax&page='+page+'&q='+q,
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
		        url: "../ajax/agregar_ticket.php",
		        data: "id="+id+"&precio_total_r="+precio_total_r+"&cantidad="+cantidad,
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
				        url: "../ajax/agregar_ticket.php",
				        data: "id="+id,
						 beforeSend: function(objeto){
							$("#resultado").html("Mensaje: Cargando...");
						  },
				        success: function(datos){
						$("#resultado").html(datos);
						}
							});

				}
				
		$("#datos_ticket").submit(function(){
			
		  //var apellido = $("#apellido").val();
		  //var nombre = $("#nombre").val();
		  //var contacto = $("#contacto").val();
		  var id_vendedor = $("#id_vendedor").val();
		  //var condicion = $("#condicion").val();
		  //var condiciones = $("#condiciones").val();
		  
		  /*
		  if (apellido==""){
			  alert("Debes colocar un Apellido");
			  $("#apellido").focus();
			  return false;
		  }
		  if (nombre==""){
			  alert("Debes colocar un Nombre");
			  $("#nombre").focus();
			  return false;
		  }
		  if (contacto==""){
			  alert("Debes colocar un Contacto");
			  $("#contacto").focus();
			  return false;
		  }*/
		 VentanaCentrada('../pdf/documentos/ticket_pdf.php?id_vendedor='+id_vendedor,'Ticket','','1024','768','true');
	 	});

