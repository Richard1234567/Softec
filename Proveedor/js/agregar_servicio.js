    $(document).on("ready", function(){
      mostrarServicios();
    });
    function mostrarServicios(){
      $.ajax({
        url : "Agregar_Servicio.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#servicio").html(response);
        }
      });
    }
    function registrar(){
        var servicios = $('input[name=servicios]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Servicio.php',
            type:'POST',
            data:'servicios='+servicios+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarServicios();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }