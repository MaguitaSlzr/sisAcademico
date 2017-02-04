<script type="text/javascript">
    /* INICIO - CODIGO OBLIGATORIO */
    $(function () {
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
                updateDisplay();
            });
            $checkbox.on('change', function () {
                updateDisplay();
            });


            // Actions
            function updateDisplay() {
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

                updateDisplay();

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
                // alert('NO SELECIONADO');
                var idActual = $(this).attr('id');
                $("#est-list-box li").each(function (idx, li) {
                    if ($(li).attr('id') == idActual) {
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
</script>
<?php if (isset($mensaje)) { ?>
    <div id="mensaje" class="alert alert-success mensajesDialog" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $mensaje; ?>
    </div>
<?php } ?>
<h3 class="tituloPrincipal">CONTROL DISCIPLINARIO</h3>
<form id='formDisciplinario' action="<?php echo base_url(); ?>estudiante/guarda_disciplinario" method="post">
    <div class="row">
        <div class="col-md-5">
            <input id="urlListEstByCurso" type="hidden" value="<?php echo base_url(); ?>estudiante/lista_estudiantes_por_curso"/>
            <select id="selCurso" class="form-control">
                <?php foreach ($cursos as $c) { ?>
                    <option value="<?php echo $c['curso']->cur_id; ?>"><?php echo $c['curso']->cur_descripcion; ?></option>
                <?php } ?>    
            </select>
            <br/>
            <div class="panel panel-default">
                <div class="panel-body pnlListEstudiantes">                
                    <?php $i = 1; ?>
                    <?php foreach ($cursos[0]['estudiantes'] as $e) { ?>
                        <ul id="check-list-box" class="list-group checked-list-box">
                            <li class="list-group-item est-item" id="<?php echo $i ?>" value="<?php echo $e->est_id ?>"><span class="est-nombre"><?php echo ($i++) . '. ' . $e->est_paterno . ' ' . $e->est_materno . ' ' . $e->est_nombre; ?></span></li>
                        </ul>
                    <?php } ?>       
                </div>
            </div>
            <!--
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ($cursos as $c) { ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="heading<?php echo $c['curso']->cur_id; ?>">
                                <h4 class="panel-title panel-title-adjust">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $c['curso']->cur_id; ?>" aria-expanded="<?php echo $c['curso']->cur_id == 1 ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $c['curso']->cur_id; ?>">
                <?php echo $c['curso']->cur_sigla; ?>
                                    </a>
                                </h4>
                            </div>                        
                            <div id="collapse<?php echo $c['curso']->cur_id; ?>" class="panel-collapse collapse <?php echo $c['curso']->cur_id == 1 ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $c['curso']->cur_id; ?>">
                                <div class="panel-body">                                
                <?php $i = 1; ?>
                <?php foreach ($c['estudiantes'] as $e) { ?>
                                            <ul id="check-list-box" class="list-group checked-list-box">
                                                <li class="list-group-item est-item" id="<?php echo $i ?>" value="<?php echo $e->est_id ?>"><span class="est-nombre"><?php echo ($i++) . '. ' . $e->est_paterno . ' ' . $e->est_materno . ' ' . $e->est_nombre; ?></span></li>
                                            </ul>
                <?php } ?>       
                                </div>
                            </div>
                        </div>
            <?php } ?>
            </div>
            -->
        </div>
        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        ESTUDIANTES IMPLICADOS
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="media">
                        <ul id="est-list-box" class="list-group">
                            <!-- ESTUDIANTES SELECCIONADOS -->
                        </ul>
                    </div>
                </div>
                <div class="panel panel-primary">                
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            REGISTRO DE CASO
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datepicker">Fecha</label>
                                    <input type="text" class="form-control datepicker-input" id="datepicker" name="fecha" placeholder="FECHA">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="responsable">Caso atendido por</label>                            
                                     <select id="responsable" name="responsable" class="form-control">
                                         <option value="0">-- Seleccione un profesor --</option>-->
                                    <?php //foreach ($profesores as $p) { ?>
                                    <!--<option value="--><?php //echo $p->pro_id;             ?><!--">--><?php //echo $p->pro_paterno.' '.$p->pro_materno.' '.$p->pro_nombre;             ?><!--</option>
                                    <?php //}  ?>
                            </select>-->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="falta">Caso</label>
                                    <?php foreach ($faltas as $f) { ?>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="falta" value="<?php echo $f->ptd_id; ?>" >
                                                <?php echo $f->ptd_descripcion; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="relacion">Relación del hecho</label>
                            <textarea id="relacion" name="relacion" rows="12" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="solucion">Solución</label>
                            <textarea id="solucion" name="solucion" rows="12" class="form-control"></textarea>
                        </div>
                        <!--<button class="btn btn-success">Generar Citación</button>-->
                        <!--<button class="btn btn-success">Generar Carta de Compromiso</button>-->

                        <button class="btn btn-primary col-xs-12" id="get-checked-data">Enviar Datos</button>
                        <button id="btnGuardarEstudiante" class="btn btn-primary" onclick="guardarDisciplinario()"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar y Salir</button>
                        <button class="btn btn-default">Cancelar</button>
                    </div>

                    <pre id="display-json"></pre>
                </div>            
            </div>
        </div>
</form>
<script src="<?php echo base_url(); ?>resources/base/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>resources/base/js/language-es.js"></script>
<script src="<?php echo base_url(); ?>resources/estudiante/js/control_disciplinario.js"></script>
