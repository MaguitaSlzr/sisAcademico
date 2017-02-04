<div class="modal fade" id="modalEditarDocente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" onclick="limpiarFormularioDocente()" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Docente</h4>
            </div>
            <div class="modal-body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#editDatosPersonales" aria-controls="editDatosPersonales" role="tab" data-toggle="tab">Datos Personales</a></li>
                    <li role="presentation"><a href="#editPassword" aria-controls="editPassword" role="tab" data-toggle="tab">Cambiar Password</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="editDatosPersonales">      
                        <br/>
                        <form id="editarDatosPersonalesDocente" action="<?php echo base_url();?>docente/actualizarDocente1" method="post" >
                            <input type="hidden" class="idEditar" name="idEditar">
                            <div class="row">
                                <div class="form-group col-sm-8" style="padding-right: 2px;">                       
                                    <label for="ciEditar">Cedula de Identidad<span>*</span></label>
                                    <input type="text" class="form-control" id="ciEditar" name="ciEditar" placeholder="Cedula de Identidad" required/> 
                                </div>
                                <div class="form-group col-sm-4" style="padding-left: 2px;">   
                                    <label for="expedidoEditar">Expedido</label>                       
                                    <select name="expedidoEditar" id="expedidoEditar" class="form-control">
                                        <?php foreach ($expedidos as $e) { ?>
                                            <option value="<?php echo $e->uexp_id;?>"><?php echo $e->uexp_denominacion;?></option>
                                        <?php } ?>
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="nombreEditar">Nombres<span>*</span></label>
                                    <input type="text" class="form-control" id="nombreEditar" name="nombreEditar" placeholder="Nombres" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="paternoEditar">Apellido Paterno<span>*</span></label>
                                    <input type="text" class="form-control" id="paternoEditar" name="paternoEditar" placeholder="Apellido Paterno" required/>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="maternoEditar">Apellido Materno</label>
                                    <input type="text" class="form-control" id="maternoEditar" name="maternoEditar" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="row">
                                 <div class="form-group col-sm-6">
                                    <label for="direccionEditar">Direccion</label>
                                    <input type="text" class="form-control" id="direccionEditar" name="direccionEditar" placeholder="Direccion">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="emailEditar">Correo Electronico</label>
                                    <input type="email" class="form-control" id="emailEditar" name="emailEditar" placeholder="Correo electronico">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="telefonoEditar">Telefono</label>
                                    <input type="text" class="form-control" id="telefonoEditar" name="telefonoEditar" placeholder="Telefono">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="celularEditar">Celular</label>
                                    <input type="text" class="form-control" id="celularEditar" name="celularEditar" placeholder="Celular">
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Género</label>
                                </div>
                                <div class="col-sm-10" >
                                    <label class="radio-inline">                                      
                                        <input type="radio" name="generoEditar" id="optionM" value="2">
                                        Masculino                                      
                                    </label>
                                    <label class="radio-inline">                                      
                                        <input type="radio" name="generoEditar" id="optionF" value="1">
                                        Femenino                                      
                                    </label>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="nombreUsuarioEditar">Nombre de Usuario<span>*</span></label>
                                    <input type="text" class="form-control" id="nombreUsuarioEditar" name="nombreUsuarioEditar" placeholder="Nombre de usuario" required>
                                </div>
                            </div>
                            <div class="row alert alert-info">
                                <div class="col-sm-12">
                                    <p>Estado actual del docente.</p>
                                </div>
                                <div class="col-sm-12">
                                    <div class="radio-inline">
                                      <label>
                                        <input type="radio" name="estadoUsuarioEditar" id="optionA" value="1">
                                        ACTIVO
                                      </label>
                                    </div>
                                    <div class="radio-inline">
                                      <label>
                                        <input type="radio" name="estadoUsuarioEditar" id="optionI" value="2">
                                        INACTIVO
                                      </label>
                                    </div>
                                </div>
                            </div>
                            <button id="btnActualizarDocente" class="btn btn-primary" onclick="actualizarDatosPersonalesDocente()">Guardar Cambios</button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="editPassword">
                        <br/>
                        <form id="editarPasswordDocente" action="<?php echo base_url();?>docente/actualizarDocente2" method="post">
                            <input type="hidden" class="idEditar" name="idEditar">                            
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="passwordUsuarioEditar">Password<span>*</span></label>
                                    <input type="password" class="form-control" id="passwordUsuarioEditar" name="passwordUsuarioEditar" placeholder="Password" required>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default col-sm-12 btn-block generaPasswordEditar" style="margin-top: 23px;" data-toogle="tooltip" data-placement="bottom" title="El password generado esta definido por las iniciales de su nombre completo y su cedula. Paterno-Materno-Nombre-CI. Ejemplo: Juan Perez Gomez con CI 123456, su password es PGJ123456">
                                        Generar Password
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="confirmarPasswordEditar">Confirmar Password<span>*</span></label>
                                    <input type="password" class="form-control" id="confirmarPasswordEditar" name="confirmarPasswordEditar" placeholder="Repetir Password" required>
                                </div>
                            </div>
                            <div class="alert alert-warning">
                                <p><strong>ADVERTENCIA!!!</strong> El sistema registra los cambios realizados a los registros de usuarios (incluye password). Para evitar problemas realize el cambio del password previa autorización de su inmediato superior o dueño de la cuenta.</p>
                            </div>                            
                            <button id="btnActualizarDocente" class="btn btn-primary" onclick="actualizarPasswordDocente()">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btnVentana" onclick="limpiarFormularioDocente()" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>