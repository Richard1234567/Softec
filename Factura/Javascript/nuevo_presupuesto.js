
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
				url:'http://localhost/buscador/ajax/productos_presupuesto.php?action=ajax&page='+page+'&q='+q,
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
		        url: "../ajax/agregar_presupuesto.php",
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
				        url: "../ajax/agregar_presupuesto.php",
				        data: "id="+id,
						 beforeSend: function(objeto){
							$("#resultado").html("Mensaje: Cargando...");
						  },
				        success: function(datos){
						$("#resultado").html(datos);
						}
							});

				}
				
		$("#datos_presupuesto").submit(function(){
			//alert();
			var ID_PERSONA = $("#ID_PERSONA").val();
		  var PERSONA_APELLIDO = $("#PERSONA_APELLIDO").val();
		  var PERSONA_NOMBRE = $("#PERSONA_NOMBRE").val();
		  var PERSONA_CEL = $("#PERSONA_CEL").val();
		  var PERSONA_TEL = $("#PERSONA_TEL").val();
		  var id_vendedor = $("#id_vendedor").val();
		  var condicion = $("#condicion").val();
		  //var id_vendedor = $("#id_vendedor").val();
		  //var condiciones = $("#condiciones").val();
		  
		  if (PERSONA_APELLIDO==""){
			  alert("Debes colocar un Apellido");
			  $("#PERSONA_APELLIDO").focus();
			  return false;
		  }
		  if (PERSONA_NOMBRE==""){
			  alert("Debes colocar un Nombre");
			  $("#PERSONA_NOMBRE").focus();
			  return false;
		  }
		  if (PERSONA_CEL==""){
			  alert("Debes colocar un Contacto");
			  $("#PERSONA_CEL").focus();
			  return false;
		  }
		 VentanaCentrada('../pdf/documentos/presupuesto_pdf.php?ID_PERSONA='+ID_PERSONA+'&PERSONA_APELLIDO='+PERSONA_APELLIDO+'&PERSONA_NOMBRE='+PERSONA_NOMBRE+'&PERSONA_CEL='+PERSONA_CEL+'&PERSONA_TEL='+PERSONA_TEL+'&id_vendedor='+id_vendedor+'&condicion='+condicion,'Factura','','1024','768','true');
	 	});

