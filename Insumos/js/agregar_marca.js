$(document).on("ready", function(){
      mostrarMarcas();
    });
    function mostrarMarcas(){
      $.ajax({
        url : "Agregar_Marca.php",
        type : "POST",
        data : "boton=consultar",

        success:function(datos){
          //alert(response);
          $("#marca").html(datos);
        } 
      });
    }

    function registrar(){
        var marcas = $('input[name=marcas]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Marca.php',
            type:'POST',
            data:'marcas='+marcas+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarMarcas();      
    });
    }