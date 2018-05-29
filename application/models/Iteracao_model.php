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
      $nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
      $dados['id_usuario'] = $this->session->userdata('user_login');
      $dados['tipo'] = 'insert';
      $dados['acao'] = 'Inserir';
      $dados['data'] = date('Y-m-d H:i:s');
      $dados['tabela'] = 'Iteracao';
      $dados['item_editado'] = $id_iteracao;
      $dados['descricao'] = $nome . ' Inseriu a iteracao ' . $dados['item_editado'];

      $this->relatorio->setLog($dados);
      return $id_iteracao;
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
      $nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
      $dados['id_usuario'] = $this->session->userdata('user_login');
      $dados['tipo'] = 'update';
      $dados['acao'] = 'Atualizar';
      $dados['data'] = date('Y-m-d H:i:s');
      $dados['tabela'] = 'Iteracao';
      $dados['item_editado'] = $id;
      $dados['descricao'] = $nome . ' Atualizou a iteracao ' . $dados['item_editado'];

      $this->relatorio->setLog($dados);
      return $id_iteracao;
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
      $nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
      $dados['id_usuario'] = $this->session->userdata('user_login');
      $dados['tipo'] = 'delete';
      $dados['acao'] = 'Deletar';
      $dados['data'] = date('Y-m-d H:i:s');
      $dados['tabela'] = 'Iteracao';
      $dados['item_editado'] = $id;
      $dados['descricao'] = $nome . ' Deletou a iteracao ' . $dados['item_editado'];

      $this->relatorio->setLog($dados);
      return $id_iteracao;
    }
  }

}
