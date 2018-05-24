<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sac_model extends CI_Model {
  /**
  * @author: Rodrigo Alves
  * Este método inserção de dados
  *
  */
  public function insert($dados) {
     try {

      $this->db->insert('sac', $dados);
      $id_sac = $this->db->insert_id();

      if($id_sac)
      {
          $dados['id_usuario'] = $this->session->userdata('user_login');
          $dados['tipo'] = 'insert';
          $dados['acao'] = 'Inserir';
          $dados['data'] = date('Y-m-d');
          $dados['tabela'] = 'SAC';
          $dados['item_editado'] = $id_sac;
          $dados['descricao'] = $dados['id_usuario'] . ' Inseriu o SAC ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

          $this->relatorio->setLog($dados);
          return $id_sac;
      }

    } catch (\Exception $e) {}

  }

  /**
  * @author: Rodrigo Alves
  * listar todas as ordens
  *
  */
  public function get() {
    $query = $this->db->select('*')->from('sac');
    return $query->get()->result();
  }

  /**
  * @author: Rodrigo Alves
  * listar todas as ordens que o cliente abriu
  *
  */
  public function getClient($id) {
    $query = $this->db->select('*')->from('sac')->where('id_cliente', $id);
    return $query->get()->result();
  }

  /**
  * @author: Rodrigo Alves
  * Este método atualiza as informações da ordem do sac referenciado pelo id
  *
  */
  public function update($data, $id) {
    $this->db->where('id_sac', $id);
    $id_sac = $this->db->update('sac', $data);

    if($id_sac)
    {
        $dados['id_usuario'] = $this->session->userdata('user_login');
        $dados['tipo'] = 'update';
        $dados['acao'] = 'Atualizar';
        $dados['data'] = date('Y-m-d');
        $dados['tabela'] = 'SAC';
        $dados['item_editado'] = $id;
        $dados['descricao'] = $dados['id_usuario'] . ' Atualizou o SAC ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

        $this->relatorio->setLog($dados);
        return $id_sac;
    }
  }

  /**
  * @author: Rodrigo Alves
  * Alterar estatus sac a
  *
  */
  public function changeStatus($status, $id_sac) {
    $this->db->set('encerrado', $status);
    $this->db->where('id_sac', $id_sac);
    $this->db->update('sac');
  }

  /**
  * @author: Rodrigo Alves
  * Apagar uma ordem sac do banco
  *
  */
  public function remove($id) {


    try {

      $this->db->where('id_sac', $id);
      $id_sac = $this->db->delete('sac');

      if($id_sac)
      {
          $dados['id_usuario'] = $this->session->userdata('user_login');
          $dados['tipo'] = 'delete';
          $dados['acao'] = 'Deletar';
          $dados['data'] = date('Y-m-d');
          $dados['tabela'] = 'SAC';
          $dados['item_editado'] = $id;
          $dados['descricao'] = $dados['id_usuario'] . ' Deletou o SAC ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

          $this->relatorio->setLog($dados);
          return $id_sac;
      }


    } catch (\Exception $e) {}

  }

}
