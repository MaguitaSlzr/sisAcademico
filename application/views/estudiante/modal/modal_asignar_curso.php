<div class="modal fade" id="modalAsignarCurso">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" onclick="refrescarVentana()" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Asignar Curso</h4>
            </div>
            <div class="modal-body">
                <form id="formCambioCursoEstudiante" action="<?php echo base_url();?>estudiante/cambiarEstudianteCurso" method="post">
                    <input type="hidden" id="txtIdAsignarEstudiante" name="txtIdAsignarEstudiante" />
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label>Estudiante: </label>
                        </div>
                        <div class="form-group col-sm-9">
                            <p id="estudianteCambioCurso"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label>Asignar A:</label>
                        </div>
                        <div class="form-group col-sm-9">
                            <select id="selCursoCambio" name="selCursoCambio" class="form-control">
                              <?php foreach ($cursos as $c) { ?>
                                <option value="<?php echo $c['curso']->cur_id;?>"><?php echo $c['curso']->cur_descripcion;?> - PARALELO: <?php echo $c['curso']->cur_paralelo;?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnGuardarCambiosEstudiante" class="btn btn-primary" onclick="realizarAsignacionEstudiante()"><span class="glyphicon glyphicon-log-in"></span> Asignar</button>
                <button class="btn btn-default btnVentana" onclick="refrescarVentana()" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>