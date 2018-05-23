<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sac_model extends CI_Model {
  /**
  * @author: Rodrigo Alves
  * Este método inserção de dados
  *
  */
  public function __construct(){
      parent::__construct();
  }
  public function insert($dados) {
     try {

      $this->db->insert('sac', $dados);
      $id_sac = $this->db->insert_id();

      if($id_sac)
      {
          $this->relatorio->setLog($this->session->userdata('user_login'), 'insert', 'Insere', 'Sac', date('Y-m-d'), 'Sac',  $id_sac);
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
  public function update($data, $id_sac) {
    $this->db->where('id_sac', $id_sac);
    $id_sac = $this->db->update('sac', $data);

    if($id_sac)
    {
        $this->relatorio->setLog($this->session->userdata('user_login'), 'update', 'Atualiza', 'Sac', date('Y-m-d'), 'Sac',  $id_sac);
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
  public function remove($id_sac) {


    try {

      $this->db->where('id_sac', $id_sac);
      return $this->db->delete('sac');


    } catch (\Exception $e) {}

  }

}
