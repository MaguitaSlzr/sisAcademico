<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion extends CI_Controller {

    // Definir un constructor
    function __construct() {
        parent::__construct();
        $this->load->database();
        //$this->load->model('institucion_mdl');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
        $this->load->helper('security');
        $this->load->library('pagination');
    }

    public function autenticacion() {
        if (!$this->session->userdata('usuario')) {
            redirect(base_url().'login');
        }
    }

    public function index() {
        $this->autenticacion();
        $this->_example_output((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    /************************************************
     * A PARTIR DE AQUI AGREGAR SUS PROPIOS METODOS *
     ************************************************/
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
*/
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
        $this->load->view('institucion/index', $output);
        $this->load->view('template/footer_grocery');
    }

}
