<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_mdl extends CI_Model {
  
  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function getAllCursos(){
  	$this->db->select('*');
    $this->db->from('curso');
    $this->db->order_by("cur_grado", "asc");
    $this->db->order_by("cur_paralelo", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    }
  }
}