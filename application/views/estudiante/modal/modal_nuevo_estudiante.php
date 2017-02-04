<div class="modal fade" id="modalNuevoEstudiante">
    <div class="modal-dialog modal-personalizado">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" onclick="limpiarFormularioEstudiante()" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Nuevo Estudiante</h4>
            </div>
            <div class="modal-body">

                <div id="alertaCompletarCamposNuevo" class="alert alert-danger" style="display: none;">Complete todos los campos que tienen asterisco (*)</div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#datosPersonales" aria-controls="datosPersonales" role="tab" data-toggle="tab">Datos Personales</a></li>
                    <li role="presentation"><a href="#datosApoderado" aria-controls="datosApoderado" role="tab" data-toggle="tab">Apoderado</a></li>
                    <li role="presentation"><a href="#datosAcademicos" aria-controls="datosAcademicos" role="tab" data-toggle="tab">Asignar Curso</a></li>
                    <li role="presentation"><a href="#datosAcceso" aria-controls="datosAcceso" role="tab" data-toggle="tab">Datos Acceso</a></li>
                </ul>
                
                <!-- Tab panes -->
                <!--
                <?php echo form_open_multipart(base_url()."estudiante/guardarEstudiante")?>
                -->
                <form id="formNuevoEstudiante" action="<?php echo base_url();?>estudiante/guardarEstudiante" method="post" enctype="multipart/form-data">    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="datosPersonales">
                            <br/>
                            <div class="row">
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        <div class="form-group col-sm-12">
                                            <label for="txtRudeNuevo">RUDE</label>
                                            <input type="text" class="form-control" id="txtRudeNuevo" name="txtRudeNuevo" placeholder="Registro Unico De Estudiante"/>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="center">
                                        <div class="custom-input-file">
                                            <input type="file" id="files" name="files" class="input-file"/>
                                            <strong class="btn btn-default btn-xs" style="width: 150px;" >Subir Foto</strong>
                                        </div>
                                        <output id="list" class="list">
                                            <img src="<?php echo base_url();?>resources/base/img/avatar_estudiante.png" class="thumb img-responsive" alt="Fotografia" >
                                        </output>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <div class="form-group col-sm-7" style="padding-right: 2px;">                       
                                            <label for="txtCiNuevo">Cedula de Identidad</label>
                                            <input type="text" class="form-control" id="txtCiNuevo" name="txtCiNuevo" placeholder="Cedula de Identidad"/> 
                                        </div>
                                        <div class="form-group col-sm-5" style="padding-left: 2px;">   
                                            <label for="selExpedidoNuevo">Expedido</label>                       
                                            <select name="selExpedidoNuevo" id="selExpedidoNuevo" class="form-control">
                                                <?php foreach ($expedidos as $e) { ?>
                                                    <option value="<?php echo $e->uexp_id;?>"><?php echo $e->uexp_denominacion;?></option>
                                                <?php } ?>
                                            </select>  
                                        </div>
                                    </td>
                                </tr>
                            </table>
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
                                <div class="col-sm-6 form-inline">
                                    <label>Fecha de Nacimiento<span>*</span></label><br/>
                                    <select id="selNuevoDia" name="selNuevoDia" class="form-control input-sm">
                                      <?php for ($i=1; $i <=31 ; $i++) { ?> 
                                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                      <?php } ?>
                                    </select>
                                    <select id="selNuevoMes" name="selNuevoMes" class="form-control input-sm">
                                      <?php for ($i=1; $i <= 12 ; $i++) { ?> 
                                          <option value="<?php echo $i;?>"><?php echo $meses[$i-1];?></option>
                                      <?php } ?>
                                    </select>
                                    <select id="selNuevoAnio" name="selNuevoAnio" class="form-control input-sm">
                                      <?php for ($i=1990; $i <=2020 ; $i++) { ?> 
                                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Género<span>*</span></label><br/>
                                    <label class="radio-inline">                                      
                                        <input type="radio" name="rbnGeneroNuevo" id="optionM" value="2" checked>
                                        Masculino                                      
                                    </label>
                                    <label class="radio-inline">                                      
                                        <input type="radio" name="rbnGeneroNuevo" id="optionF" value="1">
                                        Femenino                                      
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="datosApoderado">
                            <br/>
                            <div class="row">
                                 <div class="form-group col-sm-8">
                                    <label for="txtNombreApoderadoNuevo">Nombre completo del apoderado:</label>
                                    <input type="text" class="form-control" id="txtNombreApoderadoNuevo" name="txtNombreApoderadoNuevo" placeholder="Nombre completo del apoderado">
                                </div>
                                <div class="form-group col-sm-4" style="padding-left: 2px;">   
                                    <label for="selParentescoNuevo">Parentesco:</label>                       
                                    <select name="selParentescoNuevo" id="selParentescoNuevo" class="form-control">
                                        <option value="PADRE">PADRE</option>
                                        <option value="MADRE">MADRE</option>
                                        <option value="TUTOR">TUTOR</option>
                                    </select>  
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
                        </div>
                        <div role="tabpanel" class="tab-pane" id="datosAcademicos">
                            <br/>
                            <div class="row">
                                <div class="form-group col-sm-5">
                                    <label>Seleccione Curso Asignado:</label>
                                </div>
                                <div class="form-group col-sm-7">
                                    <select id="selCursoNuevo" name="selCursoNuevo" class="form-control">
                                        <option value="0">-- Seleccione un curso --</option>
                                      <?php foreach ($cursos as $c) { ?>
                                        <option value="<?php echo $c->cur_id;?>"><?php echo $c->cur_descripcion;?> - Paralelo: <?php echo $c->cur_paralelo;?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 alert alert-info">
                                    <p style="text-align : justify;"><strong>ATENCION.</strong> Puede asignar un curso al estudiante posteriormente.<br/>
                                    </p>                                       
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="datosAcceso">
                            <br/>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtUsuarioNuevo">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="txtUsuarioNuevo" name="txtUsuarioNuevo" placeholder="Nombre de usuario">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default col-sm-12 btn-block btnGeneraUsuario" style="margin-top: 23px;" data-toogle="tooltip" data-placement="bottom" title="El Nombre de Usuario es generado tomando en cuenta la inicial del primer nombre y el apellido paterno.">
                                        Generar Usuario
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtPasswordNuevo">Password</label>
                                    <input type="password" class="form-control" id="txtPasswordNuevo" name="txtPasswordNuevo" placeholder="Password">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-default col-sm-12 btn-block btnGeneraPassword" style="margin-top: 23px;" data-toogle="tooltip" data-placement="bottom" title="El password generado esta definido por las iniciales de su nombre completo y su cedula. Paterno-Materno-Nombre-CI. Ejemplo: Juan Perez Gomez con CI 123456, su password es PGJ123456">
                                        Generar Password
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="txtPasswordConfirmar">Confirmar Password</label>
                                    <input type="password" class="form-control" id="txtPasswordConfirmar" name="txtPasswordConfirmar" placeholder="Repetir Password">
                                </div>
                            </div>
                            <div class="row alert alert-warning">
                                <div class="col-sm-12">
                                    <p style="text-align : justify;"><strong>ADVERTENCIA!!!</strong> En caso de GUARDAR el registro sin llenar los campos NOMBRE DE USUARIO y PASSWORD, el sistema los genera automaticamente en función al nombre, apellido paterno, apellido materno y cedula de identidad.<br/>
                                    </p>                                       
                                </div>
                            </div>
                        </div>
                    </div>                
                </form>
                <!--
                <?php echo form_close()?>
                -->
            </div>
            <div class="modal-footer">
                <button id="btnGuardarEstudiante" class="btn btn-primary" onclick="guardarEstudiante()"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Salir</button>
                <button id="btnReporte" class="btn btn-success" onclick="siguiente()"><span class="glyphicon glyphicon-list"></span> Guardar y Generar Reporte</button>
                <button class="btn btn-default btnVentana" onclick="limpiarFormularioEstudiante()" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>