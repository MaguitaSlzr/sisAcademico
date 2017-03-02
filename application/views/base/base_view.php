<h3 class="tituloPrincipal">SISTEMA  ACADEMICO<br/>MENU PRINCIPAL</h3>
<!--
<p>
  Bienvenido <strong><?php echo $this->session->userdata("usuario")?></strong>.
</p>
-->
<div class="menu-principal" style="text-align:center;">
  <a href="<?php echo site_url('estudiante/registro_estudiantes');?>"><img src="<?php echo base_url();?>resources/base/img/registro_estudiantes.bmp" class="img-rounded" alt="Responsive image" style="margin-right:40px;margin-bottom:20px;"></a>
  <a href="<?php echo site_url('estudiante/asignar_curso');?>"><img src="<?php echo base_url();?>resources/base/img/asigna_curso_estudiante.bmp" class="img-rounded" alt="Responsive image" style="margin-bottom:20px;"></a>
  <a href="<?php echo site_url('estudiante/form_registro_disciplinario');?>"><img src="<?php echo base_url();?>resources/base/img/control_disciplina.bmp" class="img-rounded" alt="Responsive image" style="margin-right:40px;margin-bottom:20px;"></a>
  <a href="<?php echo site_url('estudiante/form_control_asistencia');?>"><img src="<?php echo base_url();?>resources/base/img/reportes.bmp" class="img-rounded" alt="Responsive image" style="margin-bottom:20px;"></a>
</div>