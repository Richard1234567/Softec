$(document).on("ready", function(){
      mostrarBarrios();
    });
    function mostrarBarrios(){
      $.ajax({
        url : "Agregar_Barrios.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#select-barrio").html(response);
        }
      });
    }
    function registrar(){
        var barrio = $('input[name=barrio]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Barrios.php',
            type:'POST',
            data:'barrio='+barrio+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarBarrios();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }