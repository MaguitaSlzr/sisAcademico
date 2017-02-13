$(document).ready(function(){

  $('#curso').change(function(){
	var url=$('#url_get_estudiantes').val();
	$.ajax({
	  type: "GET",	
	  dataType: "json",
	  url: url,
	  data: {"idcurso":$(this).val()},
	  success: function(data){
	  	var out='<option value="0">--- Seleccionar un estudiante ---</option>';
	  	for(var i=0;i<data.length;i++){
 	      out+='<option value="'+data[i].est_id+'">'+(i+1)+'. '+data[i].est_paterno+' '+data[i].est_materno+' '+data[i].est_nombre+'</option>';
	  	}
	  	$('#estudiante').html(out);
	  	$('#estudiante').removeAttr('disabled');
	  },
	});
	return false;
  });

  $('#estudiante').change(function(){
	var url=$('#url_find_estudiante').val();
	$.ajax({
	  type: "GET",	
	  dataType: "json",
	  url: url,
	  data: {"idestudiante":$(this).val()},
	  success: function(data){
	  	//console.log(data);
	  	$('#prev-curso').text(data.estudiante.cur_descripcion);
	  	$('#prev-paralelo').text(data.estudiante.cur_paralelo);
	  	$('#prev-nombre').text(data.estudiante.est_paterno+' '+data.estudiante.est_materno+' '+data.estudiante.est_nombre);
	  	$('#prev-atrasos').text(data.atrasos);
	  	$('#prev-fugas').text(data.fugas);
	  	$('#prev-faltas-injustificadas').text(data.faltas_injustificadas);
	  	$('#prev-faltas-justificadas').text(data.faltas_justificadas);
	  	$('#prev-permisos').text(data.permisos);	  
	  },
	});
	return false;
  });

});