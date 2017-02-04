<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/menu'); ?>
<h3 class="tituloPrincipal">CONTROL DE ASISTENCIA</h3>

<div class="row">
  <form id="form-curso-estudiantes" action="<?php echo base_url(); ?>estudiante/curso_estudiantes" method="post">
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
		        <select id="curso" name="curso" class="form-control">
		        	<option value="0">-- Seleccione un curso --</option>
		        	<?php foreach ($cursos as $c) {?>
		        		<option value="<?php echo $c->cur_id;?>"><?php echo $c->cur_descripcion.', PARALELO: '.$c->cur_paralelo;?></option>
		        	<?php } ?>
		        </select>
		    </div>
		    <div id="lista-estudiantes">
			    <?php if(isset($estudiantes)){ ?>
				<table class="table">
			    	<tr>
			    		<th></th>
			    		<th>#</th>
			    		<th>Nombre Completo</th>
			    	</tr>
			    	<?php foreach ($estudiantes as $e) { ?>
			    		<tr>
			    			<th><input type="checkbox" name="estid" value="<?php echo $e->est_id; ?>"></th>
			    			<td></td>
			    			<td><?php echo $e->est_paterno.' '.$e->est_materno.' '.$e->est_nombre; ?></td>
			    		</tr>
			    	<?php } ?>
			    </table>
			    <?php }else{ ?>
			    	No existen estudiantes
			    <?php } ?>
		    </div>
		  </div>
		</div>
	</div>
  </form>

	<div class="col-md-7">
		<form action="">
			
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<h3 class="panel-title">
			  		ESTUDIANTES SELECCIONADOS
			  	</h3>
			  </div>
			  <div class="panel-body">
			  	<table class="table table-est-seleccionados">
			  		
			  	</table>
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
				        <label for="fecha">Fecha</label>
				        <input type="text" class="form-control fecha" id="fecha" name="fecha">
				    </div>
				    <div class="form-group">
				        <label for="falta">Tipo de Falta</label>
				        <select id="falta" name="falta" class="form-control">
				        	<?php foreach ($faltas as $falta) {?>
				        		<option value="<?php echo $falta->ptf_id;?>"><?php echo $falta->ptf_descripcion;?></option>
				        	<?php } ?>
				        </select>
				    </div>
				    <div class="form-group">
				        <label for="materia">Materia</label>
				        <select id="materia" name="materia" class="form-control">
				        	<?php foreach ($materias as $materia) {?>
				        		<option value="<?php echo $materia->mat_id;?>"><?php echo $materia->mat_descripcion;?></option>
				        	<?php } ?>
				        </select>
				    </div>				    
				    <div class="form-group">
				        <label for="observacion">Observación</label>
				        <textarea id="observacion" name="observacion" rows="12" class="form-control"></textarea>
				    </div>
				    <button class="btn btn-primary" data-toggle="modal" data-target="#modalMensaje">Registrar</button>
				    <button class="btn btn-default">Cancelar</button>
				</div>
			  </div>
			</div>
		</form>
	</div>
</div>

<!-- Ventana modal basica -->
<!--
<div class="modal fade" id="modalMensaje">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hiden="true" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Mensaje</h4>
            </div>
            <div class="modal-body">
                Los datos se han registrado correctamente.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
-->
<?php $this->load->view('template/footer'); ?>
<script src="<?php echo base_url();?>resources/estudiante/js/control-asistencia.js"></script>
