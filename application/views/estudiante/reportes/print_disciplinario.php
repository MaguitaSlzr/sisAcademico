<!DOCTYPE html>
<html>
	<head>
		<title>Reporte de Estudiantes</title>
		<style>
			h3{
				text-align: center;
			}
			table{
				border-spacing: 0px;
				border-collapse: collapse;
				width: 100%;
				font-size: 12px;
				font-family: Arial;
			}

			th {
			    text-align: left;
			    background: #ccc;
			    color: #000;
			    height: 30px;
			}

			td {
			    height: 30px;
			}
			
		</style>
	</head>
	<body>
		<h3>REGISTRO DISCIPLINARIO</h3>
		
 		<?php foreach ($estudiantes as $e) { ?>
 		<hr>
			<table>
			<tr>
				<td><strong>CI: </strong> </td>
				<td><?php echo $e->est_ci;?></td>
				<td><strong>RUDE: </strong> </td>
				<td><?php echo $e->est_rude;?></td>
			</tr>
			<tr>
				<td><strong>Nombre Completo:</strong> </td>
				<td colspan="3"><?php echo $e->est_nombre;?> <?php echo $e->est_paterno;?> <?php echo $e->est_materno;?> </td>
			</tr>
	 		</table>

	 		<table>
	 			<tr>
	 				<th>ID</th>
	 				<th>Fecha</th>
	 				<th>Hecho</th>
	 				<th>Solucion</th>
	 			</tr>
	 			<tr>
	 				<td><?php echo $e->dis_id;?></td>
	 				<td><?php echo $e->dis_fecha;?></td>
	 				<td><?php echo $e->dis_relacionHecho;?></td>
	 				<td><?php echo $e->dis_solucion;?></td>
	 			</tr>
	 		</table>
	 		<br>
 		<?php } ?>
	</body>
</html>