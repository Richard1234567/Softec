<!-- Modal -->
<div class="modal fade" id="myProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Productos</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form class="form-horizontal">
            <div class="col-sm-6">
              <input type="text" class="form-control" placeholder="Buscar productos" id="q" onkeyup="Buscar()";>
            </div>
            <button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar
            </button>
            </div>
            <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
            <div class="outer_div" ></div><!-- Datos ajax Final -->
          </form>  
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>