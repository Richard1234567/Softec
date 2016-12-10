$(document).on("ready", function(){
      mostrarModelo();
    });
    function mostrarModelo(){
      $.ajax({
        url : "Agregar_modelo.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#select-modelo").html(response);
        }
      });
    }
    function registrarModelo(){
        var modelo = $('input[name=modelo]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_modelo.php',
            type:'POST',
            data:'modelo='+modelo+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarModelo();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }