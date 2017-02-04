<br>
<div class="cabecera">
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="contLogoSystem">
                    <img width="70" height="70" class="img-responsive imgSystem" alt="" src="<?php echo base_url();?>resources/base/img/escudo_oficial.png">
                </div>
                    <div class="barra">
                        <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       <a href="<?php echo site_url('login/index');?>" class="navbar-brand">INICIO</a>
            </div>
            </div>

                <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="nav navbar-nav">
                        <!--<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Institución<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Gestión de Cursos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php //echo site_url('institucion/crud_faltas'); ?>">Gestión Faltas</a></li>
                            <li><a href="#">Gestión Diciplinario</a></li>
                          </ul>
                        </li>-->
                        <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Docentes<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('docente/registro_docentes'); ?>">Registro de Docentes</a></li>
                                <!--<li><a href="<?php //echo site_url('docente/asignacion_academica'); ?>">Asignación Docente Horario</a></li>-->
                                <!--<li><a href="#">Reporte Docentes</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estudiantes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--
                                  <li><a href="<?php //echo site_url('estudiante/base_view'); ?>">Matricula Estudiantes</a></li>
                                -->
                                <li><a href="<?php echo site_url('estudiante/registro_estudiantes'); ?>">Registro de Estudiantes</a></li>  
                                <li><a href="<?php echo site_url('estudiante/asignar_curso'); ?>">Asignación Estudiante Curso</a></li>
                                <li><a href="#">Registro Academico</a></li>
                                <li><a href="<?php echo site_url('estudiante/form_control_asistencia'); ?>">Registro de Asistencia</a></li>
                                <li><a href="#">Reporte Estudiantes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro Disciplinario<span class="caret"></span></a>
                      <ul class="dropdown-menu">                              
                                <li><a href="<?php echo site_url('estudiante/registro_disciplinario'); ?>">Control Disciplinario</a></li>
                                <li><a href="<?php echo site_url('estudiante/form_registro_disciplinario'); ?>">Registro control Disciplinario</a></li>
                                <li><a href="<?php echo site_url('estudiante/printReporteDisciplinario'); ?>" target="_blank">Resumen Disciplinario</a></li>
                            </ul>
                        </li>
                        <!-- <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes<span class="caret"></span></a>
                           <ul class="dropdown-menu">
                             <li><a href="<?php// echo site_url('estudiante/printReporteListado'); ?>" target="_blank">Listado Estudiantes</a></li>
                             <li><a href="<?php// echo site_url('estudiante/printReporteDisciplinario'); ?>" target="_blank">Resumen Disciplinario</a></li>
                             <li><a href="<?php //echo site_url('estudiante/printReporteListado'); ?>" target="_blank">Resumen Asistencia</a></li>
                             <li><a href="<?php //echo site_url('estudiante/printReporteListado'); ?>" target="_blank">Resumen Notas</a></li>
                           </ul>
                         </li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Configuración <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php //echo site_url('configuracion/backup'); ?>"><span class="glyphicon glyphicon-hdd"></span> Copia de Seguridad</a></li>
                            </ul>
                        </li>-->
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata("paterno"); ?></a></li>
                        <li><a href="<?php echo site_url('login/cerrar'); ?>"><span class="glyphicon glyphicon-off"></span> Cerrar Sesion</a></li>
                    </ul>             
                </div>
            </div>
        </nav>
    </header>
</div>
