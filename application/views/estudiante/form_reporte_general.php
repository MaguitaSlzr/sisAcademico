<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/menu'); ?>
<h3 class="tituloPrincipal">Generar Reporte Estudiante</h3>
<form action="#" method="post">
  <div class="row">
  	<div class="col-md-6">
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
	<div class="col-md-6">
	  <div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title">
			Previsualizacion Estudiante
		  </h3>
		</div>
		<div class="panel-body">
		  <table class="table">
		  	<tr>
		  		<th>Curso: </th>
		  		<td id="prev_curso"></td>
		  	</tr>
		  	<tr>
		  		<th>Paralelo: </th>
		  		<td id="prev_paralelo"></td>
		  	</tr>
		  	<tr>
		  		<th>Nombre Completo: </th>
		  		<td id="prev_nombre"></td>
		  	</tr>
		  	<tr>
		  		<th>Total Faltas: </th>
		  		<td id="prev_total"></td>
		  	</tr>
		  	<tr>
		  		<th>Disciplinario: </th>
		  		<td id="prev_disciplinario"></td>
		  	</tr>
		  </table>

		  <div class="form-group">
		    <button type="button" class="btn btn-primary" style="float: right;">Generar Reporte</button>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</form>
<?php $this->load->view('template/footer'); ?>
<script src="<?php echo base_url();?>resources/estudiante/js/form-reporte-general.js"></script>