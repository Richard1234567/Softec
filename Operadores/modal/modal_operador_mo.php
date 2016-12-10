<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="width:900px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Operador</h4>
      </div>
      <div class="modal-body">
			    <div id="datos_ajax"></div>
          <div class="container-fluid">
            <div class="row" align="center">
              <div class="col-md-2"><label>Fecha Alta</label></div>
              <div class="col-md-4"><input type="date" id="fecha" name="fecha" class="form-control input-sm"></div>
              <div class="col-md-2"><label>Apellido</label></div>
              <div class="col-md-4"><input type="" id="apellido" name="apellido" class="form-control input-sm"></div>
              <input type="hidden" class="form-control" id="id" name="id">
            </div><br>

            <div class="row" align="center">
              <div class="col-md-2"><label>Nombre</label></div>
              <div class="col-md-4"><input type="" id="nombre" name="nombre" class="form-control input-sm"></div>
              <div class="col-md-2"><label>DNI</label></div>
              <div class="col-md-4"><input type="" id="dni" name="dni" class="form-control input-sm"></div>
            </div><br>

            <div class="row" align="center">
              <div class="col-md-2"><label>E-mail</label></div>
              <div class="col-md-4"><input type="" id="correo" name="correo" class="form-control input-sm"></div>
              <div class="col-md-2"><label>Teléfono</label></div>
              <div class="col-md-4"><input type="" id="telefono" name="telefono" class="form-control input-sm"></div>
            </div><br>

            <div class="row" align="center">
              <div class="col-md-2"><label>Celular</label></div>
              <div class="col-md-4"><input type="" id="celular" name="celular" class="form-control input-sm"></div>
              <div class="col-md-2"><label>Usuario</label></div>
              <div class="col-md-4"><input type="" id="usuario" name="usuario" class="form-control input-sm"></div>
            </div><br>
            <div class="row" align="center">
              <div class="col-md-2"><label>Contraseña</label></div>
              <div class="col-md-4"><input type="" id="contraseña" name="contraseña" class="form-control input-sm"></div>
              <div class="col-md-2"><label>Perfil</label></div>
              <div class="col-md-4"><select class="form-control" id="perfil" name="perfil">
                                      <option value="0">Seleccione</option>
                                      <option value = "admin1">Usuario Administrador</option>
                                      <option value = "admin2">Usuario Ventas</option>
                                      <option value = "admin3">Usuario Técnico</option>
                                      <!--option value = "admin1">Usuario Administrador</option-->
                                    </select>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>