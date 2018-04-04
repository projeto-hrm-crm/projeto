<?php

class Fornecedor_model extends CI_Model
{

  public function get()
  {
    $query = $this->db->get('fornecedor');
    if ($query)
    {
      return $query->result();
    }else{
      echo 'Não existem dados';
      exit;
    }
  }

  public function insert($data)
  {
    $this->db->insert('fornecedor', $data);
  }

  public function find($id)
  {
    $fornecedor = $this->db->select('*')->from('fornecedor')->where('id', $id)->get();
    if ($fornecedor)
    {
      return $fornecedor->result();
    }else{
      echo 'Fornecedor não existe';
      exit;
    }
  }

  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('fornecedor', $data);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('fornecedor');
  }

}
