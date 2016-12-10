

  <!-- Modal -->
<div class="modal fade" id="myCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Categoría</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Categoría</label>
          <input type="text" name="categoria" class="form-control" required onkeyup="javascript:this.value=this.value.toUpperCase();">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="registrarCategorias();">Guardar</button>
      </div>
    </div>
  </div>
</div>