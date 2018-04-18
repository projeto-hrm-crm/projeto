<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sac_model extends CI_Model {
  /**
  * @author: Rodrigo Alves
  * Este método inserção de dados
  *
  */
  public function insert($dados) {    
    $this->db->insert('sac', $dados);
    return $this->db->insert_id();
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
    $this->db->select('*');
    $this->db->from('sac');
    $this->db->where('id_cliente', $id);
    return $this->db->get();
  }

  /**
  * @author: Rodrigo Alves
  * Este método atualiza as informações da ordem do sac referenciado pelo id
  *
  */
  public function update($id) {
    $this->id_produto  = $this->input->post('id_produto');
    $this->id_cliente = $this->input->post('id_cliente');
    $this->abertura = $this->input->post('abertura');
    $this->fechamento = $this->input->post('fechamento');
    $this->encerrado = $this->input->post('encerrado');
    $this->db->update('sac', $this, array('id_sac' => $this->input->post('id_sac')));
  }
    
  /**
  * @author: Rodrigo Alves
  * Apagar uma ordem sac do banco
  *
  */
  public function remove($id) {
    $this->db->where('id_sac', $id);
    $this->db->delete('sac');
    // remove pessoa
  }
    
}
