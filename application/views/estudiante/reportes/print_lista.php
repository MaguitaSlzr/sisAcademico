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
		<h3>REGISTRO DE ESTUDIANTES</h3>
		<table>
		 	<tr>
	 			<th>CI</th>
	 			<th>RUDE</th>
	 			<th>NOMBRE</th>
	 			<th>PATERNO</th>
	 			<th>MATERNO</th>
	 			<th>NACIMIENTO</th>
	 			<th>DIRECCION</th>
	 			<th>TELF.</th>
	 		</tr>
	 		<?php foreach ($estudiantes as $e) { ?>
	 		<tr>
	 			<td><?php echo $e->est_ci;?></td>
	 			<td><?php echo $e->est_rude;?></td>
	 			<td><?php echo $e->est_nombre;?></td>
	 			<td><?php echo $e->est_paterno;?></td>
	 			<td><?php echo $e->est_materno;?></td>
	 			<td><?php echo $e->est_fechanac;?></td>
	 			<td><?php echo $e->est_direccion;?></td>
	 			<td><?php echo $e->est_telefono;?></td>
	 		</tr>
	 		<?php } ?>
	 		<tr>
	 			<th colspan="6">Total Estudiantes</th>
	 			<th colspan="2"><?php echo count($estudiantes); ?></th>
	 		</tr>
		 </table>
	</body>
</html>