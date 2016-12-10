<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form class="form-horizontal">
            <div class="col-sm-6">
              <input type="" name="" class="form-control" placeholder="Buscar proveedores" id="p" onkeyup="Buscar()";>
            </div>
            <button class="btn btn-default" onclick="cargar(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
            <div id="provedor" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
            <div class="proveedor_div" ></div><!-- Datos ajax Final -->
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>
