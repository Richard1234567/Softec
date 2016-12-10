$(document).on("ready", function(){
      mostrarUnidad();
    });
    function mostrarUnidad(){
      $.ajax({
        url : "Agregar_Unidad.php",
        type : "POST",
        data : "boton=consultar",

        success:function(datos){
          //alert(response);
          $("#unidades").html(datos);
        } 
      });
    }

    function registrarUnidad(){
        var unidad = $('input[name=unidad]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Unidad.php',
            type:'POST',
            data:'unidad='+unidad+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarUnidad();      
    });
    }