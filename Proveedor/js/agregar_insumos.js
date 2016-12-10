    $(document).on("ready", function(){
      mostrarInsumos();
    });
    function mostrarInsumos(){
      $.ajax({
        url : "Agregar_Insumos.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#insumo").html(response);
        }
      });
    }
    function registrarInsumos(){
        var insumos = $('input[name=insumos]').val();
        var cantidad = $('input[name=cantidad]').val();
        var precio = $('input[name=precio]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Insumos.php',
            type:'POST',
            data:'insumos='+insumos+'&cantidad='+cantidad+'&precio='+precio+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarInsumos();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }