$(document).ready(function () {

    // Se carga la tabla estudiantes    
    cargarTabla();
    
    // Se captura el evento clic del boton Guardar
    $('#btnGuardar').click(function () {
        var url=$(this).attr('href');
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#form').serialize(),
            success: function (data) {
                $('#mensaje').html(data);
                cargarTabla();
            },
        });
        return false;
    });

    // Se captura el evento clic del boton Guardar Cambios (Editar)
    $('#btnActualizar').click(function () {
        var url=$(this).attr('href');
        //alert($('#formEditar').serialize());
        $.ajax({
            type: 'POST',
            url: url,
            data: $('#formEditar').serialize(),
            success: function (data) {
                $('#mensaje').html(data);
                $('#modalEditar').modal('toggle');
                cargarTabla();
            },
        });
        return false;
    });
});

function cargarTabla(){
    $.ajax({
        type: 'POST',
        url: $('#cargarTabla').val(),
        success: function(data){
            $("#load").html(data);
        }
    });
}

function eliminar(id){
    var sw = confirm('Estas seguro que deseas eliminar el estudiante Nro '+id+' ?');
    if(sw){ 
        var url=$('#urlEliminar').val();
        $.ajax({
            type: 'POST',
            url: url,
            data: {'id':id},
            success: function (data) {
                $('#mensaje').html(data);
                cargarTabla();
                limpiarForm();
            },
        });
        return false;
    } 
}

function ver(id){
    var url=$('#urlBuscar').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {'id': id},
        success: function(data){
            data = $.parseJSON(data);
            $("#idVer").html(data.idestudiante);
            $("#nombreVer").html(data.nombre);
            $("#edadVer").html(data.edad);
            
        }
    });
    return false;
}

function editar(id){
    var url=$('#urlBuscar').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {'id': id},
        success: function(data){
            data = $.parseJSON(data);
            $("#idEditarCampo").val(data.idestudiante);
            $("#idEditar").val(data.idestudiante);
            $("#nombreEditar").val(data.nombre);
            $("#edadEditar").val(data.edad);
        }
    });
    return false;
}

function limpiarForm(){
    $('#mensaje').html('');
    $('#nombre').val('');
    $('#edad').val('');
}


