$(document).on("ready", function(){
      mostrarCategorias();
    });
    function mostrarCategorias(){
      $.ajax({
        url : "Agregar_modelo.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#estado").html(response);
        }
      });
    }
    