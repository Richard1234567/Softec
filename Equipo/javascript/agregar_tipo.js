$(document).on("ready", function(){
      mostrarTipo();
    });
    function mostrarTipo(){
      $.ajax({
        url : "Agregar_tipo.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#select-tipo").html(response);
        }
      });
    }
    function registrar(){
        var equipo = $('input[name=equipo]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_tipo.php',
            type:'POST',
            data:'equipo='+equipo+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarTipo();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }