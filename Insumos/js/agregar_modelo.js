$(document).on("ready", function(){
      mostrarModelo();
    });
    function mostrarModelo(){
      $.ajax({
        url : "Agregar_Modelo.php",
        type : "POST",
        data : "boton=consultar",

        success:function(datos){
          //alert(response);
          $("#modelo").html(datos);
        } 
      });
    }

    function registrarModelo(){
        var modelos = $('input[name=modelos]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Modelo.php',
            type:'POST',
            data:'modelos='+modelos+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarModelo();      
    });
    }