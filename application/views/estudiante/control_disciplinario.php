<script type="text/javascript" src="<?php echo base_url(); ?>resources/base/js/control_disciplinario.js"></script>
<?php if (isset($mensaje)) { ?>
    <div id="mensaje" class="alert alert-success mensajesDialog" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $mensaje; ?>
    </div>
<?php } ?>
<h3 class="tituloPrincipal">CONTROL DISCIPLINARIO</h3>
<form id='formDisciplinario' action="<?php echo base_url(); ?>estudiante/guarda_disciplinario" method="post">
    <div class="row">
        <div class="col-md-5">
            <input id="urlListEstByCurso" type="hidden" value="<?php echo base_url(); ?>estudiante/lista_estudiantes_por_curso"/>
            <select id="selCurso" class="form-control">
                <?php foreach ($cursos as $c) { ?>
                    <option value="<?php echo $c['curso']->cur_id; ?>"><?php echo $c['curso']->cur_descripcion; ?></option>
                <?php } ?>    
            </select>
            <br/>
            <div class="panel panel-default">
                <div class="panel-body pnlListEstudiantes">                
                    <?php $i = 1; ?>
                    <?php foreach ($cursos[0]['estudiantes'] as $e) { ?>
                        <ul id="check-list-box" class="list-group checked-list-box">
                            <li class="list-group-item est-item" id="<?php echo $i ?>" value="<?php echo $e->est_id ?>"><span class="est-nombre"><?php echo ($i++) . '. ' . $e->est_paterno . ' ' . $e->est_materno . ' ' . $e->est_nombre; ?></span></li>
                        </ul>
                    <?php } ?>       
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        ESTUDIANTES IMPLICADOS
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
                            REGISTRO DE CASO
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datepicker">Fecha</label>
                                    <input type="text" class="form-control datepicker-input" id="datepicker" name="fecha" placeholder="FECHA">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="responsable">Caso atendido por</label>                            
                                     <select id="responsable" name="responsable" class="form-control">
                                         <option value="0">-- Seleccione un profesor --</option>-->
                                    <?php //foreach ($profesores as $p) { ?>
                                    <!--<option value="--><?php //echo $p->pro_id;                ?><!--">--><?php //echo $p->pro_paterno.' '.$p->pro_materno.' '.$p->pro_nombre;                ?><!--</option>
                                    <?php //}  ?>
                            </select>-->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="falta">Caso</label>
                                    <?php foreach ($faltas as $f) { ?>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="falta" value="<?php echo $f->ptd_id; ?>" >
                                                <?php echo $f->ptd_descripcion; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="relacion">Relación del hecho</label>
                            <textarea id="relacion" name="relacion" rows="12" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="solucion">Solución</label>
                            <textarea id="solucion" name="solucion" rows="12" class="form-control"></textarea>
                        </div>
                        <!--<button class="btn btn-success">Generar Citación</button>-->
                        <!--<button class="btn btn-success">Generar Carta de Compromiso</button>-->
                        
                        <div class="form-group" style="float: right;">
                            <button class="btn btn-primary" id="get-checked-data">Enviar Datos</button>
                            <button id="btnGuardarEstudiante" class="btn btn-primary" onclick="guardarDisciplinario()"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Salir</button>
                            <button class="btn btn-default">Cancelar</button>
                        </div>
                    </div>
                    <!--
                    <pre id="display-json"></pre>
                    -->
                </div>   
        </div>
    </div>
</form>
<script src="<?php echo base_url(); ?>resources/base/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>resources/estudiante/js/control_disciplinario.js"></script>
