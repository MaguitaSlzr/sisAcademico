<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        if($this->session->userdata('usuario')){
            $this->panel_principal();
        }else{
            $this->panel_login();   
        }
    }

    public function ingresar() {
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'El campo %s esta vacio');
        if($this->form_validation->run()){
            $user=$this->input->post('usuario');
            $pass=$this->input->post('password');
            $usuario=$this->login_mdl->validaUsuario($user, $pass);
            if(isset($usuario)){
                $data=array(
                  'usuario'=>$usuario->pro_nombre,
                  'paterno'=>$usuario->pro_paterno
                );    
                $this->session->set_userdata($data);
                $this->index();
            }else{
                $this->form_validation->set_message('El usuario no existe, verifique sus datos');
                $this->index();
            }
        }else{
            $this->index();
        }
    }

    public function cerrar() {
        $this->session->sess_destroy();
        $this->index();
        redirect(base_url().'login');
    }
    
    public function panel_principal() {
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('base/base_view');
        $this->load->view('template/footer');
    }

    public function panel_login(){
        $this->load->view('template/header');
        $this->load->view('academico/header');
        $this->load->view('login/login_view');
    }
}
