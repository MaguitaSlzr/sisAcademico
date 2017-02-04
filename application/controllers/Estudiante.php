<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

    // Definir un constructor
    function __construct() {
        parent::__construct();
        //$this->load->database();
        $this->load->model('estudiante_mdl');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->library('pagination');
    }

    public function autenticacion() {
        if (!$this->session->userdata('usuario')) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->autenticacion();
    }

    /*     * **********************************************
     * A PARTIR DE AQUI AGREGAR SUS PROPIOS METODOS *
     * ********************************************** */
    /*
      public function base_view() {
      $this->autenticacion();
      $crud = new grocery_CRUD();
      $crud->set_table('estudiante');
      $crud->columns('est_ci','est_rude','est_nombre','est_paterno','est_materno','est_fechanac','est_direccion','est_email','est_telefono','est_movil');
      $crud->display_as('est_id', 'ID')
      ->display_as('est_ci', 'CI')
      ->display_as('est_nombre', 'Nombre')
      ->display_as('est_paterno', 'Ap. Paterno')
      ->display_as('est_materno', 'Ap. Materno')
      ->display_as('est_fechanac', 'Fecha Nac.')
      ->display_as('est_direccion', 'Direccion')
      ->display_as('est_telefono', 'Telefono')
      ->display_as('est_movil', 'Movil')
      ->display_as('est_login', 'Login')
      ->display_as('est_password', 'Password')
      ->display_as('est_rude', 'RUDE')
      ->display_as('par_expedido_id', 'Expedido')
      ->display_as('par_genero_id', 'Genero');

      $crud->set_subject('Estudiante');
      $crud->set_relation('par_genero_id', 'par_genero', 'ugn_descripcion');
      $crud->set_relation('par_expedido_id', 'par_expedido', 'uexp_denominacion');
      $crud->set_relation('rol_id', 'rol', 'rl_denominacion');
      $crud->set_relation('estado_id', 'estado', 'descripcion');
      $crud->set_relation('curso_id', 'curso', 'cur_descripcion');

      $output = $crud->render();
      $this->_example_output($output);
      }

      public function crud_faltas() {
      $this->autenticacion();
      $crud = new grocery_CRUD();
      $crud->set_table('par_tipo_falta');
      $crud->columns('ptf_id','ptf_codigo','ptf_descripcion');
      $crud->display_as('ptf_id','ID');
      $crud->display_as('ptf_codigo','CODIGO');
      $crud->display_as('ptf_descripcion','DESCRIPCION');
      $crud->set_subject('Faltas');
      $output = $crud->render();
      $this->_example_output($output);
      }

      public function _example_output($output = null){
      $this->load->view('template/header_grocery', $output);
      $this->load->view('template/menu');
      $this->load->view('estudiante/index.php', $output);
      $this->load->view('template/footer_grocery');
      }
     */

//**** INICIO CRUD ESTUDIANTE ****//
    private function paginarEstudiantes() {
        $config['base_url'] = base_url() . 'estudiante/registro_estudiantes/';
        $config['total_rows'] = $this->estudiante_mdl->num_estudiantes();
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Ultimo';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';

        $config['full_tag_open'] = '<div class="paginador"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul"></nav></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        return $this->estudiante_mdl->get_estudiantes($config['per_page']);
    }

    private function paginarDisciplina() {
        $config['base_url'] = base_url() . 'estudiante/registro_disciplinario/';
        $config['total_rows'] = $this->estudiante_mdl->num_disciplina();
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Ultimo';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';

        $config['full_tag_open'] = '<div class="paginador"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul"></nav></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        return $this->estudiante_mdl->get_disciplinas($config['per_page']);
    }

    public function vistaListarEstudiantes($mensaje) {
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data = array(
            'estudiantes' => $this->paginarEstudiantes(),
            'paginacion' => $this->pagination->create_links(),
            'mensaje' => $mensaje,
            'expedidos' => $this->estudiante_mdl->getAllExpedidos(),
            'cursos' => $this->estudiante_mdl->getAllCursos(),
            'meses' => $this->getMeses(),
        );
        $this->load->view('estudiante/registro_estudiantes', $data);
        $this->load->view('template/footer');
    }

    public function vistaListarDisciplina($mensaje) {
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data = array(
            'faltas' => $this->estudiante_mdl->getAllTipoDisciplinario(),
            'profesores' => $this->estudiante_mdl->getAllDocentes(),
            'cursos' => $this->allEstudiantesByCurso(),
            'mensaje' => $mensaje,
        );
        $this->load->view('estudiante/control_disciplinario', $data);
        $this->load->view('template/footer');
    }

    public function vistaListarDisciplina2($mensaje) {
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data = array(
            'disciplinas' => $this->paginarDisciplina(),
            'paginacion' => $this->pagination->create_links(),
            'mensaje' => $mensaje,
        );
        $this->load->view('estudiante/registro_disciplinario', $data);
        $this->load->view('template/footer');
    }

    public function getMeses() {
        $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        return $meses;
    }

    public function registro_estudiantes() {
        $this->autenticacion();
        $this->vistaListarEstudiantes(null);
    }

    public function registro_disciplinario() {
        $this->autenticacion();
        $this->vistaListarDisciplina2(null);
    }

    public function guardarEstudiante() {
        $this->autenticacion();
        $rude = $this->input->post('txtRudeNuevo');
        $ci = $this->input->post('txtCiNuevo');
        $exp = $this->input->post('selExpedidoNuevo');
        $nombre = strtoupper($this->input->post('txtNombreNuevo'));
        $paterno = strtoupper($this->input->post('txtPaternoNuevo'));
        $materno = strtoupper($this->input->post('txtMaternoNuevo'));
        $nombreApoderado = strtoupper($this->input->post('txtNombreApoderadoNuevo'));
        $parentesco = $this->input->post('selParentescoNuevo');
        $direccion = strtoupper($this->input->post('txtDireccionNuevo'));
        $email = $this->input->post('txtEmailNuevo');
        $telefono = $this->input->post('txtTelefonoNuevo');
        $celular = $this->input->post('txtCelularNuevo');
        $dia = $this->input->post('selNuevoDia');
        $mes = $this->input->post('selNuevoMes');
        $anio = $this->input->post('selNuevoAnio');
        $fechaNac = $anio . '-' . $mes . '-' . $dia;
        $genero = $this->input->post('rbnGeneroNuevo');
        $curso = $this->input->post('selCursoNuevo') != 0 ? $this->input->post('selCursoNuevo') : NULL;

        $usuario = strtoupper($this->input->post('txtUsuarioNuevo'));
        $password = $this->input->post('txtPasswordNuevo');
        $fechaReg = date('Y-m-d');

        $this->estudiante_mdl->addEstudiante($rude, $ci, $nombre, $paterno, $materno, $direccion, $email, $telefono, $celular, $fechaNac, $genero, $usuario, $password, $fechaReg, $exp, $curso, $nombreApoderado, $parentesco);

        // VERIFICANDO QUE SE HA ENVIADO UNA FOTO 
        /*
          $str=$_FILES['files']['name'];
          echo explode(".", $str)[1];
         */
        if (!empty($_FILES['files']['name'])) {
            $id = $this->estudiante_mdl->getUltimoIdEstudiante();
            $nombre_archivo = $paterno . '_' . $nombre . '_' . $id . '.' . explode(".", $_FILES['files']['name'])[1];
            // GUARDANDO NOMBRE DE ARCHIVO EN LA BD
            $this->estudiante_mdl->saveNombreFotoEstudiante($id, $nombre_archivo);
            // GUARDANDO FOTOGRAFIA...
            $foto = 'files';
            $config['upload_path'] = "./uploads/";
            $config['file_name'] = $nombre_archivo;
            $config['allowed_types'] = "gif|jpg|png";
            $config['max_size'] = "2000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($foto)) {
                //*** ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            }
            $data['uploadSuccess'] = $this->upload->data();
        }

        $this->vistaListarEstudiantes('El estudiante <strong>' . $paterno . ' ' . $materno . ' ' . $nombre . '</strong> fue adicionado exitosamente...');
    }

    public function buscarEstudiante() {
        $this->autenticacion();
        $estudiante = $this->estudiante_mdl->getEstudiante($this->input->post('id'));
        //print_r($estudiante);
        if ($estudiante) {
            echo json_encode($estudiante);
        } else {
            echo "El estudiante no existe...";
        }
    }

    public function eliminarEstudiante() {
        $this->autenticacion();
        $id = $this->input->get('id');
        $e = $this->estudiante_mdl->getEstudiante($id);
        $this->estudiante_mdl->deleteEstudiante($id);
        $this->vistaListarEstudiantes('El Estudiante <strong>' . $e->est_paterno . ' ' . $e->est_materno . ' ' . $e->est_nombre . '</strong> fue eliminado(a) exitosamente...');
    }

    public function editarEstudiante() {
        $this->autenticacion();

        $id = $this->input->post('idEditar');
        $rude = $this->input->post('txtRudeEditar');
        $ci = $this->input->post('txtCiEditar');
        $exp = $this->input->post('selExpedidoEditar');
        $nombre = strtoupper($this->input->post('txtNombreEditar'));
        $paterno = strtoupper($this->input->post('txtPaternoEditar'));
        $materno = strtoupper($this->input->post('txtMaternoEditar'));
        $dia = $this->input->post('selEditarDia');
        $mes = $this->input->post('selEditarMes');
        $anio = $this->input->post('selEditarAnio');
        $fechaNac = $anio . '-' . $mes . '-' . $dia;
        $nombreApoderado = strtoupper($this->input->post('txtNombreApoderadoEditar'));
        $parentesco = $this->input->post('selParentescoEditar');
        $direccion = strtoupper($this->input->post('txtDireccionEditar'));
        $email = $this->input->post('txtEmailEditar');
        $telefono = $this->input->post('txtTelefonoEditar');
        $celular = $this->input->post('txtCelularEditar');
        $genero = $this->input->post('rbnGeneroEditar');
        $estado = $this->input->post('rbnEstadoEditar');
        $curso = $this->input->post('selCursoEditar') != 0 ? $this->input->post('selCursoEditar') : NULL;
        $usuario = strtoupper($this->input->post('txtUsuarioEditar'));
        $password = $this->input->post('txtPasswordEditar');

        /*
          echo 'ID: '.$id.'<br/>';
          echo 'RUDE: '.$rude.'<br/>';
          echo 'CI: '.$ci.'<br/>';
          echo 'EXP: '.$exp.'<br/>';
          echo 'Nombre: '.$nombre.'<br/>';
          echo 'Pat: '.$paterno.'<br/>';
          echo 'Mat: '.$materno.'<br/>';
          echo 'APODERADO: '.$nombreApoderado.'<br/>';
          echo 'PARENTESCO: '.$parentesco.'<br/>';
          echo 'Dir: '.$direccion.'<br/>';
          echo 'Email: '.$email.'<br/>';
          echo 'Tel: '.$telefono.'<br/>';
          echo 'Cel: '.$celular.'<br/>';
          echo 'Fecha Nac: '.$fechaNac.'<br/>';
          echo 'SEX: '.$genero.'<br/>';
          echo 'ESTADO: '.$estado.'<br/>';
          echo 'CURSO: '.$curso.'<br/>';
          echo 'Usuario: '.$usuario.'<br/>';
          echo 'Pass: '.$password.'<br/>';
         */

        $this->estudiante_mdl->updateEstudiante($id, $rude, $ci, $exp, $nombre, $paterno, $materno, $nombreApoderado, $parentesco, $direccion, $email, $telefono, $celular, $fechaNac, $genero, $estado, $curso, $usuario, $password);
        //print_r($_FILES['filesEditar']['name']);
        if (!empty($_FILES['filesEditar']['name'])) {
            // ELIMINANDO ARCHIVO ANTIGUO
            $img = $this->estudiante_mdl->getNombreFotoArchivo($id);
            if (isset($img)) {
                unlink('./uploads/' . $img);
            }
            // DEFINIENDO NOMBRE DEL ARCHIVO
            $nombre_archivo = $paterno . '_' . $nombre . '_' . $id . '.' . explode(".", $_FILES['filesEditar']['name'])[1];
            // GUARDANDO NOMBRE DE ARCHIVO EN LA BD
            $this->estudiante_mdl->saveNombreFotoEstudiante($id, $nombre_archivo);
            // GUARDANDO FOTOGRAFIA...
            $foto = 'filesEditar';
            $config['upload_path'] = "./uploads/";
            $config['file_name'] = $nombre_archivo;
            $config['allowed_types'] = "gif|jpg|png";
            $config['max_size'] = "2000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($foto)) {
                //*** ocurrio un error
                $data['uploadError'] = $this->upload->display_errors();
                echo $this->upload->display_errors();
                return;
            }
            $data['uploadSuccess'] = $this->upload->data();
        }


        $this->vistaListarEstudiantes('El estudiante <strong>' . $paterno . ' ' . $materno . ' ' . $nombre . '</strong> fue exitosamente editado...');
    }

    // BUSCADOR DE DOCENTES FILTRO
    public function buscar_estudiante() {
        $dato = $this->input->post('txtParametroBusqueda');
        $data = array(
            'estudiantes' => $this->estudiante_mdl->getEstudiantesGeneral($dato),
            'paginacion' => $this->pagination->create_links(),
        );
        $this->load->view('estudiante/include/include_lista_estudiante', $data);
    }

//**** FIN CRUD ESTUDIANTE ****//
//**** INICIO ASIGNAR CURSO ****//
    public function asignar_curso() {
        $this->autenticacion();
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data = array(
            'estNoAsignados' => $this->estudiante_mdl->getAllEstNoAsignados(),
            'cursos' => $this->allEstudiantesByCurso(),
        );
        $this->load->view('estudiante/asignar_curso', $data);
        $this->load->view('template/footer');
    }

    public function allEstudiantesByCurso() {
        $cursos = $this->estudiante_mdl->getAllCursos();
        $curso_estudiantes = array();
        $i = 0;
        foreach ($cursos as $c) {
            $curso_estudiantes[$i] = [
                'curso' => $c,
                'estudiantes' => $this->estudiante_mdl->getAllEstudiantesAsignados($c->cur_id),
                'nroVarones' => $this->estudiante_mdl->countEstudiantesVaronesByIdCurso($c->cur_id),
                'nroMujeres' => $this->estudiante_mdl->countEstudiantesMujeresByIdCurso($c->cur_id),
            ];
            $i++;
        }
        return $curso_estudiantes;
    }

    public function desagregar_estudiante() {
        $this->autenticacion();
        $id = $this->input->get('id');
        $this->estudiante_mdl->desagregarDeCursoByIdEstudiante($id);
        $this->asignar_curso();
    }

    public function cambiarEstudianteCurso() {
        $this->autenticacion();
        $id_estudiante = $this->input->post('txtIdAsignarEstudiante');
        $id_curso = $this->input->post('selCursoCambio');
        /*
          echo 'ID ESTUDIANTE: '.$id_estudiante.'<br/>';
          echo 'CURSO: '.$id_curso.'<br/>';
         */
        $this->estudiante_mdl->cambioCursoByIdEstudiante($id_estudiante, $id_curso);
        $this->asignar_curso();
    }

//**** FIN ASIGNAR CURSO ****//
//**** INICIO SEGUIMIENTO ACADEMICO ****//
    // Aqui codigo para seguiemiento academico
//**** FIN SEGUIMIENTO ACADEMICO ****//    
//**** INICIO CONTROL DE ASISTENCIA ****//
    public function form_control_asistencia() {
        $this->autenticacion();
        $data = array(
            'cursos' => $this->estudiante_mdl->getAllCursos(),
            'faltas' => $this->estudiante_mdl->getAllTipoFaltas(),
            'materias' => $this->estudiante_mdl->getAllMaterias(),
            //'estudiantes' => $this->estudiante_mdl->getAllEstudiantesByIdCurso(8),
            //'estudiantes' => $this->estudiante_mdl->getAllEstudiantes()
        );
        $this->load->view('estudiante/control_asistencia.php', $data);
    }

    public function curso_estudiantes(){
        $id_curso=$this->input->get('idcurso');
        $estudiantes = $this->estudiante_mdl->getAllEstudiantesByIdCurso($id_curso);
        echo json_encode($estudiantes);
    }

    public function guardar_registro_asistencia() {
        $data = array(
            'mensaje' => 'Los datos se han registrado correctamente.'
        );
        $this->load->view('estudiante/modal/mod_mensajes.php', $data);
    }

//**** FIN CONTROL DE ASISTENCIA ****//
//**** INICIO CONTROL DISCIPLINARIO ****//
    public function form_registro_disciplinario() {
        $this->autenticacion();
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data = array(
            'faltas' => $this->estudiante_mdl->getAllTipoDisciplinario(),
            'profesores' => $this->estudiante_mdl->getAllDocentes(),
            'cursos' => $this->allEstudiantesByCurso(),
        );
        $this->load->view('estudiante/control_disciplinario.php', $data);
        $this->load->view('template/footer');
    }

    public function guarda_disciplinario() {
        $this->autenticacion();
        $fecha1 = $this->input->post('fecha');
        $fecha = date('Y-m-d', strtotime($fecha1));
        $falta = strtoupper($this->input->post('falta'));
        $relacion = strtoupper($this->input->post('relacion'));
        $solucion = strtoupper($this->input->post('solucion'));
        $id_estudiantes[]=$this->input->post('txtIdEst');
        foreach ($id_estudiantes[0] as $ide) {
            echo $ide."<br>";
            $this->estudiante_mdl->addDisciplinario($ide, $fecha, $falta, $relacion, $solucion);
        }
        /*
        $estudiante = strtoupper($this->input->post('estudiante'));       

        $this->vistaListarDisciplina('El registro fue adicionado exitosamente...');
         */
    }

//**** FIN CONTROL DISCIPLINARIO ****//

    public function printReporteListado() {
        $this->autenticacion();
        $this->load->helper(array('dompdf', 'file'));
        $data = array(
            'estudiantes' => $this->estudiante_mdl->getAllEstudiantes(),
        );
        $html = $this->load->view('estudiante/reportes/print_lista', $data, true);
        pdf_create($html, 'reporte', false);
    }

    public function printReporteDisciplinario() {
        $this->autenticacion();
        $this->load->helper(array('dompdf', 'file'));
        $data = array(
            'estudiantes' => $this->estudiante_mdl->getAllEstudiantesDisciplinario(),
        );
        $html = $this->load->view('estudiante/reportes/print_disciplinario', $data, true);
        pdf_create($html, 'reporte', false);
    }
    
    public function lista_estudiantes_por_curso(){
        $this->autenticacion();
        $id=$this->input->post('id');
        $estudiantes=$this->estudiante_mdl->getAllEstudiantesByIdCurso($id);
        $out="";
        if(count($estudiantes)>0){
            foreach ($estudiantes as $e){
                // $out.=$e->est_nombre.'<br/>';
                $out.='<ul id="check-list-box" class="list-group checked-list-box">';
                $out.='<li class="list-group-item est-item" value="'.$e->est_id.'"><span class="est-nombre"> '.$e->est_paterno.' '.$e->est_materno.' '.$e->est_nombre.'</span></li>';
                $out.='</ul>';
            }
        }else{
            $out='Sin estudiantes....';
        }
        // echo "Buscando estudiantes del curso: ".$id;
        echo $out;
    }
}
