<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Pencarian data dengan lookup modal bootstrap</title>
        <link rel="alternate" href="bootstrap/css/bootstrap.css"/>
        <link rel="alternate" href="datatables/dataTables.bootstrap.css"/>
    </head>
    <body>
        
        <!-- Modal -->
        <div class="modal fade" id="myprecio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Lookup Mahasiswa</h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Falla Descripción</th>
									<th>Precio</th>
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
                                        <td><?php echo $data['ID_FALLA']; ?></td>
                                        <td><?php echo $data['FALLA_DESC']; ?></td>
										<td><?php echo $data['PRECIO_DESCRIPCION']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nim").value = $(this).attr('data-nim');
                $('#myModal').modal('hide');
            });
			

//            tabel lookup mahasiswa
            $(document).ready(function() {
                $('#lookup').DataTable({
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
    </body>
</html>
