<?php

class ProcessoSeletivo_model extends CI_Model
{
  public function get()
  {
    try {
      $query = $this->db->select('processo_seletivo.id_processo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_cargo, processo_seletivo.vagas, cargo.nome as nome_cargo')
  		->from('processo_seletivo')
      ->join('cargo', 'cargo.id_cargo = processo_seletivo.id_cargo')
  		->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function insert($data)
  {
    $this->db->insert('processo_seletivo', $data);
    return $this->db->insert_id();
  }

  public function find($id)
  {
    try {
      $processo_seletivo = $this->db->select('processo_seletivo.id_processo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_cargo, processo_seletivo.vagas, cargo.nome as nome_cargo')
      ->from('processo_seletivo')
      ->join('cargo', 'cargo.id_cargo = processo_seletivo.id_processo')
      ->where('id_processo', $id)
      ->get();

      if ($processo_seletivo)
      {
        return $processo_seletivo->result();
      }else{
        echo 'Processo Seletivo não existe';
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function update($id, $data)
  {
    try {
			$this->db->where('id_processo', $id_processo);
		  if($this->db->update('processo_seletivo', $data))
      {
        return $data['id_processo'];
      }else {
        return 0;
      }
		} catch (\Exception $e) {}
  }

  public function delete($id)
  {

  }
}
