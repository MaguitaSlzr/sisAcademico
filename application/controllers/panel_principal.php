<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_principal extends CI_Controller {

    // Definir un constructor
    function __construct() {
        parent::__construct();
        $this->load->model('login_mdl');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
        $this->load->helper('security');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('academico/header');
        $data['errores'] = '';
        $this->load->view('base/panel_principal_view', $data);
        $this->load->view('template/footer');
    }   
     public function index2($data) {
        $this->load->view('template/header');
        $this->load->view('academico/header');       
        $this->load->view('base/panel_principal_view', $data);
        $this->load->view('template/footer');
    }   
}
