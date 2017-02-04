<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//msalazar
class Academico extends CI_Controller {

    // Definir un constructor
    function __construct() {
        parent::__construct();
        $this->load->model('Estudiante');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    function index() {
        $this->load->view('template/header');
        $this->load->view('academico/header');
        $this->load->view('academico/index');
        $this->load->view('template/footer');
    }

    /*
    function listEstudiantes() {
        //obtenemos todos los usuarios
        $estudiantes = $this->Estudiante->getAllEstudiantes();
        //creamos una variable usuarios para pasarle a la vista
        $data['estudiantes'] = $estudiantes;
        //cargamos nuestra vista
        $this->load->view('academico/index', $data);
    }
    */

    function listEstudiantes(){
        $html='
        <h2>Lista de Estudiantes</h2>
        <table class="table table-striped">
            <tr>
                <th class="col-md-2 cabezaTabla">ID</th>
                <th class="col-md-6 cabezaTabla">NOMBRE</th>
                <th class="col-md-3 cabezaTabla">EDAD</th>
                <th class="col-md-1 cabezaTabla">ACCIONES</th>
            </tr>';
        foreach ($this->Estudiante->getAllEstudiantes() as $estudiante) {
        $html.='<tr>
                    <td>'.$estudiante->idestudiante.'</td>
                    <td>'.$estudiante->nombre.'</td>
                    <td>'.$estudiante->edad.'</td>
                    <td>
                        <a href="javascript:void(0)" title="Eliminar" onclick="eliminar('.$estudiante->idestudiante.')">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                        <a href="javascript:void(0)" title="Modificar" onclick="editar('.$estudiante->idestudiante.')" data-toggle="modal" data-target="#modalEditar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="javascript:void(0)" title="Ver" onclick="ver('.$estudiante->idestudiante.')" data-toggle="modal" data-target="#modalVer">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td>
                </tr>';
        }
        $html.='</table>';
        echo $html;
    }
    
    function saveEstudiante(){
        if($this->input->is_ajax_request()){
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|xss_clean');
            $this->form_validation->set_rules('edad', 'Edad', 'required|numeric|trim|xss_clean');
                 
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');

            if ($this->form_validation->run() == TRUE){
                $nombre = $this->input->post('nombre');
                $edad = $this->input->post('edad');
                $this->Estudiante->addEstudiante($nombre,$edad); 
                echo '<div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <strong>Guardado!</strong> El registro fue guardado exitosamente...
                      </div>';             
            }else{
                echo '<div class="alert alert-danger">
                        <strong>Errores!</strong><br>'.validation_errors().'
                      </div>';
            } 
        } else {
            show_404();
        }
    }

    public function deleteEstudiante(){
        if($this->input->is_ajax_request()) {
            $respuesta = $this->Estudiante->getEstudiante($this->input->post('id'));
            if($respuesta==false)
                echo "Usuario Inválido (No Existe)";
            else {
                $this->Estudiante->removeEstudiante($this->input->post('id'));
                echo '<div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <strong>Eliminado!</strong> El registro fue eliminado exitosamente...
                      </div>';
            }
        }
        else {
            show_404();    
        }
    }

    public function buscarEstudiante(){
        if($this->input->is_ajax_request()) {
            $respuesta = $this->Estudiante->getEstudiante($this->input->post('id'));
            if($respuesta==false){
                echo "Usuario Invpalido (No Existe)";
            }
            else {
                echo json_encode($respuesta);
            }
        } else{ 
            show_404();
        }
    }

    public function updateEstudiante(){
         
        
        if($this->input->is_ajax_request()) {
            //echo "HOLAAAAAAAAAAA..................".$this->input->post('idEditar');
            
            
            $respuesta = $this->Estudiante->getEstudiante($this->input->post('idEditar'));
            if($respuesta==false) {
                echo "Usuario Inválido (No Existe)";
            } else {
                $this->form_validation->set_rules('idEditar', 'ID', 'required|numeric|trim|xss_clean');
                $this->form_validation->set_rules('nombreEditar', 'Nombre', 'required|trim|xss_clean');
                $this->form_validation->set_rules('edadEditar', 'Edad', 'required|numeric|trim|xss_clean');
                                     
                $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
                $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
                
                if ($this->form_validation->run() == TRUE){
                    $id = $this->input->post('idEditar');
                    $nombre = $this->input->post('nombreEditar');
                    $edad = $this->input->post('edadEditar');
                    $this->Estudiante->modificarEstudiante($id,$nombre,$edad);
                    echo '<div class="alert alert-success">
                            <span class="glyphicon glyphicon-ok"></span>
                            <strong>Editado!</strong> El registro fue editado exitosamente...
                          </div>';             
                } else {
                    echo '<div class="alert alert-danger">
                            <strong>Errores al Modificar!</strong><br>'.validation_errors().'
                          </div>';
                }
            }
        } else {
            show_404();
        }
    }
}
