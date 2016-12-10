$(document).on("ready", function(){
      mostarLista();
    });
    function mostarLista(){
      $.ajax({
        url : "Agregar_Lista.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#select-comprobante").html(response);
        }
      });
    }
    function registrar(){
        var tipo = $('input[name=tipo]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Lista.php',
            type:'POST',
            data:'tipo='+tipo+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostarLista();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }