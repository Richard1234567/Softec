<?php 
include '../conexion.php';
$registro = mysql_query("SELECT * from diagnostico;") or (mysql_error($conexion));
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>
 
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link href="../bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<nav role="navigation" class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../Equipo/Diagnostico_Mo.php" class="navbar-brand"><img src="../img/hp.jpg" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
</nav>

<h3 align="center">Formulario de Fallas</h3><br>
    <form action="Alta_Falla.php" method="post">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-3"><label>Falla:</label></div>
                <div class="col-md-3"><input type="text" name="FALLA_DESC" class="form-control"></div>
                <div class="col-md-2"><label>Precio:</label></div>
                <div class="col-md-2"><select class="form-control" id="select-precio" name="RELA_PRECIO">
                                      
                                      </select>
                </div>
                <div class="col-md-2"><button type="button" class="btn btn-info btn-xm" data-toggle="modal" data-target="#myPrecio">
                                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                                      </button></div>
            </div>
        </div>

        <br>
      <?php 
        //while ($reg = mysql_fetch_array($registro))
      //{
      ?>   
        <table align="center">
          <tr>
              <!--td><a href="http://localhost/buscador/Equipo/Diagnostico.php?id=<?php //echo $reg['ID_DIAGNOSTICO'];?>" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span>&nbsp;Volver</a>&nbsp;</td-->
              <td><button class="btn btn-success" type="submit">Guardar</button>&nbsp;</td>
              <td><button class="btn btn-danger" type="reset">Cancelar</button></td>
          </tr>
       <?php     
        //}
       ?>    
        </table>    

    </form>

    <!-- Modal -->
        <div class="modal fade" id="myPrecio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Precio</h4>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                    <div class="row" align="center">
                        <div class="col-md-3"><label>Nuevo Precio:</label></div>
                        <div class="col-md-5"><input type="text" name="precio" class="form-control"></div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="registrar();">Guardar</button>
              </div>
            </div>
          </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
    <script type="text/javascript">

    $(document).on("ready", function(){
      mostrarPrecio();
    });
    function mostrarPrecio(){
      $.ajax({
        url : "Agregar_Precio.php",
        type : "POST",
        data : "boton=consultar",

        success:function(response){
          //alert(response);
          $("#select-precio").html(response);
        }
      });
    }
    function registrar(){
        var precio = $('input[name=precio]').val();
        //alert(barrio);
        $.ajax({
            url:'Agregar_Precio.php',
            type:'POST',
            data:'precio='+precio+'&boton=registrar'
        }).done(function(resp){
            alert(resp);
            mostrarPrecio();
            /*if (resp==='exito') {
                  $('#exito').show();
              }
              else{
                  alert(resp);
              }*/
              
        });
    }
    
    </script>
  </body>
</html>      