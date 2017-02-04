<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

    // Definir un constructor
    function __construct() {
        parent::__construct();
        $this->load->model('docente_mdl');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
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
    }

    /************************************************
     * A PARTIR DE AQUI AGREGAR SUS PROPIOS METODOS *
     ************************************************/

    private function paginarDocentes(){
        $config['base_url']=base_url().'docente/registro_docentes/';
        $config['total_rows']=$this->docente_mdl->num_docentes();
        $config['per_page']=10;
        $config['num_links']=4;
        $config['first_link']='Primero';
        $config['last_link']='Ultimo';
        $config['next_link']='Siguiente';
        $config['prev_link']='Anterior';

        $config['full_tag_open']='<div class="paginador"><nav><ul class="pagination">';
        $config['full_tag_close']='</ul"></nav></div>';
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

        return $this->docente_mdl->get_docentes($config['per_page']);
    }

    public function vistaListarDocentes($mensaje){
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data=array(
            'docentes'=>$this->paginarDocentes(),
            'paginacion'=>$this->pagination->create_links(),
            'mensaje'=>$mensaje,
            'expedidos'=>$this->docente_mdl->getAllExpedidos(),
        );
        $this->load->view('docente/registro_docentes', $data);
        $this->load->view('template/footer');
    }

    public function registro_docentes() {
        $this->autenticacion();
        $this->vistaListarDocentes(null);
    }

    public function eliminarDocente(){
        $this->autenticacion();
        $id=$this->input->get('id');
        $d = $this->docente_mdl->getDocente($id);
        $this->docente_mdl->deleteDocente($id);
        $this->vistaListarDocentes('El docente <strong>'.$d->pro_paterno.' '.$d->pro_materno.' '.$d->pro_nombre.'</strong> fue eliminado(a) exitosamente...');
    }

    public function buscarDocente(){
        $this->autenticacion();
        $docente = $this->docente_mdl->getDocente($this->input->post('id'));
        if($docente){
            echo json_encode($docente);
        }
        else {
            echo "El docente no existe...";
        }
    }

    public function guardarDocente(){
        $this->autenticacion();
        // CODIGO PARA GUARDAR DOCENTE
        $ci=$this->input->post('txtCiNuevo');
        $exp=$this->input->post('selExpedidoNuevo');
        $nombre=strtoupper($this->input->post('txtNombreNuevo'));
        $paterno=strtoupper($this->input->post('txtPaternoNuevo'));
        $materno=strtoupper($this->input->post('txtMaternoNuevo'));
        $direccion=strtoupper($this->input->post('txtDireccionNuevo'));
        $email=$this->input->post('txtEmailNuevo');
        $telefono=$this->input->post('txtTelefonoNuevo');
        $celular=$this->input->post('txtCelularNuevo');
        $genero=$this->input->post('rbnGeneroNuevo');

        $usuario=strtoupper($this->input->post('txtUsuario'));
        $password=$this->input->post('txtPassword');
        $estado=$this->input->post('rbnEstado');
    
        $fecha=date('Y-m-d');
        $gestion=date('Y');
        
        $this->docente_mdl->addDocente($ci,$nombre,$paterno,$materno,$direccion,$email,$telefono,$celular,$genero,$usuario,$password,$estado,$fecha,$gestion,$exp);
        
        /*
        echo 'CI: '.$ci.'<br/>';
        echo 'EXP: '.$exp.'<br/>';
        echo 'Nombre: '.$nombre.'<br/>';
        echo 'Pat: '.$paterno.'<br/>';
        echo 'Mat: '.$materno.'<br/>';
        echo 'Dir: '.$direccion.'<br/>';
        echo 'Email: '.$email.'<br/>';
        echo 'Tel: '.$telefono.'<br/>';
        echo 'Cel: '.$celular.'<br/>';
        echo 'SEX: '.$genero.'<br/>';
        echo 'Usuario: '.$usuario.'<br/>';
        echo 'Pass: '.$password.'<br/>';
        echo 'Estado: '.$estado.'<br/>';
        echo 'FECHA: '.$fecha.'<br/>';
        echo 'AÑO: '.$gestion;
        */

        $this->vistaListarDocentes('El docente <strong>'.$paterno.' '.$materno.' '.$nombre.'</strong> fue adicionado exitosamente...');
    }

    public function actualizarDocente1(){
        $this->autenticacion();
        $id=$this->input->post('idEditar');
        $ci=$this->input->post('ciEditar');
        $exp=$this->input->post('expedidoEditar');
        $nombre=strtoupper($this->input->post('nombreEditar'));
        $paterno=strtoupper($this->input->post('paternoEditar'));
        $materno=strtoupper($this->input->post('maternoEditar'));
        $direccion=strtoupper($this->input->post('direccionEditar'));
        $email=$this->input->post('emailEditar');
        $telefono=$this->input->post('telefonoEditar');
        $celular=$this->input->post('celularEditar');
        $genero=$this->input->post('generoEditar');
        $usuario=strtoupper($this->input->post('nombreUsuarioEditar'));
        $estado=$this->input->post('estadoUsuarioEditar');
        /*
        echo 'ID: '.$id.'<br/>';
        echo 'CI: '.$ci.'<br/>';
        echo 'EXP: '.$exp.'<br/>';
        echo 'Nombre: '.$nombre.'<br/>';
        echo 'Pat: '.$paterno.'<br/>';
        echo 'Mat: '.$materno.'<br/>';
        echo 'Dir: '.$direccion.'<br/>';
        echo 'Email: '.$email.'<br/>';
        echo 'Tel: '.$telefono.'<br/>';
        echo 'Cel: '.$celular.'<br/>';
        echo 'SEX: '.$genero.'<br/>';
        echo 'USER: '.$usuario.'<br/>';
        echo 'Estado: '.$estado.'<br/>';
        */
        
        $this->docente_mdl->updateDocente1($id,$ci,$nombre,$paterno,$materno,$direccion,$email,$telefono,$celular,$genero,$exp,$usuario,$estado);
        
        $this->vistaListarDocentes('El docente <strong>'.$paterno.' '.$materno.' '.$nombre.'</strong> fue exitosamente editado...');
    }

    public function actualizarDocente2(){
        $this->autenticacion();
        $id=$this->input->post('idEditar');
        $password=$this->input->post('passwordUsuarioEditar');

        $usuario=$this->docente_mdl->getDocenteById($id);
        $paterno=$usuario->pro_paterno;
        $materno=$usuario->pro_materno;
        $nombre=$usuario->pro_nombre;
        $nomCompleto=$paterno.' '.$materno.' '.$nombre;
        /*
        echo 'ID: '.$id.'<br/>';
        echo 'Pass: '.$password.'<br/>';
        echo 'Completo: '.$nomCompleto.'<br/>';
        */
        $this->docente_mdl->updateDocente2($id,$password);
        $this->vistaListarDocentes('El password de <strong>'.$nomCompleto.'</strong> fue modificado...');
    }

// BUSCADOR DE DOCENTES FILTRO

    public function buscar_docente(){
        $dato=$this->input->post('txtParametroBusqueda');
        $data=array(
            'docentes'=>$this->docente_mdl->getDocentesGeneral($dato),
            'paginacion'=>$this->pagination->create_links(),
        );
        $this->load->view('docente/include/include_lista_docente', $data);
    }

// ASIGNACION ACADEMICA
    public function vistaListarAsignacionAcademica($mensaje){
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $data=array(
            //'docentes'=>$this->paginarDocentes(),
            //'paginacion'=>$this->pagination->create_links(),
            'profesores'=>$this->docente_mdl->getAllDocentesActivos(),
            'mensaje'=>$mensaje,
            //'expedidos'=>$this->docente_mdl->getAllExpedidos(),
        );
        $this->load->view('docente/asignacion_academica', $data);
        $this->load->view('template/footer');
    }

    public function asignacion_academica(){
        $this->autenticacion();
        $this->vistaListarAsignacionAcademica(null);
    }
}
