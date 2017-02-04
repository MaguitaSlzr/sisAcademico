<table class="table table-striped table-hover tablesorter">
	<thead>
		<tr>
			<th>FECHA REGISTRO</th>
			<th>INDICADOR</th>
			<th>RELACION HECHO</th>
			<th>SOLUCION</th>
			<th>ESTUDIANTE</th>		
		</tr>
	</thead>
	<tbody>
		<?php foreach ($disciplinas as $e) { ?>
			<tr>
				<td><?php echo $e->dis_fecha;?></td>
				<td><?php echo $e->dis_iddisciplinario;?></td>
				<td><?php echo $e->dis_relacionHecho;?></td>
				<td><?php echo $e->dis_solucion;?></td>
				<td><?php echo $e->dis_estudiante;?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $paginacion; ?>