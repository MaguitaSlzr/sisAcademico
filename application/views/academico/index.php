<div class="container">
    
    <!-- Modal Ver -->
    <div class="modal fade" id="modalVer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hiden="true" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detalle Estudiante</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>ID </th>
                            <td><span id="idVer"></span></td>
                        </tr>
                        <tr>
                            <th>Nombre </th>
                            <td><span id="nombreVer"></span></td>
                        </tr>
                        <tr>
                            <th>Edad </th>
                            <td><span id="edadVer"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modificar/Editar -->
    <div class="modal fade" id="modalEditar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hiden="true" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Estudiante</h4>
                </div>
                <div class="modal-body">
                    <form id="formEditar" method="POST">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="idEditarCampo" name="idEditar" disabled>
                            <input type="hidden" id="idEditar" name="idEditar">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombreEditar" name="nombreEditar" placeholder="Ingrese un nombre por favor">
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="number" class="form-control" id="edadEditar" name="edadEditar" placeholder="Ingrese una edad por favor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a id="btnActualizar" href="<?php echo base_url() ?>index.php/academico/updateEstudiante" class="btn btn-primary">Guardar</a>
                    <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <h1>SISTEMA ACADEMICO</h1>
    
    <div id="mensaje"></div>

    <form id="form" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese un nombre por favor">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese una edad por favor">
        </div>

        <a id="btnGuardar" href="<?php echo base_url() ?>index.php/academico/saveEstudiante" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
        </a>

        <input type="button" onclick="limpiarForm()" class="btn btn-default" value="Nuevo" />
    </form>

    <hr>
    <input type="hidden" id="cargarTabla" value="<?php echo base_url() ?>index.php/academico/listEstudiantes">
    <input type="hidden" id="urlEliminar" value="<?php echo base_url() ?>index.php/academico/deleteEstudiante">
    <input type="hidden" id="urlBuscar" value="<?php echo base_url() ?>index.php/academico/buscarEstudiante">
    <div id="load"></div>
</div>
<script src="<?php echo base_url();?>resources/modulo_academico/js/main.js"></script>
<!-- El codigo JQuery se encuentra en: crud_codeigniter/resources/modulo_academico/js/main.js -->
<!-- El controlador es: crud_codeigniter/application/controllers/Academico.php -->
