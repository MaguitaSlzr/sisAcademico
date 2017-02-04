$('.generaPassword').on('click',function(){
	var nombre=$('#txtNombreNuevo').val();
	var paterno=$('#txtPaternoNuevo').val();
	var materno=$('#txtMaternoNuevo').val();
	var ci=$('#txtCiNuevo').val();
	nombre = nombre.toUpperCase();
	paterno = paterno.toUpperCase();
	materno = materno.toUpperCase();
	var pwd=paterno.substr(0,1)+materno.substr(0,1)+nombre.substr(0,1)+ci;
	pwd = pwd.toLowerCase();
	alert('El password generado es: '+pwd);	
	$('#txtPasswordNuevo').val(pwd);
	$('#txtPasswordConfirmar').val(pwd);	
	return false;
});

/*
$('.required').each(function(){
      console.log($(this).val());
});
*/

$(document).ready(function() { 
    // call the tablesorter plugin 
    $("table").tablesorter({ 
        // ordenando por la segunda columna, order asc 
        sortList: [[1,0]] 
    }); 
}); 

// INICIO CONTROL DE LOS TABS PARA GUARDAR UN NUEVO DOCENTE
$('.nav-tabs a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

function siguiente(){
	if($('#formPaso1').validate().form()){
		$('.nav-tabs a[href="#datosUsuarioDocente"]').tab('show');
		$('#btnGuardarDocente').css('display','');
		$('#btnVolver').css('display','');
		$('#btnSiguiente').css('display','none');
		$('#paso1').attr('class','col-sm-4 tituloTab tabDesactivo');
		$('#paso2').attr('class','col-sm-4 tituloTab bg-primary');
		var nombre=$('#txtNombreNuevo').val().toUpperCase();
		var paterno=$('#txtPaternoNuevo').val().toUpperCase();
		var user=nombre.substr(0,1)+paterno;
		$('#txtUsuarioNuevo').val(user);
		//console.log('probando...');
	}
	return false;
}

function volver(){
	$('.nav-tabs a[href="#datosPersonalesDocente"]').tab('show');
	$('#btnGuardarDocente').css('display','none');
	$('#btnVolver').css('display','none');
	$('#btnSiguiente').css('display','');
	$('#paso1').attr('class','col-sm-4 tituloTab bg-primary');
	$('#paso2').attr('class','col-sm-4 tituloTab tabDesactivo');
	return false;
}
// FIN CONTROL DE LOS TABS PARA GUARDAR UN NUEVO DOCENTE
var paso2 = $('#formPaso2').validate({
	rules:{
	    txtPasswordConfirmar: {
	      equalTo: "#txtPasswordNuevo"
	    }
	}
});

function ver(id){
	var url=$('#urlBuscar').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {'id': id},
        success: function(data){
            data = $.parseJSON(data);
            //$("#idVer").html(data.pro_id);
            $("#txtIdOcultoDocente").val(data.pro_id);
            $("#ciVer").html(data.pro_ci);
            $("#expedidoVer").html(data.expedido);
            $("#nombreVer").html(data.pro_nombre);
            $("#paternoVer").html(data.pro_paterno);
            $("#maternoVer").html(data.pro_materno);
            $("#generoVer").html(data.genero);
            $("#direccionVer").html(data.pro_direccion);
            $("#emailVer").html(data.pro_email);
            $("#telefonoVer").html(data.pro_telefono);
            $("#movilVer").html(data.pro_movil);
            $("#fechaVer").html(data.pro_fechreg);
            $("#usuarioVer").html(data.pro_login);
            $("#rolVer").html(data.rol);
            $("#estadoVer").html(data.estado);
        }
    });
    return false;
}

function eliminar(id, nombre){
	var sw = confirm('Esta seguro de eliminar al docente '+nombre+'?');
	if(sw){
		var url=$('#urlEliminar').val();
		$(location).attr('href', url+'?id='+id);
	}
	return false;
}
/*
function eliminarModal(){
	var id=$('#idVer').html();
	var nombre=$('#paternoVer').html()+' '+$('#maternoVer').html()+' '+$('#nombreVer').html();
	eliminar(id,nombre);
	return false;
}
function editarModal(){
	var id=$('#txtIdOcultoDocente').val();
	//alert('Editando desde el modal....'+id);
	//var nombre=$('#paternoVer').html()+' '+$('#maternoVer').html()+' '+$('#nombreVer').html();
	editar(id);
	$('#modalEditarDocente').modal('show');
	return false;
}
*/
function guardarDocente(){
	if(paso2.form()){
		var url=$('#urlGuardarDocente').val();
		//var nombre=$('#nombreEditar').val();
		//var data = $('#formPaso1').serialize()+'&'+$('#formPaso2').serialize();
		//data.push({name: 'wordlist', value: wordlist});
		var usr=$('#txtUsuarioNuevo').val();
		var pws=$('#txtPasswordNuevo').val();
		var est=$('input:radio[name=rbnEstadoNuevo]:checked').val();
		$('#formPaso1').append('<input type="hidden" name="txtUsuario" value="'+usr+'"/>');
		$('#formPaso1').append('<input type="hidden" name="txtPassword" value="'+pws+'"/>');
		$('#formPaso1').append('<input type="hidden" name="rbnEstado" value="'+est+'"/>');
		$('#formPaso1').submit();
	}
	return false;
}
// METODOS PARA EL FILTRO DE LA TABLA

$("#txtParametroBusqueda").keyup(function () {
	if($("#txtParametroBusqueda").val()!=''){
		$.ajax({
	        type:'POST',	
			url:$('#formBuscar').attr('action'),
			data:$('#formBuscar').serialize(),
	        success: function(data){
	            $('#resultado').html(data);
	        }
	    });
	    return false;
    }else{
    	limpiarFormularioDocente();
    }
    return false;
});

// METODOS PARA EDITAR DOCENTE
function editar(id){
	var url=$('#urlBuscar').val();
	$.ajax({
        type: 'POST',
        url: url,
        data: {'id': id},
        success: function(data){
            data = $.parseJSON(data);
            $('.idEditar').val(data.pro_id);
            $('#ciEditar').val(data.pro_ci);
            $('#expedidoEditar option[value="'+data.par_expedido_id+'"]').prop('selected', true);
            $('#nombreEditar').val(data.pro_nombre);
            $('#paternoEditar').val(data.pro_paterno);
            $('#maternoEditar').val(data.pro_materno);
            $('#direccionEditar').val(data.pro_direccion);
            $('#emailEditar').val(data.pro_email);
            $('#telefonoEditar').val(data.pro_telefono);
            $('#celularEditar').val(data.pro_movil);
            $('input[name="generoEditar"]:radio[value='+data.par_genero_id+']').attr('checked',true);
            $('#nombreUsuarioEditar').val(data.pro_login);
            $('input[name="estadoUsuarioEditar"]:radio[value='+data.estado_id+']').attr('checked',true);
        }
    });
	return false;
}
$('.generaPasswordEditar').on('click',function(){
	var nombre=$('#nombreEditar').val();
	var paterno=$('#paternoEditar').val();
	var materno=$('#maternoEditar').val();
	var ci=$('#ciEditar').val();
	nombre = nombre.toUpperCase();
	paterno = paterno.toUpperCase();
	materno = materno.toUpperCase();
	var pwd=paterno.substr(0,1)+materno.substr(0,1)+nombre.substr(0,1)+ci;
	pwd = pwd.toLowerCase();
	alert('El password generado es: '+pwd);	
	$('#confirmarPasswordEditar').val(pwd);
	$('#passwordUsuarioEditar').val(pwd);	
	return false;
});
var pasoEditar = $('#editarPasswordDocente').validate({
	rules:{
	    confirmarPasswordEditar: {
	      equalTo: "#passwordUsuarioEditar"
	    }
	}
});
function actualizarDatosPersonalesDocente(){
	$('#editarDatosPersonalesDocente').submit();
	return false;
}
function actualizarPasswordDocente(){
	if(pasoEditar.form()){
		$('#editarPasswordDocente').submit();
	}
	return false;
}
function limpiarFormularioDocente(){
	/*$('#formPaso1')[0].reset();*/
	/*$('#formPaso2')[0].reset();*/
	var url=$('#urlRefrescar').val();
	$(location).attr('href', url);
	return false;
}