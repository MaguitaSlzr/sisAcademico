<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function validaUsuario($usuario, $contrasena) {
        $this->db->where('pro_login', $usuario);
        $this->db->where('pro_password', $contrasena);
        $this->db->where('estado_id',1);
        $query = $this->db->get('profesor');
        if($query->num_rows()>0){
            return $query->row();    
        }
    }

    function conteo ($usuario, $contrasena){
        $this->db->where('pro_login', $usuario);
        $this->db->where('pro_password', $contrasena);
        $query = $this->db->get('profesor');
        return $query->num_rows();
    }

}
