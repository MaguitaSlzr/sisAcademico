<div class="modal fade" id="modalEditarEstudiante">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" onclick="limpiarFormularioEstudiante()" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Estudiante</h4>
            </div>
            <div class="modal-body">

                <div id="alertaCompletarCamposEditar" class="alert alert-danger" style="display: none;">Complete todos los campos que tienen asterisco (*)</div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#EditarDatosPersonales" aria-controls="EditarDatosPersonales" role="tab" data-toggle="tab">Datos Personales</a></li>
                    <li role="presentation"><a href="#EditarDatosApoderado" aria-controls="EditarDatosApoderado" role="tab" data-toggle="tab">Apoderado</a></li>
                    <li role="presentation"><a href="#EditarDatosAcademicos" aria-controls="EditarDatosAcademicos" role="tab" data-toggle="tab">Asignar Curso</a></li>
                    <li role="presentation"><a href="#EditarDatosAcceso" aria-controls="EditarDatosAcceso" role="tab" data-toggle="tab">Datos Acceso</a></li>
                </ul>
                
                <!-- Tab panes -->
                <form id="formEditarEstudiante" action="<?php echo base_url();?>estudiante/editarEstudiante" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="idEditar" name="idEditar">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="EditarDatosPersonales">
                            <br/>

                            <div class="row">
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <div class="form-group col-sm-12">
                                            <label for="txtRudeEditar">RUDE</label>
                                            <input type="text" class="form-control" id="txtRudeEditar" name="txtRudeEditar" placeholder="Registro Unico De Estudiante"/>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="center">
                                        <div class="custom-input-file">
                                            <input type="file" id="filesEditar" name="filesEditar" class="input-file"/>
                                            <strong class="btn btn-default btn-xs" style="width: 150px;" >Cambiar Foto</strong>
                                        </div>
                                        <output id="listEditar" class="list">
                                            <img src="#" class="thumb img-responsive imageEditar" alt="Fotografia" >
                                        </output>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group col-sm-7" style="padding-right: 2px;">                       
                                            <label for="txtCiEditar">Cedula de Identidad</label>
                                            <input type="text" class="form-control" id="txtCiEditar" name="txtCiEditar" placeholder="Cedula de Identidad"/> 
                                        </div>
                                        <div class="form-group col-sm-5" style="padding-left: 2px;">   
                                            <label for="selExpedidoEditar">Expedido</label>                       
                                            <select name="selExpedidoEditar" id="selExpedidoEditar" class="form-control">
                                                <?php foreach ($expedidos as $e) { ?>
                                                    <option value="<?php echo $e->uexp_id;?>"><?php echo $e->uexp_denominacion;?></option>
                                                <?php } ?>
                                            </select>  
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </div>

                            <!--
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="txtRudeEditar">RUDE</label>
                                    <input type="text" class="form-control" id="txtRudeEditar" name="txtRudeEditar" placeholder="Registro Unico De Estudiante"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8" style="padding-right: 2px;">                       
                                    <label for="txtCiEditar">Cedula de Identidad</label>
                                    <input type="text" class="form-control" id="txtCiEditar" name="txtCiEditar" placeholder="Cedula de Identidad"/> 
                                </div>
                                <div class="form-group col-sm-4" style="padding-left: 2px;">   
                                    <label for="selExpedidoEditar">Expedido</label>                       
                                    <select name="selExpedidoEditar" id="selExpedidoEditar" class="form-control">
                                        <?php foreach ($expedidos as $e) { ?>
                                            <option value="<?php echo $e->uexp_id;?>"><?php echo $e->uexp_denominacion;?></option>
                                        <?php } ?>
                                    </select>  
                                </div>
                            </div>
                            -->
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="txtNombreEditar">Nombres<span>*</span></label>
                                    <input type="text" class="form-control" id="txtNombreEditar" name="txtNombreEditar" placeholder="Nombres" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="txtPaternoEditar">Apellido Paterno<span>*</span></label>
                                    <input type="text" class="form-control" id="txtPaternoEditar" name="txtPaternoEditar" placeholder="Apellido Paterno" required/>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtMaternoEditar">Apellido Materno</label>
                                    <input type="text" class="form-control" id="txtMaternoEditar" name="txtMaternoEditar" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-inline">
                                    <label>Fecha de Nacimiento<span>*</span></label><br/>
                                    <select id="selEditarDia" name="selEditarDia" class="form-control input-sm">
                                      <?php for ($i=1; $i <=31 ; $i++) { ?> 
                                          <option value="<?php echo $i<10?'0'.$i:$i;?>"><?php echo $i;?></option>
                                      <?php } ?>
                                    </select>
                                    <select id="selEditarMes" name="selEditarMes" class="form-control input-sm">
                                      <?php for ($i=1; $i <=12 ; $i++) { ?> 
                                          <option value="<?php echo $i<10?'0'.$i:$i;?>"><?php echo $meses[$i-1];?></option>
                                      <?php } ?>
                                    </select>
                                    <select id="selEditarAnio" name="selEditarAnio" class="form-control input-sm">
                                      <?php for ($i=1990; $i <=2020 ; $i++) { ?> 
                                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Género<span>*</span></label><br/>
                                    <label class="radio-inline">                                      
                                        <input type="radio" name="rbnGeneroEditar" id="optionM" value="2" checked>
                                        Masculino                                      
                                    </label>
                                    <label class="radio-inline">                                      
                                        <input type="radio" name="rbnGeneroEditar" id="optionF" value="1">
                                        Femenino                                      
                                    </label>
                                </div>
                            </div>
                            <br/>
                            <div class="row alert alert-info">
                                <div class="col-sm-12">
                                    <p>Estado actual del estudiante</p>
                                </div>
                                <div class="col-sm-12">
                                    <div class="radio-inline">
                                      <label>
                                        <input type="radio" name="rbnEstadoEditar" id="optionA" value="1" checked>
                                        ACTIVO
                                      </label>
                                    </div>
                                    <div class="radio-inline">
                                      <label>
                                        <input type="radio" name="rbnEstadoEditar" id="optionI" value="2">
                                        INACTIVO
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="EditarDatosApoderado">
                            <br/>
                            <div class="row">
                                 <div class="form-group col-sm-8">
                                    <label for="txtNombreApoderadoEditar">Nombre completo del apoderado:</label>
                                    <input type="text" class="form-control" id="txtNombreApoderadoEditar" name="txtNombreApoderadoEditar" placeholder="Nombre completo del apoderado">
                                </div>
                                <div class="form-group col-sm-4" style="padding-left: 2px;">   
                                    <label for="selParentescoEditar">Parentesco:</label>                       
                                    <select name="selParentescoEditar" id="selParentescoEditar" class="form-control">
                                        <option value="PADRE">PADRE</option>
                                        <option value="MADRE">MADRE</option>
                                        <option value="TUTOR">TUTOR</option>
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                 <div class="form-group col-sm-6">
                                    <label for="txtDireccionEditar">Direccion</label>
                                    <input type="text" class="form-control" id="txtDireccionEditar" name="txtDireccionEditar" placeholder="Direccion">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtEmailEditar">Correo Electronico</label>
                                    <input type="email" class="form-control" id="txtEmailEditar" name="txtEmailEditar" placeholder="Correo electronico">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="txtTelefonoEditar">Telefono</label>
                                    <input type="text" class="form-control" id="txtTelefonoEditar" name="txtTelefonoEditar" placeholder="Telefono">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="txtCelularEditar">Celular</label>
                                    <input type="text" class="form-control" id="txtCelularEditar" name="txtCelularEditar" placeholder="Celular">
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="EditarDatosAcademicos">
                            <br/>
                            <div class="row">
                                <div class="form-group col-sm-5">
                                    <label>Seleccione Curso Asignado:</label>
                                </div>
                                <div class="form-group col-sm-7">
                                    <select id="selCursoEditar" name="selCursoEditar" class="form-control">
                                        <option value="0">-- Seleccione un curso --</option>
                                      <?php foreach ($cursos as $c) { ?>
                                        <option value="<?php echo $c->cur_id;?>"><?php echo $c->cur_descripcion;?> - Paralelo: <?php echo $c->cur_paralelo;?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="EditarDatosAcceso">
                            <br/>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtUsuarioEditar">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="txtUsuarioEditar" name="txtUsuarioEditar" placeholder="Nombre de usuario">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default col-sm-12 btn-block btnGeneraUsuarioEditar" style="margin-top: 23px;" data-toogle="tooltip" data-placement="bottom" title="El Nombre de Usuario es generado tomando en cuenta la inicial del primer nombre y el apellido paterno.">
                                        Generar Usuario
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtPasswordEditar">Password</label>
                                    <input type="password" class="form-control" id="txtPasswordEditar" name="txtPasswordEditar" placeholder="Password">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default col-sm-12 btn-block btnGeneraPasswordEditar" style="margin-top: 23px;" data-toogle="tooltip" data-placement="bottom" title="El password generado esta definido por las iniciales de su nombre completo y su cedula. Paterno-Materno-Nombre-CI. Ejemplo: Juan Perez Gomez con CI 123456, su password es PGJ123456">
                                        Generar Password
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtPasswordConfirmarEditar">Confirmar Password</label>
                                    <input type="password" class="form-control" id="txtPasswordConfirmarEditar" name="txtPasswordConfirmarEditar" placeholder="Repetir Password">
                                </div>
                            </div>
                            <div class="row alert alert-info">
                                <div class="col-sm-12">
                                    <p><strong>ATENCION!!!</strong> Para modificar el password del estudiante, ingrese uno nuevo.</p>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnGuardarCambiosEstudiante" class="btn btn-primary" onclick="guardarCambiosEstudiante()"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Salir</button>
                <button id="btnReporte" class="btn btn-success" onclick="guardarImprimirReporteEstudiante()"><span class="glyphicon glyphicon-list"></span> Guardar y Generar Reporte</button>
                <button class="btn btn-default btnVentana" onclick="limpiarFormularioEstudiante()" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>