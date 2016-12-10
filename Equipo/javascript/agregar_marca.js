$(document).on("ready", function(){
      mostarMarca();
    });
    function mostarMarca(){
      $.ajax({
        url : "Agregar_marca.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#select-marca").html(response);
        }
      });
    }
    function registrarMarca(){
        var marca = $('input[name=marca]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_marca.php',
            type:'POST',
            data:'marca='+marca+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostarMarca();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }