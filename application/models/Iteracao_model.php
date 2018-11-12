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
      $this->relatorio->setLog('insert', 'Inserir', 'Iteracao', $id_iteracao, 'Inseriu a iteracao', $id_iteracao);
    }


    return $id_iteracao;
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
  * lista iterações pelo sac
  *
  */
  public function getBySac($sac) {
    $query = $this->db->select('*')
        ->from('iteracao')
        ->join('pessoa', 'pessoa.id_pessoa = iteracao.id_pessoa')
        ->join('usuario', 'usuario.id_pessoa = iteracao.id_pessoa')
        ->where('iteracao.id_sac', $sac)
        ->order_by("iteracao.data", "asc");
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
      $this->relatorio->setLog('update', 'Atualizar', 'Iteracao', $id_iteracao, 'Atualizou a iteracao', $id);
    }
    return $id_iteracao;

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
      $this->relatorio->setLog('delete', 'Deletar', 'Iteracao', $id_iteracao, 'Deletou a iteracao', $id);
    }
    return $id_iteracao;
  }

}
