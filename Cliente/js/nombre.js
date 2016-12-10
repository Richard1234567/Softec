		$('#Ficha').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  //var codigo = button.data('codigo') // Extraer la información de atributos de datos
		  var id = button.data('id') // Extraer la información de atributos de datos
		  //var fecha = button.data('fecha') // Extraer la información de atributos de datos
		  //var nombre = button.data('nombre') // Extraer la información de atributos de datos
		  var apellido = button.data('APELLIDO_OPERADOR')
		  //var dni = button.data('dni') // Extraer la información de atributos de datos
		  //var correo = button.data('correo') // Extraer la información de atributos de datos
		  //var telefono = button.data('telefono') // Extraer la información de atributos de datos
		  //var celular = button.data('celular') // Extraer la información de atributos de datos
		  //var usuario = button.data('usuario') // Extraer la información de atributos de datos
		  //var contraseña = button.data('contraseña') // Extraer la información de atributos de datos
		  //var perfil = button.data('perfil') // Extraer la información de atributos de datos

		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Operador: '+apellido)
		  modal.find('.modal-body #id').val(id)
		  //modal.find('.modal-body #codigo').val(codigo)
		  
		  $('.alert').hide();//Oculto alert
		})