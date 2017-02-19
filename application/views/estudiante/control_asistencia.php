<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/menu'); ?>
<h3 class="tituloPrincipal">CONTROL DE ASISTENCIA</h3>

<div class="row">
    <form id="form-curso-estudiantes" action="<?php echo base_url(); ?>estudiante/guardar_registro_asistencia" method="post">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        SELECCIÓN CURSO ESTUDIANTES
                    </h3>
                </div>
                <div class="panel-body panel-lista-curso">
                    <div class="form-group">
                        <label for="curso">Seleccione un Curso:</label>
                        <input id="urlListEstByCurso" type="hidden" value="<?php echo base_url(); ?>estudiante/lista_estudiantes_por_curso"/>
                        <select id="selCurso" class="form-control">
                            <?php foreach ($cursos as $c) { ?>
                                <option value="<?php echo $c['curso']->cur_id; ?>"><?php echo $c['curso']->cur_descripcion; ?></option>
                            <?php } ?>    
                        </select>
                    </div>
                    <div class="pnlListEstudiantes" style="border: solid #aaa 1px; overflow: scroll; height: 500px;">                
                        <?php $i = 1; ?>
                        <?php foreach ($cursos[0]['estudiantes'] as $e) { ?>
                            <ul id="check-list-box" class="list-group checked-list-box">
                                <li class="list-group-item est-item" id="<?php echo $i ?>" value="<?php echo $e->est_id ?>"><span class="est-nombre"><?php echo ($i++) . '. ' . $e->est_paterno . ' ' . $e->est_materno . ' ' . $e->est_nombre; ?></span></li>
                            </ul>
                        <?php } ?>      
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        ESTUDIANTES SELECCIONADOS
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="media">
                        <ul id="est-list-box" class="list-group">
                            <!-- ESTUDIANTES SELECCIONADOS -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        REGISTRAR FALTA
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="fecha">Seleccionar las fechas de las faltas</label>
                            <!--
                            <input type="text" class="form-control fecha" id="fecha" name="fecha">
                            -->
                            <div class="row">
                                <div class="datepicker-center col-xs-12 col-sm-6" style="text-align: center;">
                                    <div id="fecha" style="display:inline-block;"></div>
                                    <br/><br/>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Fechas seleccionadas</div>
                                        <div class="panel-body">
                                            <ul class="list-group content-fechas-atrasos">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="falta">Tipo de Falta</label>
                            <select id="falta" name="falta" class="form-control">
                                <?php foreach ($faltas as $falta) { ?>
                                    <option value="<?php echo $falta->ptf_id; ?>"><?php echo $falta->ptf_descripcion; ?></option>
                                <?php } ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="materia">Materia</label>
                            <select id="materia" name="materia" class="form-control">
                                <?php foreach ($materias as $materia) { ?>
                                    <option value="<?php echo $materia->mat_id; ?>"><?php echo $materia->mat_descripcion; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Observación</label>
                            <textarea id="observacion" name="observacion" rows="12" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalMensaje">Registrar</button>
                        <a href="<?php echo base_url() ?>estudiante/form_control_asistencia" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
<?php $this->load->view('template/footer'); ?>
<script src="<?php echo base_url(); ?>resources/estudiante/js/control-asistencia.js"></script>
