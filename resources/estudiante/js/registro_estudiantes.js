$(document).ready(function () {
    // call the tablesorter plugin 
    $("table").tablesorter({
        // ordenando por la tercera columna, order asc 
        //sortList: [[2,0]]
        //ordenando por el apellido paterno, order asc 
        sortList: [[0, 0]]
    });
});


// ADICIONAR ESTUDIANTE
var validaFormNuevoEst = $('#formNuevoEstudiante').validate({
    rules: {
        txtPasswordConfirmar: {
            equalTo: "#txtPasswordNuevo"
        }
    }
});

$('.btnGeneraUsuario').on('click', function () {
    $('#txtUsuarioNuevo').val(generarUsuario());
    return false;
});

$('.btnGeneraPassword').on('click', function () {
    var pwd = generarPassword();
    $('#txtPasswordNuevo').val(pwd);
    $('#txtPasswordConfirmar').val(pwd);
    return false;
});

function limpiarFormularioEstudiante() {
    /*$('#formPaso1')[0].reset();*/
    /*$('#formPaso2')[0].reset();*/
    var url = $('#urlRefrescar').val();
    $(location).attr('href', url);
    return false;
}

function generarUsuario() {
    var nombre = $('#txtNombreNuevo').val().toUpperCase();
    var paterno = $('#txtPaternoNuevo').val().toUpperCase();
    var user = nombre.substr(0, 1) + paterno;
    return user;
}

function generarPassword() {
    var nombre = $('#txtNombreNuevo').val();
    var paterno = $('#txtPaternoNuevo').val();
    var materno = $('#txtMaternoNuevo').val();
    var ci = $('#txtCiNuevo').val();
    nombre = nombre.toUpperCase();
    paterno = paterno.toUpperCase();
    materno = materno.toUpperCase();
    var pwd = paterno.substr(0, 1) + materno.substr(0, 1) + nombre.substr(0, 1) + ci;
    pwd = pwd.toLowerCase();
    return pwd;
}

function guardarEstudiante() {
    if (validaFormNuevoEst.form()) {
        var nombre = $('#txtNombreNuevo').val();
        var paterno = $('#txtPaternoNuevo').val();
        if (nombre != '' && paterno != '') {
            var usuario = $('#txtUsuarioNuevo').val();
            var password = $('#txtPasswordNuevo').val();
            if (usuario == '') {
                $('#txtUsuarioNuevo').val(generarUsuario());
            }
            if (password == '') {
                $('#txtPasswordNuevo').val(generarPassword());
            }
            $('#formNuevoEstudiante').submit();
        } else {
            $('#alertaCompletarCamposNuevo').css('display', '');
        }
    }
    return false;
}

function guardarDisciplinario() {
    var estudiante = $('#estudiante').val();
    var fecha = $('#fecha').val();
    var falta = $('#falta').val();
    var relacion = $('#relacion').val();
    var solucion = $('#solucion').val();
    if (estudiante != '' && fecha !='' && falta != '' && relacion!= '' && solucion !='') {
        $('#formDisciplinario').submit();
    } else {
        $('#mensaje').css('display', '');
    }
}

function obtieneDia(fecha) {
    var dia = fecha.split('-')[2];
    return dia;
}

function obtieneMes(fecha) {
    var mes = fecha.split('-')[1];
    return mes;
}

function obtieneAnio(fecha) {
    var anio = fecha.split('-')[0];
    return anio;
}

function generarUsuarioEditar() {
    var nombre = $('#txtNombreEditar').val().toUpperCase();
    var paterno = $('#txtPaternoEditar').val().toUpperCase();
    var user = nombre.substr(0, 1) + paterno;
    return user;
}

function generarPasswordEditar() {
    var nombre = $('#txtNombreEditar').val();
    var paterno = $('#txtPaternoEditar').val();
    var materno = $('#txtMaternoEditar').val();
    var ci = $('#txtCiEditar').val();
    nombre = nombre.toUpperCase();
    paterno = paterno.toUpperCase();
    materno = materno.toUpperCase();
    var pwd = paterno.substr(0, 1) + materno.substr(0, 1) + nombre.substr(0, 1) + ci;
    pwd = pwd.toLowerCase();
    return pwd;
}

$('.btnGeneraUsuarioEditar').on('click', function () {
    $('#txtUsuarioEditar').val(generarUsuarioEditar());
    return false;
});

$('.btnGeneraPasswordEditar').on('click', function () {
    var pwd = generarPasswordEditar();
    $('#txtPasswordEditar').val(pwd);
    $('#txtPasswordConfirmarEditar').val(pwd);
    return false;
});

function editar(id) {
    var url = $('#urlBuscar').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {'id': id},
        success: function (data) {
            data = $.parseJSON(data);
            $('.idEditar').val(data.est_id);
            $('#txtRudeEditar').val(data.est_rude);
            $('#txtCiEditar').val(data.est_ci);
            $('#selExpedidoEditar option[value="' + data.par_expedido_id + '"]').prop('selected', true);
            $('#txtNombreEditar').val(data.est_nombre);
            $('#txtPaternoEditar').val(data.est_paterno);
            $('#txtMaternoEditar').val(data.est_materno);
            $('#selEditarDia option[value="' + obtieneDia(data.est_fechanac) + '"]').prop('selected', true);
            $('#selEditarMes option[value="' + obtieneMes(data.est_fechanac) + '"]').prop('selected', true);
            $('#selEditarAnio option[value="' + obtieneAnio(data.est_fechanac) + '"]').prop('selected', true);
            $('input[name="rbnGeneroEditar"]:radio[value=' + data.par_genero_id + ']').attr('checked', true);
            $('input[name="rbnEstadoEditar"]:radio[value=' + data.estado_id + ']').attr('checked', true);
            $('#txtNombreApoderadoEditar').val(data.est_ap_nombre);
            $('#selParentescoEditar option[value="' + data.est_ap_parentesco + '"]').prop('selected', true);
            $('#txtDireccionEditar').val(data.est_direccion);
            $('#txtEmailEditar').val(data.est_email);
            $('#txtTelefonoEditar').val(data.est_telefono);
            $('#txtCelularEditar').val(data.est_movil);
            $('#selCursoEditar option[value="' + data.curso_id + '"]').prop('selected', true);
            $('#txtUsuarioEditar').val(data.est_login);
            if (data.est_fotoadj == null) {
                $('.imageEditar').attr('src', $('#urlBase').val() + 'resources/base/img/avatar_estudiante.png');
                //$('#txtRudeEditar').val('no tiene foto');
            } else {
                $('.imageEditar').attr('src', $('#urlBase').val() + 'uploads/' + data.est_fotoadj);
                //$('#txtRudeEditar').val(data.est_fotoadj);	
            }
        }
    });
    return false;
}

var validaFormActualizaEst = $('#formEditarEstudiante').validate({
    rules: {
        txtPasswordConfirmar: {
            equalTo: "#txtPasswordEditar"
        }
    }
});

function guardarCambiosEstudiante() {
    if (validaFormActualizaEst.form()) {
        var nombre = $('#txtNombreEditar').val();
        var paterno = $('#txtPaternoEditar').val();
        if (nombre != '' && paterno != '') {
            var usuario = $('#txtUsuarioEditar').val();
            var password = $('#txtPasswordEditar').val();
            if (usuario == '') {
                $('#txtUsuarioEditar').val(generarUsuarioEditar());
            }
            if (password == '') {
                $('#txtPasswordEditar').val(generarPasswordEditar());
            }
            $('#formEditarEstudiante').submit();
        } else {
            $('#alertaCompletarCamposEditar').css('display', '');
        }
    }
    return false;
}

function eliminar(id, nombre) {
    var sw = confirm('Esta seguro de eliminar al estudiante ' + nombre + '?');
    if (sw) {
        var url = $('#urlEliminar').val();
        $(location).attr('href', url + '?id=' + id);
    }
    return false;
}

function ver(id) {
    alert('Disculpe las molestias, por el momento la funcion de Ver se encuetra en desarrollo.');
    /*
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
     */
    return false;
}

function guardarImprimirReporteEstudiante() {
    alert('Disculpe las molestias, por el momento la funcion de Guardar y Reporte se encuetra en desarrollo.');
    return false;
}

// METODOS PARA EL FILTRO DE LA TABLA

$("#txtParametroBusqueda").keyup(function () {
    if ($("#txtParametroBusqueda").val() != '') {
        $.ajax({
            type: 'POST',
            url: $('#formBuscar').attr('action'),
            data: $('#formBuscar').serialize(),
            success: function (data) {
                $('#resultado').html(data);
            }
        });
        return false;
    } else {
        limpiarFormularioEstudiante();
    }
    return false;
});

// METODOS PARA LA FOTOGRAFIA ADICIONAR
function archivo(evt) {
    var files = evt.target.files; // FileList object

    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                // Insertamos la imagen
                document.getElementById("list").innerHTML = ['<img class="thumb img-responsive" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}
document.getElementById('files').addEventListener('change', archivo, false);

// METODOS PARA LA FOTOGRAFIA EDITAR
function archivoEditar(evt) {
    var files = evt.target.files; // FileList object

    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                // Insertamos la imagen
                document.getElementById("listEditar").innerHTML = ['<img class="thumb img-responsive" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}
document.getElementById('filesEditar').addEventListener('change', archivoEditar, false);

