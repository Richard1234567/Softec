<?php 
session_start();
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Con esto garantizamos que se vea bien en dispositivos móviles-->
    <title>SOFTEC</title>

  <link rel="stylesheet" href="../DataTable/datatables/dataTables.bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap personalizado/css/bootstrap.css">
  <link href="../bootstrap personalizado/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="../ico/icono png softec.png">

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
            <a href="Lista_Equi_M.php" onclick="history.go(-1)" class="navbar-brand"><img src="../img/LOGO SOFTEC.png" style="width:250px; height:50px;  margin:-17px 0px -5px 15px;"></a>
        </div>
 
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="Equipo/Novedades_del_dia.php">Novedades</a></li>
                <li><a href="Equipo/Lista_Insumo.php">Buscar Insumos</a></li>
                <li><a href="Equipo/Lista_Insumos.php">Reportes</a></li>
                <li><a href="Operadores/Operador_Tecnico.php">Actualizar Datos</a></li>
                <li class="li"><a href="Desconectar_Usuario.php">Cerrar Cesión</a></li>
            </ul>
        </div>
</nav>
<h3 align="center">Revisión Técnica</h3><br>
<?php 

    include '../conexion.php';
    $registros = mysql_query ("select * from equipo where ID_EQUIPO = ID_EQUIPO;");

    if ($reg = mysql_fetch_array ($registros))
    {

?>

<?php

        $result = mysql_query('SELECT * FROM diagnostico JOIN equipo ON RELA_EQUIPO = ID_EQUIPO JOIN estado_equipo ON RELA_ESTADO = ID_ESTADO JOIN marca ON RELA_MARCA = ID_MARCA JOIN modelo ON RELA_MODELO = ID_MODELO WHERE ID_EQUIPO = "'.$_GET['id'].'"');

        while($row = mysql_fetch_array($result))
          { 
                                    
    ?>



<?php 
}       
?>

  <div class="container-fluid">
      <div style="margin: 0 0 -35 1175px;">
        <td>
          <a href="Formulario_Falla.php">
            <button type="button" class="btn btn-warning">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Falla
            </button>
          </a>
          </td>
    </div>
    <div style="width: 98%; height: 31px; background: #EEEBEB; margin: 40 0 0 10px;">
      <!--<button class="button1">Borrar</button>-->
      <input type="" placeholder="Buscar Fallas" class="form-control" id="valor" onkeyup="Buscar()"; style="margin: -30 -90 0 1070px; width: 220px; height: 30px;">
    </div>
  </div><br>
<form action="Modificar_Diagnostico.php" method="post">
<?php 
  
  $fallas = mysql_query('SELECT * FROM falla limit 3;'); 
?>            
    <div id='muestra'> 
        <div id='resultados'>
            <table class=" table table-bordered" style="width: 97%; height: 40px; background: #F9B133; margin: -10 0 0 20px; font-family: Times; font-size:18px;">
                <tr class="table-info" align="center">
                    <td>#</td>
                    <td>Fallas Descripción</td>
                    <td>Acción</td>
                </tr>
<?php while ($reg = mysql_fetch_assoc($fallas)) 
{
 ?>
                <tr style="background: #fff;" align="center">
                    <td class="td"><? echo $reg['ID_FALLA']?></td>
                    <td class="td"><? echo $reg['FALLA_DESC']?></td>
                    <td class="td"><input type="checkbox" name="colores[]" value="<? echo $reg['FALLA_DESC']?>" /></td>
                </tr>
<?php } ?>               
            </table>
        </div>
    </div><br>
    <div class="container-fluid">
        <div class="row" align="center">
            <div class="col-md-2"><label>Estado:</label></div>
            <div class="col-md-2"><select class="form-control" name="RELA_ESTADO" value="<?php echo $row['ESTADO_DESCRIPCION'];?>">
                                  <option>Seleccione Estado</option>
                                  <?php
                                    $registro=mysql_query("select * from estado_equipo;",$conexion) or die(mysql_error($conexion));
                                            
                                    $buscar = mysql_query ("Select * from diagnostico join estado_equipo on RELA_ESTADO = ID_ESTADO where ID_ESTADO = ID_ESTADO;") or 
                                    die (mysql_error ($conexion));
                                    mysql_select_db ("softec",$conexion) or 
                                    die ("Problemas en la seleccion de base de datos");
                                    //COMPARO E ITERO INFORMACION DE DOS ARRAYS
                                    $row = mysql_fetch_array($buscar);
                                    while($reg2=mysql_fetch_array($registro))
                                    {
                                     if ($row['RELA_ESTADO']==$reg2['ID_ESTADO'])
                                           echo "<option value=\"".$row['ID_ESTADO']."\" selected>".$row['ESTADO_DESCRIPCION']."</option>";
                                                else
                                        echo "<option value=\"".$reg2['ID_ESTADO']."\">".$reg2['ESTADO_DESCRIPCION']."</option>";
                                    }
                                    ?>
                                  </select>
            </div>
            <div class="col-md-2"><label>Precio</label></div>
            <div class="col-md-2"><input type="" name="PRECIO_TOTAL" class="form-control" value="<?php echo $row['PRECIO_TOTAL'];?>"></div>
            <div class="col-md-2"><button type="button" class="btn btn-info btn-xm" data-toggle="modal" data-target="#myLista">
                                      <span class="glyphicon glyphicon-list" aria-hidden="true"></span>  Lista de Precios
                                  </button></div>
        </div>
    </div><br>
        <div align="center">
            <input type="hidden" name="ID_DIAGNOSTICO" value="<?php echo $_GET['id']; ?>">
            <a class="btn btn-warning" href="Lista_Equi_M.php?id=<?php echo $row['ID_DIAGNOSTICO']; ?>" role="button">Volver</a>
              <button type="submit" class="btn btn-success">Guardar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>

    </form>
<?php 
}

else
      echo 'No existe el Registro';
?>
    <!-- Modal -->
        <div class="modal fade" id="myLista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lista de Fallas</h4>
                    </div>
                    <div class="modal-body">
                        <table id="falla" class="table table-bordered table-hover table-striped">
                            <thead align="center">
                                <tr style="background: #F9B133; font-family: Times; font-size:18px;">
                                  <th align="center">#</th>
                                  <th align="center">Falla Descripción</th>
                                  <th align="center">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                    mysql_connect('localhost', 'root', '');
                                    mysql_select_db('softec');
                                    $query = mysql_query('SELECT * FROM falla JOIN precio ON RELA_PRECIO = ID_PRECIO;');
                                    while ($data = mysql_fetch_array($query)) {
                                ?>
                                    <tr class="pilih" data-nim="<?php echo $data['nim']; ?>">
                                      <td align="center"><?php echo $data['ID_FALLA']; ?></td>
                                      <td align="center"><?php echo $data['FALLA_DESC']; ?></td>
                                      <td align="center"><?php echo $data['PRECIO_DESCRIPCION']; ?></td>
                                    </tr>
                                    <?php
                                     }
                                    ?>
                            </tbody>
                        </table>  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js--> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!-- Llamamos al JavaScript  a través de CDN -->
<script>
    $(document).ready(function(){
      load(1);
    });

    function load(page){
      var q= $("#q").val();
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./Buscar_Fallas.php?action=ajax&page='+page+'&q='+q,
         beforeSend: function(objeto){
         $('#loader').html();
        },
        success:function(data){
          $(".outer_div").html(data).fadeIn('slow');
          $('#loader').html('');
          
        }
      })
    }
  </script>
  <script src="javascript/buscar_fallas.js" language="javascript"></script>

  <script src="../DataTable/js/jquery-1.11.2.min.js"></script>
  <script src="../DataTable/bootstrap/js/bootstrap.js"></script>
  <script src="../DataTable/datatables/jquery.dataTables.js"></script>
  <script src="../DataTable/datatables/dataTables.bootstrap.js"></script>
  <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
      $(document).on('click', '.pilih', function (e) {
          document.getElementById("nim").value = $(this).attr('data-nim');
          $('#myModal').modal('hide');
      });


//            tabel lookup mahasiswa
      $(document).ready(function() {
          $('#falla').DataTable({
              "order": [[ 1, "asc" ]],
              "language": {
                          "sProcessing":     "Procesando...",
                          "sLengthMenu":     "Mostrar _MENU_ registros",
                          "sZeroRecords":    "No se encontraron resultados",
                          "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
                          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                          "sInfoPostFix":    "",
                          "sSearch":         "Buscar:",
                          "sUrl":            "",
                          "sInfoThousands":  ",",
                          "sLoadingRecords": "Cargando...",
                          "oPaginate": {
                              "sFirst":    "Primero",
                              "sLast":     "Ãšltimo",
                              "sNext":     "Siguiente",
                              "sPrevious": "Anterior"
                          },
                          "oAria": {
                              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                          },
              }
          });
      } );

      function dummy() {
          var nim = document.getElementById("nim").value;
          alert('Nomor Induk Mahasiswa ' + nim + ' berhasil tersimpan');
  
  var ket = document.getElementById("ket").value;
          alert('Keterangan ' + ket + ' berhasil tersimpan');
      }
  </script>              