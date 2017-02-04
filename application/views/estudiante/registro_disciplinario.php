<?php if(isset($mensaje)){ ?>
	<div id="mensaje" class="alert alert-success mensajesDialog" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $mensaje; ?>
	</div>
<?php } ?>

<h3 class="tituloPrincipal">REGISTRO DISCIPLINARIO</h3>

<br/>
<input type="hidden" id="urlBase" value="<?php echo base_url(); ?>"/>
<input type="hidden" id="urlRefrescar" value="<?php echo base_url(); ?>estudiante/registro_estudiantes"/>
<input type="hidden" id="urlEliminar" value="<?php echo base_url(); ?>estudiante/eliminarEstudiante"/>
<input type="hidden" id="urlBuscar" value="<?php echo base_url(); ?>estudiante/buscarEstudiante"/>
<input type="hidden" id="urlNuevo" value="<?php echo base_url(); ?>estudiante/nuevoEstudiante"/>

<div id="resultado">
	<?php $this->load->view('estudiante/include/include_lista_disciplinario'); ?>
</div>

<script src="<?php echo base_url();?>resources/base/js/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url();?>resources/estudiante/js/registro_estudiantes.js"></script>