	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'Lista_Operadores.php',
			data: parametros,
			
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

		$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  //var codigo = button.data('codigo') // Extraer la información de atributos de datos
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var fecha = button.data('fecha') // Extraer la información de atributos de datos
		  var nombre = button.data('nombre') // Extraer la información de atributos de datos
		  var apellido = button.data('apellido')
		  var dni = button.data('dni') // Extraer la información de atributos de datos
		  var correo = button.data('correo') // Extraer la información de atributos de datos
		  var telefono = button.data('telefono') // Extraer la información de atributos de datos
		  var celular = button.data('celular') // Extraer la información de atributos de datos
		  var usuario = button.data('usuario') // Extraer la información de atributos de datos
		  var contraseña = button.data('contraseña') // Extraer la información de atributos de datos
		  var perfil = button.data('perfil') // Extraer la información de atributos de datos

		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Operador: '+apellido)
		  modal.find('.modal-body #id').val(id)
		  //modal.find('.modal-body #codigo').val(codigo)
		  modal.find('.modal-body #fecha').val(fecha)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #apellido').val(apellido)
		  modal.find('.modal-body #dni').val(dni)
		  modal.find('.modal-body #correo').val(correo)
		  modal.find('.modal-body #telefono').val(telefono)
		  modal.find('.modal-body #celular').val(celular)
  		  modal.find('.modal-body #usuario').val(usuario)
  		  modal.find('.modal-body #contraseña').val(contraseña)
  		  modal.find('.modal-body #perfil').val(perfil)
		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#id').val(id)
		})

	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "Modificar_Operador.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);
					
					//load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#guardarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "Agregar_Operador.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					//load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "Eliminar_Operador.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					//load(1);
				  }
			});
		  event.preventDefault();
		});
