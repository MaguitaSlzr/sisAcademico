function inicializarFormulario(){
	$('#estudiante').attr('disabled','true');
	$('#fotografia').attr('src',$('#base-url-foto').val()+'avatar_estudiante.png');
	$('#table-asistencia tr').each(function(index){
		$(this).find('td span').text('');
		$(this).find('td a').addClass('disabled');
	});
}
$(document).ready(function(){
  $('#curso').change(function(){
  	inicializarFormulario();
	var url=$('#url_get_estudiantes').val();
	$.ajax({
	  type: "GET",	
	  dataType: "json",
	  url: url,
	  data: {"idcurso":$(this).val()},
	  success: function(data){
	  	var out='<option value="0">--- Seleccionar un estudiante ---</option>';
	  	if(data!=null){
		  	if(data.length!=0){
			  	for(var i=0;i<data.length;i++){
		 	      out+='<option value="'+data[i].est_id+'">'+data[i].est_paterno+' '+data[i].est_materno+' '+data[i].est_nombre+'</option>';
			  	}
			  	$('#estudiante').removeAttr('disabled');
			}
		}
		$('#estudiante').html(out);
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
	  	foto=data.estudiante.est_fotoadj;
	  	if(foto!='' && foto!=null){
	  		$('#fotografia').attr('src',$('#base-url-foto').val()+foto);
	  	}
	  	$('#prev-atrasos').text(data.atrasos);
	  	if(data.atrasos!=0){
	  		$('#prev-atrasos').parent().next().find('a').removeClass('disabled');
	  	}
	  	$('#prev-fugas').text(data.fugas);
	  	if(data.fugas!=0){
	  		$('#prev-fugas').parent().next().find('a').removeClass('disabled');
	  	}
	  	$('#prev-faltas-injustificadas').text(data.faltas_injustificadas);
	  	if(data.faltas_injustificadas!=0){
	  		$('#prev-faltas-injustificadas').parent().next().find('a').removeClass('disabled');
	  	}
	  	$('#prev-faltas-justificadas').text(data.faltas_justificadas);
	  	if(data.faltas_justificadas!=0){
	  		$('#prev-faltas-justificadas').parent().next().find('a').removeClass('disabled');
	  	}
	  	$('#prev-permisos').text(data.permisos);	  
	  	if(data.permisos!=0){
	  		$('#prev-permisos').parent().next().find('a').removeClass('disabled');
	  	}
	  },
	});
	return false;
  });

});