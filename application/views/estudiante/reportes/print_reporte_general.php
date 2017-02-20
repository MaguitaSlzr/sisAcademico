<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
	<style>
		body, html{
			font-family: Arial;
		}		
		.titulo{
			text-align: center;
		}
		table.table{
			background-color: transparent;
			border-spacing: 0;
			border-collapse: collapse;
			display: table;
			width: 100%;
			max-width: 100%;
		}
		.table-bordered {
		    border: 1px solid #ddd;
		}
		.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
		    border: 1px solid #ddd;
		}
		.table tr{
			display: table-row;
			vertical-align: inherit;
			border-color: inherit;
		}
		.table td, .table th{
			padding: 8px;
			/*padding-bottom: -5px*/
			line-height: 1.42857143;
			vertical-align: top;
			border-top: 1px solid #ddd;
		}
		.table th.title-table{
			border-top: 1px solid #222;
			border-bottom: 1px solid #222;
		}
		.table-datos-personales td{
			padding-bottom: -5px;
		}
		.td-number{
			text-align: right;
		}
	</style>
</head>
<body>
	<p><?php echo date('d/m/y H:m:s'); ?></p>
	<h3 class="titulo"><?php echo  strtoupper($titulo); ?></h3>
	<table class="table table-datos-personales table-bordered">
		<tr>
			<td width="120"><strong>Nombres y apellidos</strong></td>
			<td><?php echo ucwords($estudiante->est_nombre).' '.ucwords($estudiante->est_paterno).' '.ucwords($estudiante->est_materno);?></td>
			<td rowspan="3" align="right" width="70">
			<?php  
			$foto=$estudiante->est_fotoadj;
			if ($foto!='' && $foto!=null) { ?>
                <img id="fotografia" src="<?php echo base_url('uploads/'.$foto); ?>" class="thumb img-responsive" alt="Fotografia" style="width: 100px;"/>				
			<?php }else{ ?>
                <img id="fotografia" src="<?php echo base_url(); ?>resources/base/img/avatar_estudiante.png" class="thumb img-responsive" alt="Fotografia" style="width: 100px;"/>
            <?php } ?>
			</td>
		</tr>
		<tr>
			<td><strong>Curso</strong></td>
			<td><?php echo $estudiante->cur_descripcion;?></td>
		</tr>
		<tr>
			<td><strong>Paralelo</strong></td>
			<td><?php echo $estudiante->cur_paralelo;?></td>
		</tr>
	</table>
	<br>
	<table class="table">
		<caption style="margin-bottom: 5px;"><strong>ASISTENCIA</strong></caption>
		<tr >
			<th class="title-table">Descripcion</th>
			<th class="title-table">Totales</th>
		</tr>
		<tr>
			<td>Total atrasos: </td>
			<td class="td-number"><?php echo $atrasos; ?></td>
		</tr>
		<tr>
			<td>Total fugas: </td>
			<td class="td-number"><?php echo $fugas; ?></td>
		</tr>
		<tr>
			<td>Total faltas injustificadas: </td>
			<td class="td-number"><?php echo $faltas_injustificadas; ?></td>
		</tr>
		<tr>
			<td>Total faltas justificadas: </td>
			<td class="td-number"><?php echo $faltas_justificadas; ?></td>
		</tr>
		<tr>
			<td>Total Permisos: </td>
			<td class="td-number"><?php echo $permisos; ?></td>
		</tr>
	</table>
	<?php if(isset($disciplinarios)){ ?>
	<br>
	<table class="table">
		<caption style="margin-bottom: 5px;"><strong>DISCIPLINA</strong></caption>
		<tr>
			<th class="title-table">Fecha</th>
			<th class="title-table">Descripción</th>
		</tr>
		<?php foreach ($disciplinarios as $disp) { ?>
		<tr>
			<td><?php echo $disp->dis_fecha; ?></td>
			<td><?php echo $disp->ptd_descripcion; ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>
</html>