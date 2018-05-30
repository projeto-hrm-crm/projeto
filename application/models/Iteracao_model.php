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
    $id_iteracao = $this->db->insert_id();

    if($id_iteracao)
    {
      $this->relatorio->insertLog('Iteracao', $id_iteracao, 'Inseriu a iteracao', $id_iteracao);
    }
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
  public function update($data, $id) {
    $this->db->where('id_iteracao', $id);
    $id_iteracao = $this->db->update('iteracao', $data);

    if($id_iteracao)
    {
      $this->relatorio->updateLog('Iteracao', $id_iteracao, 'Atualizou a iteracao', $id);
    }
    
  }

  /**
  * @author: Rodrigo Alves
  * Apagar uma ordem iteracao do banco
  *
  */
  public function remove($id) {
    $this->db->where('id_iteracao', $id);
    $id_iteracao = $this->db->delete('iteracao');
    
    if($id_iteracao)
    {
      $this->relatorio->deleteLog('Iteracao', $id_iteracao, 'Deletou a iteracao', $id);
    }
  }

}
