<?php if(isset($mensaje)){ ?>
	<div id="mensaje" class="alert alert-success mensajesDialog" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $mensaje; ?>
	</div>
<?php } ?>

<h3 class="tituloPrincipal">REGISTRO DE DOCENTES</h3>

<button type="button" class="btn btn-primary btnLarge" title="Adicionar" data-toggle="modal" data-target="#modalNuevoDocente">
	<span class="glyphicon glyphicon-plus"></span> Nuevo Docente
</button>
<!--<button type="button" class="btn btn-primary btnLarge" title="Reporte">
	<span class="glyphicon glyphicon-list"></span> Reporte
</button>-->
<br/>
<br/>
<form id='formBuscar' action="<?php echo base_url(); ?>docente/buscar_docente">
	<label for="txtParametroBusqueda">Buscar Registro:</label>
	<input type="text" class="form-control" id="txtParametroBusqueda" name="txtParametroBusqueda" placeholder="Ingresar el numero de ci, paterno, materno o nombre de un docente." autofocus/>
</form>

<br/>
<input type="hidden" id="urlRefrescar" value="<?php echo base_url(); ?>docente/registro_docentes"/>
<input type="hidden" id="urlEliminar" value="<?php echo base_url(); ?>docente/eliminarDocente"/>
<input type="hidden" id="urlBuscar" value="<?php echo base_url(); ?>docente/buscarDocente"/>
<input type="hidden" id="urlNuevo" value="<?php echo base_url(); ?>docente/nuevoDocente"/>

<div id="resultado">
	<?php $this->load->view('docente/include/include_lista_docente'); ?>
</div>
<?php $this->load->view('docente/modal/modal_ver_docente'); ?>
<?php $this->load->view('docente/modal/modal_nuevo_docente'); ?>
<?php $this->load->view('docente/modal/modal_editar_docente'); ?>

<script src="<?php echo base_url();?>resources/base/js/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url();?>resources/docente/js/registro_docentes.js"></script>
