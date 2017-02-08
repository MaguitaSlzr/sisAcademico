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
	  	$('#prev_curso').text(data.cur_descripcion);
	  	$('#prev_paralelo').text(data.cur_paralelo);
	  	$('#prev_nombre').text(data.est_paterno+' '+data.est_materno+' '+data.est_nombre);
	  },
	});
	return false;
  });

});