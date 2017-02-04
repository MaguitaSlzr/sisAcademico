<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /************************************************
     * A PARTIR DE AQUI AGREGAR SUS PROPIOS METODOS *
     ************************************************/
    function getDocenteById($id){
        $this->db->where('pro_id',$id);
        $query = $this->db->get('profesor');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    function getDocente($id) {
        $this->db->select('p.pro_id, p.pro_gestion, p.pro_nombre, p.pro_paterno, p.pro_materno, p.pro_ci, p.pro_direccion, p.pro_email, p.pro_telefono, p.pro_movil, p.pro_login, p.pro_fechreg, p.par_expedido_id, pe.uexp_codigo as expedido, p.par_genero_id, pg.ugn_descripcion as genero, p.estado_id, es.descripcion as estado, ru.rl_denominacion as rol');
        $this->db->from('profesor p, par_expedido pe, par_genero pg, estado es, rol ru');
        $this->db->where('p.pro_id',$id);
        $this->db->where('pe.uexp_id=p.par_expedido_id');
        $this->db->where('pg.ugn_id=p.par_genero_id');
        $this->db->where('es.est_id=p.estado_id');
        $this->db->where('ru.rl_id=p.rol_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
    
    function getAllDocentes() {
        $this->db->select('*');
        $this->db->from('profesor');
        $this->db->where('rol_id',4);
        $this->db->order_by("pro_paterno", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function getAllDocentesActivos() {
        $this->db->select('*');
        $this->db->from('profesor');
        $this->db->where('rol_id',4);
        $this->db->where('estado_id',1);
        $this->db->order_by("pro_paterno", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function num_docentes(){
        $this->db->where('rol_id',4);
        $this->db->where('estado_id!=3');
        $query = $this->db->get('profesor');
        return $query->num_rows();
    }

    function get_docentes($per_page){
        $this->db->where('rol_id',4);
        $this->db->where('estado_id!=3');
        $this->db->order_by("pro_paterno", "asc");
        $query=$this->db->get('profesor',$per_page,$this->uri->segment(3));
        return $query->result();
    }

    function deleteDocente($id){
        $this->db->where('pro_id', $id);
        $this->db->update('profesor',array(
            'estado_id'=> 3
        ));
    }

    function getAllExpedidos(){
        $query = $this->db->get('par_expedido');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function addDocente($ci,$nombre,$paterno,$materno,$direccion,$email,$telefono,$celular,$genero,$usuario,$password,$estado,$fecha,$gestion,$exp){
        $this->db->insert('profesor', array(
            'pro_gestion' => $gestion,
            'pro_nombre' => $nombre,
            'pro_paterno' =>$paterno,
            'pro_materno' => $materno,
            'pro_ci' => $ci,
            'pro_direccion' => $direccion,
            'pro_telefono' => $telefono,
            'pro_movil' => $celular,
            'pro_email' => $email,
            'pro_login' => $usuario,
            'pro_password' => $password,
            'pro_fechreg' => $fecha,
            'par_expedido_id' => $exp,
            'par_genero_id' => $genero,
            'rol_id' => 4,
            'estado_id' => $estado,
            )
        );
    }

    function updateDocente1($id,$ci,$nombre,$paterno,$materno,$direccion,$email,$telefono,$celular,$genero,$exp,$usuario,$estado){
        $this->db->where('pro_id', $id);
        $this->db->update('profesor',array(
            'pro_ci'=> $ci,
            'pro_nombre'=> $nombre,
            'pro_paterno'=> $paterno,
            'pro_materno'=> $materno,
            'pro_direccion'=> $direccion,
            'pro_email'=> $email,
            'pro_telefono'=> $telefono,
            'pro_movil'=> $celular,
            'par_genero_id' => $genero,
            'par_expedido_id' => $exp,
            'pro_login'=> $usuario,
            'estado_id' => $estado
        ));
    }

    function updateDocente2($id,$password){
        $this->db->where('pro_id', $id);
        $this->db->update('profesor',array(
            'pro_password'=> $password
        ));
    }
    
    function getDocentesGeneral($dato){
        $query=$this->db->select('*')->from('profesor')
            ->like('pro_ci', $dato)
            ->where('rol_id =',4)
            ->where('estado_id !=',3)
            ->or_like('pro_paterno', $dato)
            ->where('rol_id =',4)
            ->where('estado_id !=',3)
            ->or_like('pro_materno', $dato)
            ->where('rol_id =',4)
            ->where('estado_id !=',3)
            ->or_like('pro_nombre', $dato)
            ->where('rol_id =',4)
            ->where('estado_id !=',3)
            ->limit(10)
            ->get();
        return $query->result();
    }
}