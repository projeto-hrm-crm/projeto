<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iteracao_model extends CI_Model {
  /**
  * @author: Rodrigo Alves
  * Este método inserção de dados
  *
  */
  public function insert($dados) {    
    $this->db->insert('iteracao', $dados);
    return $this->db->insert_id();
  }
    
  /**
  * @author: Rodrigo Alves
  * listar todas as mensagem iteração
  *
  */
  public function get() {    
    $query = $this->db->select('*')->from('iteracao');
    return $query->get()->result();
  }
    
  /**
  * @author: Rodrigo Alves
  * listar iterações
  *
  */
  public function getId($id_iteracao) {    
    $query = $this->db->select('*')->from('iteracao')->where('id_iteracao', $id_iteracao);
    return $query->get()->result();
  }

  /**
  * @author: Rodrigo Alves
  * Este método atualiza as informações da iteracao referenciado pelo id
  *
  */
  public function update($data, $id_iteracao) {
    $this->db->where('id_iteracao', $id_iteracao);
    $this->db->update('iteracao', $data);
  }
    
  /**
  * @author: Rodrigo Alves
  * Apagar uma ordem iteracao do banco
  *
  */
  public function remove($id) {
    $this->db->where('id_iteracao', $id);
    $this->db->delete('iteracao');
  }
    
}
