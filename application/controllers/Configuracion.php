<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
        $this->load->helper('security');
    }

    public function autenticacion() {
        if (!$this->session->userdata('usuario')) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->autenticacion();
        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    /************************************************
     * A PARTIR DE AQUI AGREGAR SUS PROPIOS METODOS *
     ************************************************/

    public function backup() {
        $C_SERVER = 'localhost';
        $C_BASE_DATOS = 'bd_sisacademico';
        $C_USUARIO = 'root';
        $C_CONTRASENA = '';
        $C_RUTA_ARCHIVO = 'C:\wamp\www\sisAcademico\application\backups\back_' . date("Y_m_d_H_i_s") . '.sql';
        $C_COMPRIMIR_MYSQL = "true";

        $commands = "mysqldump --add-drop-database -c -f -h " . $C_SERVER . " " . $C_BASE_DATOS . " -u " . $C_USUARIO . $C_CONTRASENA . " -r \"" . $C_RUTA_ARCHIVO . "\" 2>&1";

        system($commands, $output);
        if ($C_COMPRIMIR_MYSQL == 'true') {
            system('bzip2"' . $C_RUTA_ARCHIVO . '"');
        }
        $this->_example_output($output);
    }

    public function _example_output($output = null) {
        $this->load->view('template/header', $output);
        $this->load->view('template/menu');
        $this->load->view('base/base_view');
        $this->load->view('template/footer');
    }

}
