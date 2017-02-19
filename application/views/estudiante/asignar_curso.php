<!--
<?php foreach ($cursos as $c) {
	echo "--- CURSO ---".$c['curso']->cur_sigla."<br/>";
	
	foreach ($c['estudiantes'] as $e) {
		echo $e->est_nombre.' '.$e->est_paterno.'<br/>';	
	}
	
} ?>
-->
<h3 class="tituloPrincipal">ASIGNAR ESTUDIANTE CURSO</h3>
<input type="hidden" id="urlRefrescar" value="<?php echo base_url(); ?>estudiante/asignar_curso"/>
<input type="hidden" id="urlDesagregar" value="<?php echo base_url(); ?>estudiante/desagregar_estudiante"/>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-primary">
		  <div class="panel-heading">ESTUDIANTES SIN ASIGNAR CURSO</div>
		  <div class="panel-body">
		    <div class="list-group">
		    <?php foreach ($estNoAsignados as $ena) { ?>
			  <a href="#" class="list-group-item nombreEstudianteCambio" onclick="cargarAsignacionEstudiante(<?php echo $ena->est_id; ?>,'<?php echo $ena->est_paterno.' '.$ena->est_materno.' '.$ena->est_nombre; ?>')" data-toggle="modal" data-target="#modalAsignarCurso"><?php echo $ena->est_paterno.' '.$ena->est_materno.' '.$ena->est_nombre; ?></a>
			<?php } ?>
			</div>
		  </div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php foreach ($cursos as $c) { ?>
		  <div class="panel panel-primary">
		    <div class="panel-heading" role="tab" id="heading<?php echo $c['curso']->cur_id; ?>">
		      <h4 class="panel-title">
		        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $c['curso']->cur_id; ?>" aria-expanded="<?php echo $c['curso']->cur_id==1?'true':'false'; ?>" aria-controls="collapse<?php echo $c['curso']->cur_id; ?>">
		          <?php echo $c['curso']->cur_sigla.'-'.$c['curso']->cur_paralelo; ?>
		        </a>
		        <div style="float:right">
		        	<!--
                                <span style="margin-left:10px;">Varones</span> <span class="badge">--?php echo $c['nroVarones']; ?></span>
		        	<span style="margin-left:10px;">Mujeres</span> <span class="badge">--?php echo $c['nroMujeres']; ?></span> 
                                -->
		        	<span style="margin-left:10px;">Total</span> <span class="badge"><?php echo $c['nroVarones']+$c['nroMujeres']; ?></span>
		        </div>
		      </h4>
		    </div>
		    <div id="collapse<?php echo $c['curso']->cur_id; ?>" class="panel-collapse collapse <?php echo $c['curso']->cur_id==1?'in':''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $c['curso']->cur_id; ?>">
		      <div class="panel-body">
		 		<table class="table">
		 			<?php $i=1; ?>
		 			<?php foreach ($c['estudiantes'] as $e) { ?>
		 			<tr>
		 				<td><?php echo ($i++).'. '.$e->est_paterno.' '.$e->est_materno.' '.$e->est_nombre; ?></td>
		 				<td align="right">
		 					<button type="button" class="btn btn-default" onclick="desagregar(<?php echo $e->est_id;?>,'<?php echo $e->est_paterno.' '.$e->est_materno.' '.$e->est_nombre;?>')" title="Desagregar">
								<span class="glyphicon glyphicon-new-window"></span>
								Desagregar
							</button>
		 				</td>
		 			</tr>
		 			<?php } ?>
		 		</table>       
		      </div>
		    </div>
		  </div>
		<?php } ?>
		</div>
	</div>
</div>

<?php $this->load->view('estudiante/modal/modal_asignar_curso'); ?>
<script src="<?php echo base_url();?>resources/estudiante/js/asignar_curso.js"></script>