/* INICIO - CODIGO OBLIGATORIO */
$(function () {
    $("#fecha").datepicker({
       onSelect: function(textoFecha, objDatepicker){
            var sw_fecha=false;
            $(".content-fechas-atrasos li").each(function(){
               var fecha=$(this).text();
               if(fecha==textoFecha){
                  sw_fecha=true;
               }
            });
            if(!sw_fecha){
                var out='<li class="list-group-item">'+textoFecha+'</li>';
                $('.content-fechas-atrasos').append(out);
            }else{
                alert("La fecha ya fue agregada.")
            }

            //objDatepicker.dpDiv.find('.ui-datepicker-current-day a').css('background-color', '#ff0000'); 
            //alert(objDatepicker.dpDiv.find('.ui-datepicker-current-day a').text());
            //objDatepicker.dpDiv.find('.ui-datepicker-current-day a').addClass('dia-seleccionado');
            //$('#fecha').datepicker("refresh");
       },
       beforeShowDay: function (day) {
         var day = day.getDay();
         if (/*day == 6 || */day == 0) {
             return [false, "unaclase"];
         } else {
           return [true, "otraclase"];
         }
       }
    });
    funcionBaseUno();


});

function funcionBaseUno() {
    $('.list-group.checked-list-box .list-group-item').each(function () {
        // Settings
        var $widget = $(this),
                $checkbox = $('<input type="checkbox" class="hidden" />'),
                color = ($widget.data('color') ? $widget.data('color') : "primary"),
                style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplayCursoEstudiantes();
        });
        /*
         $checkbox.on('change', function () {
         alert("maguita...");
         updateDisplayCursoEstudiantes();
         });
         */

        // Actions
        function updateDisplayCursoEstudiantes() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {

            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }

            updateDisplayCursoEstudiantes();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });


    $('#get-checked-data').on('click', function (event) {
        event.preventDefault();
        var checkedItems = {}, counter = 0;
        $("#check-list-box li.active").each(function (idx, li) {
            checkedItems[counter] = $(li).text();
            counter++;
        });
        $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
    });
    /*  $('#get-checked-data').on('click', function (event) {
     event.preventDefault();
     var checkedItems = {}, counter = 0;
     $("#check-list-box li.active").each(function (idx, li) {
     checkedItems[counter] = $(li).text();
     counter++;
     });
     $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
     });*/
}
/* FIN - CODIGO OBLIGATORIO */

/* INICIO - SELECCIONAR O DESELECCIONAR UN ESTUDIANTE - AUTOR:FELIX */
$(function () {
    funcionBaseDos();
});

function funcionBaseDos() {
    $('.est-item').on('click', function (event) {
        event.preventDefault();
        if ($(this).hasClass('active')) {
            //alert('SELECIONADO: '+$(this).attr('id'));			        
            var newItem = '<li class="list-group-item est-select"><span>' + $(this).find('.est-nombre').html() + '</span>';
            newItem += '<button type="button" class="close btn-elim-est">';
            newItem += '<span aria-hidden="true">&times;</span>';
            newItem += '</button>';
            newItem += '<input type="hidden" name="txtIdEst[]" value="' + $(this).attr('value') + '"/>';
            newItem += '</li>';
            $("#est-list-box").append(newItem);
        } else {
            var idActual = $(this).attr('value');
            $("#est-list-box li").each(function (idx, li) {
                if ($(li).find("input").attr('value') == idActual) {
                    $(li).remove();
                    return false;
                }
            });
        }
    });
}
/* FIN - SELECCIONAR O DESELECCIONAR UN ESTUDIANTE - AUTOR:FELIX */
$(document).on('click', '.btn-elim-est', function (event) {
    event.preventDefault();
    //alert('Eliminando estudiante.....'+$(this).parent().find('span').html());
    var id = $(this).parent().attr('id');
    //alert('Eliminando estudiante.....'+id);
    $(this).parent().remove();
    var color = ($(this).data('color') ? $(this).data('color') : "primary"),
            style = ($(this).data('style') == "button" ? "btn-" : "list-group-item-");
    $('#check-list-box li').each(function (idx, li) {
        if ($(li).attr('id') == id) {
            // $(li).removeClass('active');
            $(li).removeClass(style + color + ' active');
            $(li).find('.state-icon').removeClass('glyphicon-check');
            $(li).find('.state-icon').addClass('glyphicon-unchecked');
        }
    });
    //$('.est-item').attr.removeClass('active');
    //alert($('#tabla-asientos tr').length);
    //var id = $(this).parent().siblings('.tdId').children('input[name=txtId]').val();
});

/* FIN - SELECCIONAR O DESELECCIONAR UN ESTUDIANTE - AUTOR:FELIX */

$(document).on('change', '#selCurso', function (event) {
    event.preventDefault();
    // alert("ID CURSO: "+$(this).val());
    // alert("URL: "+$('#urlListEstByCurso').val());
    var idcur = $(this).val();
    $.ajax({
        url: $('#urlListEstByCurso').val(),
        data: {id: idcur},
        type: 'POST',
        dataType: 'html',
        success: function (datos_recibidos) {
            $('.pnlListEstudiantes').html(datos_recibidos);
            funcionBaseUno();
            funcionBaseDos();
        },
        error: function (xhr, status) {
            alert('Disculpe, existio un problema');
        }
    });
});