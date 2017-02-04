<div class="modal fade" id="modalNuevoDocente">
    <div class="modal-dialog modal-personalizado">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" onclick="limpiarFormularioDocente()" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Nuevo Docente</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id='paso1' class="col-sm-4 tituloTab bg-primary" style="margin-left: 15px;"><strong>Datos Personales</strong></div>
                    <div id='paso2' class="col-sm-4 tituloTab tabDesactivo"><strong>Datos de Usuario</strong></div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#datosPersonalesDocente" aria-controls="datosPersonalesDocente" role="tab" style="display:none;">Datos Personales</a></li>
                    <li role="presentation"><a href="#datosUsuarioDocente" aria-controls="datosUsuarioDocente" role="tab" style="display:none;">Datos de Usuario</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="datosPersonalesDocente">
                        <br/>
                        <form id="formPaso1" action="<?php echo base_url();?>docente/guardarDocente" method="post" >
                            <div class="row">
                                <div class="form-group col-sm-8" style="padding-right: 2px;">                       
                                    <label for="txtCiNuevo">Cedula de Identidad<span>*</span></label>
                                    <input type="text" class="form-control" id="txtCiNuevo" name="txtCiNuevo" placeholder="Cedula de Identidad" required/> 
                                </div>
                                <div class="form-group col-sm-4" style="padding-left: 2px;">   
                                    <label for="selExpedidoNuevo">Expedido</label>                       
                                    <select name="selExpedidoNuevo" id="selExpedidoNuevo" class="form-control">
                                        <?php foreach ($expedidos as $e) { ?>
                                            <option value="<?php echo $e->uexp_id;?>"><?php echo $e->uexp_denominacion;?></option>
                                        <?php } ?>
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="txtNombreNuevo">Nombres<span>*</span></label>
                                    <input type="text" class="form-control" id="txtNombreNuevo" name="txtNombreNuevo" placeholder="Nombres" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="txtPaternoNuevo">Apellido Paterno<span>*</span></label>
                                    <input type="text" class="form-control" id="txtPaternoNuevo" name="txtPaternoNuevo" placeholder="Apellido Paterno" required/>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtMaternoNuevo">Apellido Materno</label>
                                    <input type="text" class="form-control" id="txtMaternoNuevo" name="txtMaternoNuevo" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="row">
                                 <div class="form-group col-sm-6">
                                    <label for="txtDireccionNuevo">Direccion</label>
                                    <input type="text" class="form-control" id="txtDireccionNuevo" name="txtDireccionNuevo" placeholder="Direccion">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtEmailNuevo">Correo Electronico</label>
                                    <input type="email" class="form-control" id="txtEmailNuevo" name="txtEmailNuevo" placeholder="Correo electronico">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="txtTelefonoNuevo">Telefono</label>
                                    <input type="text" class="form-control" id="txtTelefonoNuevo" name="txtTelefonoNuevo" placeholder="Telefono">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtCelularNuevo">Celular</label>
                                    <input type="text" class="form-control" id="txtCelularNuevo" name="txtCelularNuevo" placeholder="Celular">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Género</label>
                                </div>
                                <div class="col-sm-10" >
                                    <div class="radio-inline">                                      
                                        <input type="radio" name="rbnGeneroNuevo" id="optionM" value="2" checked>
                                        Masculino                                      
                                    </div>
                                    <div class="radio-inline">                                      
                                        <input type="radio" name="rbnGeneroNuevo" id="optionF" value="1">
                                        Femenino                                      
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="datosUsuarioDocente">
                        <br/>
                        <form id="formPaso2">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="txtUsuarioNuevo">Nombre de Usuario<span>*</span></label>
                                    <input type="text" class="form-control" id="txtUsuarioNuevo" name="txtUsuarioNuevo" placeholder="Nombre de usuario" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtPasswordNuevo">Password<span>*</span></label>
                                    <input type="password" class="form-control" id="txtPasswordNuevo" name="txtPasswordNuevo" placeholder="Password" required>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default col-sm-12 btn-block generaPassword" style="margin-top: 23px;" data-toogle="tooltip" data-placement="bottom" title="El password generado esta definido por las iniciales de su nombre completo y su cedula. Paterno-Materno-Nombre-CI. Ejemplo: Juan Perez Gomez con CI 123456, su password es PGJ123456">
                                        Generar Password
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtPasswordConfirmar">Confirmar Password<span>*</span></label>
                                    <input type="password" class="form-control" id="txtPasswordConfirmar" name="txtPasswordConfirmar" placeholder="Repetir Password" required>
                                </div>
                            </div>
                            <div class="row alert alert-info">
                                <div class="col-sm-12">
                                    <p>Estado actual del docente.</p>
                                </div>
                                <div class="col-sm-12">
                                    <div class="radio-inline">
                                      <label>
                                        <input type="radio" name="rbnEstadoNuevo" id="optionA" value="1" checked>
                                        ACTIVO
                                      </label>
                                    </div>
                                    <div class="radio-inline">
                                      <label>
                                        <input type="radio" name="rbnEstadoNuevo" id="optionI" value="2">
                                        INACTIVO
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnVolver" class="btn btn-success btnVentana" onclick="volver()" style="display: none;"><< Volver</button>
                <button id="btnSiguiente" class="btn btn-success btnVentana" onclick="siguiente()">Siguiente >></button>
                <button id="btnGuardarDocente" class="btn btn-primary btnVentana" onclick="guardarDocente()" style="display: none;">Guardar</button>
                <button class="btn btn-default btnVentana" onclick="limpiarFormularioDocente()" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>