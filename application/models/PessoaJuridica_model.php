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
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function insert($data)
  {
		$this->db->insert('pessoa_juridica', $data);
		$id_pessoa_juridica = $this->db->insert_id();

        if($id_pessoa_juridica)
        {
          $this->relatorio->insertLog('Pessoa_juridica', $id_pessoa_juridica, 'Inseriu a pessoa juridica', $id_pessoa_juridica);
        }
        return $id_pessoa_juridica;
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
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function update($data)
  {
    try {
      $this->db->where('id_pessoa_juridica', $data['id_pessoa_juridica']);

      if($this->db->update('pessoa_juridica', $data))
  		{
  			return $data['id_pessoa_juridica'];
  		}else {
  			return 0;
  		}
    } catch (\Exception $e) {}
  }

  public function delete($id_pessoa_juridica)
  {
      $this->db->where('id_pessoa_juridica', $id_pessoa_juridica);
      $this->db->delete('pessoa_juridica');
   
      if($id_pessoa_juridica)
      {
        $this->relatorio->deleteLog('Pessoa_juridica', $id_pessoa_juridica, 'Deletou a pessoa juridica', $id_pessoa_juridica);
      }
      return $id_pessoa_juridica;

  }

}
