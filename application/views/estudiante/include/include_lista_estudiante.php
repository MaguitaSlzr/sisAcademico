<table class="table table-striped table-hover tablesorter">
	<thead>
		<tr>
			<th>PATERNO</th>
			<th>MATERNO</th>
			<th>NOMBRES</th>
			<th>RUDE</th>
			<th>C.I.</th>			
			<th>FECH. NAC.</th>
			<td><strong>ACCION</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($estudiantes as $e) { ?>
			<tr>
				<td><?php echo $e->est_paterno;?></td>
				<td><?php echo $e->est_materno;?></td>
				<td><?php echo $e->est_nombre;?></td>
				<td><?php echo $e->est_rude;?></td>
				<td><?php echo $e->est_ci;?></td>
				<td><?php echo $e->est_fechanac;?></td>
				<td>
					<div class="btn-group btn-group-xs">
                                            <!--
						<button type="button" class="btn btn-primary" onclick="ver('//--php echo $e->est_id;?>')" title="Ver" data-toggle="modal" data-target="#modalVer">
							<span class="glyphicon glyphicon-eye-open"></span>
						</button>
                                            -->
						<button type="button" class="btn btn-success" onclick="editar('<?php echo $e->est_id;?>')" title="Editar" data-toggle="modal" data-target="#modalEditarEstudiante">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
						<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $e->est_id;?>,'<?php echo $e->est_nombre.' '.$e->est_paterno;?>')" title="Eliminar">
							<span class="glyphicon glyphicon-trash"></span>
						</button>
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $paginacion; ?>