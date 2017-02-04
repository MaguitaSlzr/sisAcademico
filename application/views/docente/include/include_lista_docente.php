<table class="table table-striped table-hover tablesorter">
	<thead>
		<tr>
			<th>CI</th>
			<th>PATERNO</th>
			<th>MATERNO</th>
			<th>NOMBRES</th>
			<th>DIRECCION</th>
			<th>EMAIL</th>
			<th>MOVIL</th>
			<th>TELEFONO</th>
			<td><strong>ACCION</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($docentes as $d) { ?>
			<tr>
				<td><?php echo $d->pro_ci;?></td>
				<td><?php echo $d->pro_paterno;?></td>
				<td><?php echo $d->pro_materno;?></td>
				<td><?php echo $d->pro_nombre;?></td>
				<td><?php echo $d->pro_direccion;?></td>
				<td><?php echo $d->pro_email;?></td>
				<td><?php echo $d->pro_movil;?></td>
				<td><?php echo $d->pro_telefono;?></td>
				<td>
					<div class="btn-group btn-group-xs">
						<button type="button" class="btn btn-primary" onclick="ver('<?php echo $d->pro_id;?>')" title="Ver" data-toggle="modal" data-target="#modalVer">
							<span class="glyphicon glyphicon-eye-open"></span>
						</button>
						<button type="button" class="btn btn-success" onclick="editar('<?php echo $d->pro_id;?>')" title="Editar" data-toggle="modal" data-target="#modalEditarDocente">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
						<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $d->pro_id;?>,'<?php echo $d->pro_nombre.' '.$d->pro_paterno;?>')" title="Eliminar">
							<span class="glyphicon glyphicon-trash"></span>
						</button>
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $paginacion; ?>