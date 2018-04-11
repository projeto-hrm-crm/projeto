<?php

class Fornecedor_model extends CI_Model
{

  public function get()
  {
    try {
      $query = $this->db->get('fornecedor');
      if ($query)
      {
        return $query->result();
      }else{
        echo 'Não existem dados';
        exit;
      }
    } catch (\Exception $e) {}
  }


  public function insert($data)
  {
    try {
      $this->db->insert('fornecedor', $data);
    } catch (\Exception $e) {}
  }


  public function find($id)
  {
    try {
      $fornecedor = $this->db->select('*')->from('fornecedor')->where('id', $id)->get();
      if ($fornecedor)
      {
        return $fornecedor->result();
      }else{
        echo 'Fornecedor não existe';
        return 1;
      }
    } catch (\Exception $e) {}
  }


  public function update($id, $data)
  {
    try {
      $this->db->where('id', $id);
      $this->db->update('fornecedor', $data);
    } catch (\Exception $e) {}
  }


  public function delete($id)
  {
    try {
      $this->db->where('id', $id);
      $this->db->delete('fornecedor');
    } catch (\Exception $e) {}
  }

}
