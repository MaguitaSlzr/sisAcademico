$(document).ready(function(){
  $(".fecha").datepicker({dateFormat:'yy-mm-dd'});
  
  $("#curso").change(function(){
  	  var url=$("#form-curso-estudiantes").attr("action");
	  var idcurso=$(this).val();
	  $.ajax({
		    // En data puedes utilizar un objeto JSON, un array o un query string
		    data: {"idcurso" : idcurso},
		    //Cambiar a type: POST si necesario
		    type: "GET",
		    // Formato de datos que se espera en la respuesta
		    dataType: "json",
		    // URL a la que se enviará la solicitud Ajax
		    url: url,
		  }).done(function( data, textStatus, jqXHR ) {
		  	var out="";
		  	if(data!=null){
			  	out='<table class="table"><tr><th></th><th>Nombre Completo</th></tr>';
			  	for(var i=0;i<data.length;i++){
			  		out+='<tr>';
			  		out+='<td><input type="checkbox" class="estid" name="estid" value="'+data[i].est_id+'"></td>';
			  		out+='<td>'+data[i].est_paterno+' '+data[i].est_materno+' '+data[i].est_nombre+'</td>';
			  		out+='</tr>';
			  	}
			  	out+='</table>';
			}else{
				out="No existen estudiantes";
			}
			$("#lista-estudiantes").html(out);
		  }).fail(function( jqXHR, textStatus, errorThrown ) {
		    if ( console && console.log ) {
		      console.log( "La solicitud a fallado: " +  textStatus);
		   	}
	  });
  });

  $(document).on('change',".estid",function(){
  	//alert($(this).val());
  	var id=$(this).val();
  	var nombre=$(this).parent().next().text();
  	var out='<tr id="'+id+'">';
	out+='<td>'+nombre+'</td>';
  	out+='</tr>';
  	$('.table-est-seleccionados').append(out);
  });
});