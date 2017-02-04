function refrescarVentana(){
	var url=$('#urlRefrescar').val();
	$(location).attr('href', url);
	return false;
}

function desagregar(id,nombre){
	var sw = confirm('Esta seguro de desagregar al estudiante '+nombre+'?');
	if(sw){
		refrescarVentana();
		var url=$('#urlDesagregar').val();
		$(location).attr('href', url+'?id='+id);
	}
	return false;
}

function cargarAsignacionEstudiante(id,nombre){
	$('#txtIdAsignarEstudiante').val(id);
	$('#estudianteCambioCurso').html(nombre);
	//$('#modalAsignarCurso').modal('show');
	return false;
}

function realizarAsignacionEstudiante(){
	$('#formCambioCursoEstudiante').submit();
	return false;
}