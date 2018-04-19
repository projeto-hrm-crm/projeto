<?php

class PessoaJuridica_model extends CI_Model
{

  public function get()
  {
    try {
      $query = $this->db->get('pessoa_juridica');
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
		$this->db->insert('pessoa_juridica', $data);
		return $this->db->insert_id();
  }

  public function find($id)
  {
    try {
      $pessoa_juridica = $this->db->select('*')->from('pessoa_juridica')->where('id', $id)->get();
      if ($pessoa_juridica)
      {
        return $pessoa_juridica->result();
      }else{
        echo 'Pessoa Juridica não existe';
        return 1;
      }
    } catch (\Exception $e) {}
  }

  public function update($id, $data)
  {
    try {
      $this->db->where('id', $id);
      $this->db->update('pessoa_juridica', $data);
    } catch (\Exception $e) {}
  }

  public function delete($id)
  {
    try {
      $this->db->where('id', $id);
      $this->db->delete('pessoa_juridica');
    } catch (\Exception $e) {}
  }


}
