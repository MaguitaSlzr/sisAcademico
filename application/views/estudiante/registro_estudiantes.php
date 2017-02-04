<?php if(isset($mensaje)){ ?>
	<div id="mensaje" class="alert alert-success mensajesDialog" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $mensaje; ?>
	</div>
<?php } ?>

<h3 class="tituloPrincipal">REGISTRO DE ESTUDIANTES</h3>

<button type="button" class="btn btn-primary" title="Adicionar" data-toggle="modal" data-target="#modalNuevoEstudiante">
	<span class="glyphicon glyphicon-plus"></span> Nuevo Estudiante
</button>
<!--<button type="button" class="btn btn-primary btnLarge" title="Reporte">
	<span class="glyphicon glyphicon-list"></span> Reporte
</button>-->
<br/>
<br/>
<form id='formBuscar' action="<?php echo base_url(); ?>estudiante/buscar_estudiante">
	<label for="txtParametroBusqueda">Buscar Registro:</label>
	<input type="text" class="form-control" id="txtParametroBusqueda" name="txtParametroBusqueda" placeholder="Ingresar el numero de ci, paterno, materno o nombre de un estudiante." autofocus/>
</form>

<br/>
<input type="hidden" id="urlBase" value="<?php echo base_url(); ?>"/>
<input type="hidden" id="urlRefrescar" value="<?php echo base_url(); ?>estudiante/registro_estudiantes"/>
<input type="hidden" id="urlEliminar" value="<?php echo base_url(); ?>estudiante/eliminarEstudiante"/>
<input type="hidden" id="urlBuscar" value="<?php echo base_url(); ?>estudiante/buscarEstudiante"/>
<input type="hidden" id="urlNuevo" value="<?php echo base_url(); ?>estudiante/nuevoEstudiante"/>

<div id="resultado">
	<?php $this->load->view('estudiante/include/include_lista_estudiante'); ?>
</div>

<?php $this->load->view('estudiante/modal/modal_ver_estudiante'); ?>
<?php $this->load->view('estudiante/modal/modal_nuevo_estudiante'); ?>
<?php $this->load->view('estudiante/modal/modal_editar_estudiante'); ?>

<script src="<?php echo base_url();?>resources/base/js/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url();?>resources/estudiante/js/registro_estudiantes.js"></script>