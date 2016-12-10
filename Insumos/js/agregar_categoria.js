$(document).on("ready", function(){
      mostrarCategorias();
    });
    function mostrarCategorias(){
      $.ajax({
        url : "Agregar_Categorias.php",
        type : "POST",
        data : "boton=consultar",

        success:function(datos){
          //alert(response);
          $("#categoria").html(datos);
        } 
      });
    }

    function registrarCategorias(){
        var categoria = $('input[name=categoria]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Categorias.php',
            type:'POST',
            data:'categoria='+categoria+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarCategorias();      
    });
    }