<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function addEstudiante($nombre, $edad) {
        // Guardamos los datos del $data en la tabla estudiantes. 
        // array('nombre_del_campo_en _la_BD' => $data['valor_recibido_desde_el_controlador'])
        $this->db->insert('estudiantes', array(
            'nombre' => $nombre,
            'edad' => $edad
            )
        );
    }
    
    function getAllEstudiantes(){
        $sql = $this->db->get('estudiantes');
        return $sql->result();
    }

    function getEstudiante($id){
        $sql = $this->db->get_where('estudiantes',array('idestudiante'=>$id));
        if($sql->num_rows()==1)
            return $sql->row_array();
        else
            return false;
    }

    public function removeEstudiante($id){
        $this->db->delete('estudiantes', array('idestudiante' => $id));
    }

    public function modificarEstudiante($id, $nombre, $edad){
        $this->db->where('idestudiante', $id);
        $this->db->update('estudiantes',array(
            'nombre'=> $nombre,
            'edad' => $edad
        ));
    }
}
