<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etapa_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $this->db->select('etapa.id_etapa, etapa.nome, etapa.descricao, etapa.status, etapa.id_processo_seletivo');

        return $this->db->get('etapa')->result();
    }

    public function insert($id_processo, $nomes, $descs) {

      $etapas = array();
      foreach ($nomes as $i => $nome) {
        $etapas[] = array(
          'id_processo_seletivo' => $id_processo,
          'nome' => $nomes[$i],
          'descricao' => $descs[$i],
          'status' => 1
        );
      }

      $this->db->insert_batch('etapa', $etapas);
    }

    public function update($id, $data){
        return $this->db->update_batch('etapa', $data, 'id_etapa');
    }


    public function remove($id){
        $this->db->where('id_etapa', $id);
        $id_etapa = $this->db->delete('etapa');

        if($id_etapa){
            $this->relatorio->setLog('delete', 'Deletar','Etapa', $id_etapa, 'Deletou a etapa', $id);
        }
        return $id_etapa;
    }

    public function find($id){
      $this->db->where('etapa.id_processo_seletivo', $id);
      return $this->db->get('etapa')->result();
    }

    public function getProcessoSeletivo()
  {
    try {
      $query = $this->db->select('processo_seletivo.id_processo_seletivo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_vaga, processo_seletivo.data_inicio, processo_seletivo.descricao, processo_seletivo.data_fim, cargo.nome as nome_cargo, vaga.quantidade as vagas')
      ->from('etapa')
      ->join('processo_seletivo', 'etapa.id_processo_seletivo = processo_seletivo.id_processo_seletivo')
      ->join('vaga', 'vaga.id_vaga = processo_seletivo.id_vaga')
      ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')
      ->where('status = 2')
      ->where('etapa.nome = "Candidatura"')
      ->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }

  public function getProcessoSeletivoEtapa($user_id)
  {
    try {
      $query = $this->db->select('processo_seletivo.id_processo_seletivo, processo_seletivo.codigo, processo_seletivo.nome, processo_seletivo.id_vaga, processo_seletivo.data_inicio, processo_seletivo.descricao, processo_seletivo.data_fim, cargo.nome as nome_cargo, vaga.quantidade as vagas, vaga.requisitos, ')
      ->from('etapa')
      ->join('processo_seletivo', 'etapa.id_processo_seletivo = processo_seletivo.id_processo_seletivo')
      ->join('vaga', 'vaga.id_vaga = processo_seletivo.id_vaga')
      ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')
      ->join('processo_seletivo_candidato', 'etapa.id_etapa = processo_seletivo_candidato.id_etapa')
      ->join('candidato', 'candidato.id_candidato = processo_seletivo_candidato.id_candidato')
      ->join('pessoa_fisica', 'candidato.id_pessoa = pessoa_fisica.id_pessoa')
      ->where('pessoa_fisica.id_pessoa', $user_id)
      ->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
  }
  
  
  public function getEtapasProcesso($id_processo)
  {
    try {
      $query = $this->db->select('processo_seletivo.codigo, etapa.nome as etapa_nome, etapa.descricao as descricao_etapa')
      ->from('etapa')
      ->join('processo_seletivo', 'etapa.id_processo_seletivo = processo_seletivo.id_processo_seletivo')
      ->where('etapa.id_processo_seletivo', $id_processo)
      ->get();
      if ($query)
      {
        return $query->result();
      }else{
        return 0;
      }
    }
    catch (\Exception $e) {}
  }

  public function updateStatus($id, $status)
  {
    $this->db
        ->set('status', $status)
        ->where('id_etapa', $id)
        ->update('etapa');

  }
}