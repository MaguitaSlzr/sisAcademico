<style type="text/css">
	.asignacionDocente th, .asignacionDocente td{
		text-align: center;
	}
	.asignacionDocente td .contenido{
		/*background-color: #f00;*/
		height: 40px;
		margin-bottom: 2px;
		font-weight: bold;
	}
	.asignacionDocente td .botones{
		float: right;
		/*background-color: #0f0;*/
	}
</style>

<h3 class="tituloPrincipal">ASIGNACIÓN ACADÉMICA</h3>
<div class="alert alert-info">
	<form action="#" class="form-inline">
		<div class="form-group">
			<label for="profesor">Horario del Docente:</label>
			<select id="profesor" name="profesor" class="form-control">
			  	<?php foreach ($profesores as $p) { ?>
                    <option value="<?php echo $p->pro_id;?>"><?php echo $p->pro_paterno.' '.$p->pro_materno.' '.$p->pro_nombre;?></option>
                <?php } ?>
			</select>
		</div>
	</form>
</div>

<table class="table table-striped table-bordered asignacionDocente">
	<thead>
		<tr>
			<th class="col-sm-1">Hora</th>
			<th class="col-sm-2">Lunes</th>
			<th class="col-sm-2">Martes</th>
			<th class="col-sm-2">Miércoles</th>
			<th class="col-sm-2">Jueves</th>
			<th class="col-sm-2">Viernes</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>08:00<br/>09:00</th>
			<td><div class="contenido bg-primary">4-A<br/>MAT</div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">3-A<br/>FIS </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">4-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
		</tr>
		<tr>
			<th>09:00<br/>10:00</th>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">3-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">4-B<br/>FIS </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">5-A<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
		</tr>
		<tr>
			<th>10:00<br/>11:00</th>
			<td><div class="contenido bg-primary">4-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">4-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">4-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
		</tr>
		<tr>
			<th>11:00<br/>12:00</th>
			<td><div class="contenido bg-primary">4-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido"> </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
			<td><div class="contenido bg-primary">4-B<br/>MAT </div><div class="btn-group btn-group-xs botones"><button class="btn btn-default">Editar</button></div></td>
		</tr>
	</tbody>
</table>
<script src="<?php echo base_url();?>resources/docente/js/asignacion_academica.js"></script>