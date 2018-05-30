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
    $id_processo_seletivo = $this->db->insert_id();

    if($id_processo_seletivo)
    {
      $this->relatorio->insertLog('Processo_seletivo', $id_processo_seletivo, 'Inseriu o processo seletivo', $id_processo_seletivo);
    }
  }

  public function find($id)
  {
    try {
      $processo_seletivo = $this->db->select('processo_seletivo.id_processo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_cargo, processo_seletivo.vagas, processo_seletivo.data_inicio, processo_seletivo.descricao, processo_seletivo.data_fim, cargo.nome as nome_cargo')
      ->from('processo_seletivo')
      ->join('cargo', 'cargo.id_cargo = processo_seletivo.id_cargo')
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
		$this->db->where('id_processo', $id);
		$id_processo_seletivo = $this->db->update('processo_seletivo', $data);

        if($id_processo_seletivo)
        {
          $this->relatorio->updateLog('Processo_seletivo', $id_processo_seletivo, 'Atualizou o processo seletivo', $id);
        }

		} catch (\Exception $e) {}
  }

  public function info($id)
  {
    try {
      $processo_seletivo = $this->db->select('processo_seletivo.id_processo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.descricao')
      ->from('processo_seletivo')
      ->where('id_processo', $id)
      ->get();

      if($processo_seletivo)
      {
        return $processo_seletivo->result();
      }else {
        echo 'Processo Seletivo não existe';
        return 0;
      }
    } catch (\Exception $e) {

    }


  }
  public function delete($id)
  {
    try {
        $this->db->where('id_processo', $id);
        $id_processo_seletivo = $this->db->delete('processo_seletivo');

        if($id_processo_seletivo)
        {
          $this->relatorio->deleteLog('Processo_seletivo', $id_processo_seletivo, 'Deletou o processo seletivo', $id);
        }
    } catch (\Exception $e) {}
  }
}
