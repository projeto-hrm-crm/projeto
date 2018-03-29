<?php

class Fornecedor_model extends CI_Model
{

  public function get()
  {
    $query = $this->db->get('fornecedor');
    return $query->result();
  }

  public function insert($data)
  {
    $this->db->insert('fornecedor', $data);
  }

  public function update(){}

  public function delete(){}

}
