 
   $( "#guardarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "Agregar_Contactos.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#datos_ajax_register").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#datos_ajax_register").html(datos);
          
          load(1);
          }
      });
      event.preventDefault();
    });
    
    $( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $(".datos_ajax_delete").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $(".datos_ajax_delete").html(datos);
          
          $('#dataDelete').modal('hide');
          load(1);
          }
      });
      event.preventDefault();
    });
