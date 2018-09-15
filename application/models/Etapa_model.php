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

    public function insert($id_processo, $nomes, $descs) {

      $etapas = array();
      foreach ($nomes as $i => $nome) {
        $etapas[] = array(
          'id_processo_seletivo' => $id_processo,
          'nome' => $nomes[$i],
          'descricao' => $descs[$i],
          'status' => 1
        );
      }

      $this->db->insert_batch('etapa', $etapas);
    }

    public function update($id, $data){
        return $this->db->update_batch('etapa', $data, 'id_etapa');
    }


    public function remove($id){
        $this->db->where('id_etapa', $id);
        $id_etapa = $this->db->delete('etapa');

        if($id_etapa){
            $this->relatorio->setLog('delete', 'Deletar','Etapa', $id_etapa, 'Deletou a etapa', $id);
        }
        return $id_etapa;
    }

    public function find($id){
      $this->db->where('etapa.id_processo_seletivo', $id);
      return $this->db->get('etapa')->result();
    }

}
