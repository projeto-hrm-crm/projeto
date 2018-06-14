<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etapa_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $this->db->select('etapa.id_etapa, etapa.descricao');
        return $this->db->get('etapa')->result();
    }

    public function insert($data) {

    }

    public function update($id){

    }

    public function remove($id){

    }

    public function getById($id){
      $this->db->where('etapa.id_etapa', $id);
      return $this->db->get('etapa')->row();
    }

}
