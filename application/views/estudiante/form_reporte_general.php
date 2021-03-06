<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/menu'); ?>
<h3 class="tituloPrincipal">Generar Reporte Estudiante</h3>
<form action="<?php echo base_url('estudiante/generar_reporte_general'); ?>" method="post" target="_blank">
    <div class="row">
        <!-- begin controles de busqueda -->
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Seleccionar estudiante
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="curso">Seleccionar curso</label>
                        <input type="hidden" id="url_get_estudiantes" value="<?php echo base_url('estudiante/ajax_all_estudiantes'); ?>">
                        <select id="curso" name="estudiante" class="form-control">
                            <option value="0">--- Seleccionar un curso ---</option>
                            <?php foreach ($cursos as $curso) { ?>
                                <option value="<?php echo $curso->cur_id; ?>"><?php echo $curso->cur_descripcion; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estudiante">Seleccionar estudiante</label>
                        <input type="hidden" id="url_find_estudiante" value="<?php echo base_url('estudiante/ajax_find_by_id_estudiante'); ?>">
                        <select id="estudiante" name="estudiante" class="form-control" disabled="true">
                            <option value="0">--- Seleccionar un estudiante ---</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <!-- end controles de busqueda -->

        <!-- begin fotografia -->
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Fotografia
                    </h3>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="base-url-foto" value="<?php echo base_url() ?>uploads/">
                    <img id="fotografia" src="<?php echo base_url(); ?>resources/base/img/avatar_estudiante.png" class="thumb img-responsive" alt="Fotografia" style="margin: 0 auto;" />		  
                </div>
            </div>
        </div>
        <!-- end fotografia -->

        <div class="col-md-12" style="clear: both;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Previsualizacion Estudiante
                    </h3>
                </div>
                <div class="panel-body">
                    <!--
                      <div class="row">
                            <div class="col-sm-6">
                              <table class="table">
                                    <tr>
                                            <th>Curso: </th>
                                            <td id="prev-curso"></td>
                                    </tr>
                                    <tr>
                                            <th>Paralelo: </th>
                                            <td id="prev-paralelo"></td>
                                    </tr>
                                    <tr>
                                            <th>Nombre completo: </th>
                                            <td id="prev-nombre"></td>
                                    </tr>
                              </table>
                            </div>
                            <div class="col-sm-6">
                                    foto
                            </div>
                      </div>
                    -->
                    <div class="row">
                        <!-- begin: asistencia -->
                        <div class="col-sm-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Asistencia</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="table-asistencia" class="table">
                                        <tr>
                                            <th>Total atrasos: </th>
                                            <td><span id="prev-atrasos" class="badge" ></span></td>
                                            <td><a href="#" class="btn btn-default btn-xs disabled">Detalle</a></td>
                                        </tr>
                                        <tr>
                                            <th>Total fugas: </th>
                                            <td><span id="prev-fugas" class="badge"></span></td>
                                            <td><a href="#" class="btn btn-default btn-xs disabled">Detalle</a></td>
                                        </tr>
                                        <tr>
                                            <th>Total faltas injustificadas: </th>
                                            <td><span id="prev-faltas-injustificadas" class="badge"></span></td>
                                            <td><a href="#" class="btn btn-default btn-xs disabled">Detalle</a></td>
                                        </tr>
                                        <tr>
                                            <th>Total faltas justificadas: </th>
                                            <td><span id="prev-faltas-justificadas" class="badge"></span></td>
                                            <td><a href="#" class="btn btn-default btn-xs disabled">Detalle</a></td>
                                        </tr>
                                        <tr>
                                            <th>Total Permisos: </th>
                                            <td><span id="prev-permisos" class="badge"></span></td>
                                            <td><a href="#" class="btn btn-default btn-xs disabled">Detalle</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: asistencia -->

                        <!-- begin: disciplinario -->
                        <div class="col-sm-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Disciplinario</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table" id="tabla-indisciplina">
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: disciplinario -->
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="float: right;">Generar Reporte</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $this->load->view('template/footer'); ?>
<script src="<?php echo base_url(); ?>resources/estudiante/js/form-reporte-general.js"></script>