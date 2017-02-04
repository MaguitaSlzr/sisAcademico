<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_mdl extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /************************************************
     * A PARTIR DE AQUI AGREGAR SUS PROPIOS METODOS *
     ************************************************/
    // INICIO CRUD ESTUDIANTES
    function num_estudiantes(){
        //$this->db->where('rol_id',4);
        $this->db->where('estado_id!=3');
        $query = $this->db->get('estudiante');
        return $query->num_rows();
    }
    
    function num_disciplina(){
         $query = $this->db->get('registro_disciplinario');
        return $query->num_rows();
    }
    function get_disciplina($per_page){
        //$this->db->where('rol_id',4);
        $this->db->order_by("dis_id", "asc");
        $query=$this->db->get('registro_disciplinario',$per_page,$this->uri->segment(3));
        return $query->result();
    }
    function get_disciplinas($per_page){
        //$this->db->where('rol_id',4);
        $this->db->order_by("dis_id", "asc");
        $query=$this->db->get('registro_disciplinario',$per_page,$this->uri->segment(3));
        return $query->result();
    }
    
    function get_par_disciplinario($id){
        $this->db->where('ptd_id',$id);
        $query=$this->db->get('par_tipo_disciplinario');
        return $query->result();
    } 
    function get_estudiantes($per_page){
        //$this->db->where('rol_id',4);
        $this->db->where('estado_id!=3');
        $this->db->order_by("est_paterno", "asc");
        $query=$this->db->get('estudiante',$per_page,$this->uri->segment(3));
        return $query->result();
    }
    function getAllEstudiantes() {
        $this->db->select('*');
        $this->db->from('estudiante');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function getAllExpedidos(){
        $query = $this->db->get('par_expedido');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function getAllCursos(){
        $this->db->order_by("cur_grado", "asc");
        $this->db->order_by("cur_paralelo", "asc");
        $query = $this->db->get('curso');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function getEstudiante($id) {
        //$this->db->select('e.est_id, e.est_nombre, e.est_paterno, e.est_materno, e.est_ci, est_ap_nombre, est_ap_parentesco, e.est_direccion, e.est_email, e.est_telefono, e.est_movil, e.est_fechanac, e.est_login, e.est_rude, e.est_fechareg, e.par_expedido_id, pe.uexp_codigo as expedido, e.par_genero_id, pg.ugn_descripcion as genero, e.estado_id, es.descripcion as estado, e.curso_id, c.cur_descripcion as curso');
        $this->db->select('e.est_id, e.est_nombre, e.est_paterno, e.est_materno, e.est_ci, est_ap_nombre, est_ap_parentesco, e.est_direccion, e.est_email, e.est_telefono, e.est_movil, e.est_fotoadj, e.est_fechanac, e.est_login, e.est_rude, e.est_fechareg, e.par_expedido_id, pe.uexp_codigo as expedido, e.par_genero_id, pg.ugn_descripcion as genero, e.estado_id, es.descripcion as estado, e.curso_id');
        //$this->db->from('estudiante e, par_expedido pe, par_genero pg, estado es, curso c');
        $this->db->from('estudiante e, par_expedido pe, par_genero pg, estado es');
        $this->db->where('e.est_id',$id);
        $this->db->where('pe.uexp_id=e.par_expedido_id');
        $this->db->where('pg.ugn_id=e.par_genero_id');
        $this->db->where('es.est_id=e.estado_id');
        //$this->db->where('c.cur_id=e.curso_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    function addEstudiante($rude,$ci,$nombre,$paterno,$materno,$direccion,$email,$telefono,$celular,$fechaNac,$genero,$usuario,$password,$fechaReg,$exp,$curso,$nombreApoderado,$parentesco){
        $this->db->insert('estudiante', array(
            'est_rude' => $rude,
            'est_nombre' => $nombre,
            'est_paterno' =>$paterno,
            'est_materno' => $materno,
            'est_ci' => $ci,
            'est_ap_nombre' => $nombreApoderado,
            'est_ap_parentesco' => $parentesco,
            'est_direccion' => $direccion,
            'est_telefono' => $telefono,
            'est_movil' => $celular,
            'est_email' => $email,
            'est_fechanac' => $fechaNac,
            'est_login' => $usuario,
            'est_password' => $password,
            'est_fechareg' => $fechaReg,
            'par_expedido_id' => $exp,
            'par_genero_id' => $genero,
            'rol_id' => 3,
            'estado_id' => 1,
            'curso_id' => $curso,
            )
        );
    }
    
    function addDisciplinario($estudiante, $fecha, $falta, $relacion, $solucion){
         $this->db->insert('registro_disciplinario', array(
            'dis_estudiante' => $estudiante,
            'dis_fecha' => $fecha,
            'dis_iddisciplinario' =>$falta,
            'dis_relacionHecho' => $relacion,
            'dis_solucion' => $solucion
            )
        );
    }

    function saveNombreFotoEstudiante($id,$nombre_archivo){
        $this->db->where('est_id', $id);
        $this->db->update('estudiante',array(
            'est_fotoadj'=> $nombre_archivo,
        ));
    }

    function deleteEstudiante($id){
        $this->db->where('est_id', $id);
        $this->db->update('estudiante',array(
            'estado_id'=> 3
        ));
    }

    function updateEstudiante($id,$rude,$ci,$exp,$nombre,$paterno,$materno,$nombreApoderado,$parentesco,$direccion,$email,$telefono,$celular,$fechaNac,$genero,$estado,$curso,$usuario,$password){
        $this->db->where('est_id', $id);
        $this->db->update('estudiante',array(
            'est_rude'=> $rude,
            'est_ci'=> $ci,
            'par_expedido_id' => $exp,
            'est_nombre'=> $nombre,
            'est_paterno'=> $paterno,
            'est_materno'=> $materno,
            'est_ap_nombre'=> $nombreApoderado,
            'est_ap_parentesco'=> $parentesco,
            'est_direccion'=> $direccion,
            'est_email'=> $email,
            'est_telefono'=> $telefono,
            'est_movil'=> $celular,
            'est_fechanac'=> $fechaNac,
            'par_genero_id' => $genero,
            'estado_id' => $estado,
            'curso_id'=> $curso,
            'est_login'=> $usuario,
            'est_password'=> $password
        ));
    }

    function getEstudiantesGeneral($dato){
        $query=$this->db->select('*')->from('estudiante')
            ->like('est_ci', $dato)
            ->where('estado_id !=',3)
            ->or_like('est_rude', $dato)
            ->where('estado_id !=',3)
            ->or_like('est_paterno', $dato)
            ->where('estado_id !=',3)
            ->or_like('est_materno', $dato)
            ->where('estado_id !=',3)
            ->or_like('est_nombre', $dato)
            ->where('estado_id !=',3)
            ->limit(10)
            ->get();
        return $query->result();
    }

    function getUltimoIdEstudiante(){
        /*
        $this->db->select_max('est_id');
        $query = $this->db->get('estudiante');
        return $query->row()->est_id;
        */
        return $this->db->insert_id();
    }

    function getNombreFotoArchivo($id){
        $this->db->where('est_id',$id);
        $query = $this->db->get('estudiante');
        if ($query->num_rows() > 0) {
            return $query->row()->est_fotoadj;
        }
    }
    // FIN CRUD ESTUDIANTES

    // INICIO ASIGNACION DE CURSO //
    function getAllEstNoAsignados(){
        $this->db->where('estado_id',1);
        $this->db->where('curso_id',NULL);
        $this->db->order_by("est_paterno", "asc");
        $query=$this->db->get('estudiante');
        return $query->result();
    }

    function getAllEstudiantesAsignados($id_curso){
        $this->db->where('estado_id',1);
        $this->db->where('curso_id',$id_curso);
        $this->db->order_by("curso_id", "asc");
        $this->db->order_by("est_paterno", "asc");
        $query=$this->db->get('estudiante');
        return $query->result();   
    }

    function countEstudiantesVaronesByIdCurso($id){
        $this->db->where('estado_id',1);
        $this->db->where('curso_id',$id);
        $this->db->where('par_genero_id', 2);
        $query=$this->db->count_all_results('estudiante');
        return $query;
    }

    function countEstudiantesMujeresByIdCurso($id){
        $this->db->where('estado_id',1);
        $this->db->where('curso_id',$id);
        $this->db->where('par_genero_id', 1);
        $query=$this->db->count_all_results('estudiante');
        return $query;
    }

    function desagregarDeCursoByIdEstudiante($id){
        $this->db->where('est_id', $id);
        $this->db->update('estudiante',array(
            'curso_id'=> NULL
        ));
    }

    function cambioCursoByIdEstudiante($id_estudiante,$id_curso){
        $this->db->where('est_id', $id_estudiante);
        $this->db->update('estudiante',array(
            'curso_id'=> $id_curso
        ));
    }
    // FIN ASIGNACION DE CURSO //

    function getAllTipoFaltas(){
        $this->db->select('*');
        $this->db->from('par_tipo_falta');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    function getAllDocentes(){
        $this->db->select('*');
        $this->db->from('profesor');
        $this->db->where('rol_id',4);
        $this->db->where('estado_id',1);
        $this->db->order_by("pro_paterno", "asc");
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }   
    }

    function getAllMaterias(){
        $this->db->select('*');
        $this->db->from('materia');
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }   
    }

    function getAllTipoDisciplinario() {
        $this->db->select('*');
        $this->db->from('par_tipo_disciplinario');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function getAllEstudiantesDisciplinario(){
        $this->db->select('e.est_ci, e.est_rude, e.est_nombre, e.est_paterno, e.est_materno, rd.dis_id, rd.dis_fecha, rd.dis_relacionHecho, rd.dis_solucion');
        $this->db->from('estudiante e, registro_disciplinario rd');
        $this->db->where('e.est_id = rd.dis_estudiante');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
    }
    
    function getAllEstudiantesByIdCurso($id){
        $this->db->select('*');
        $this->db->from('estudiante');
        $this->db->where('curso_id',$id);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
    }
}
