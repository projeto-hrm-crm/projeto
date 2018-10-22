<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoEtapa_model extends CI_Model
{

  public function __construct(){
      parent::__construct();
  }

  /**
  * @author: Matheus Ladislau
  * Realiza registro de candidato_etapa
  *
  *@param array: Dados (,nome) a serem registrados
  */
  public function insert($data)
  {
    $this->db->insert('processo_seletivo_candidato',$data);
    $id_candidato_etapa = $this->db->insert_id();

    if($id_candidato_etapa)
    {
      $this->relatorio->setLog('insert', 'Inserir', 'Candidato_etapa', $id_candidato_etapa, 'Inseriu a etapa do candidato', $id_candidato_etapa);
    }
    return $id_candidato_etapa;
  }


  /**
  * @author: Matheus Ladislau
  * Remove o registro de candidato_etapa
  *
  * @param integer:  refere-se ao id do a ser deletado
  */
  public function remove($id_candidato,$id_vaga_etapa)
  {
    $this->db->where('id_candidato', $id_candidato);
    $id_candidato_etapa = $this->db->get('candidato_etapa')->row()->id_candidato_etapa;

    $this->db->where('id_vaga_etapa', $id_vaga_etapa);
    $this->db->delete('processo_seletivo_candidato');

    if($id_candidato_etapa)
    {
      $this->relatorio->setLog('delete', 'Deletar', 'Candidato_etapa', $id_candidato_etapa, 'Removeu a etapa do candidato', $id_candidato_etapa);
    }
    return $id_candidato_etapa;
  }

  public function find($id_candidato,$id_etapa){
    $this->db->select('*')
    ->from('processo_seletivo_candidato')
    ->where('id_candidato',$id_candidato)
    ->where('id_etapa',$id_etapa);
    $query=$this->db->get();
    return $query->result();
  }

  public function selectAll()
  {
    $this->db->select('*');
    $this->db->from('candidato');
    $this->db->join('pessoa', 'pessoa.id_pessoa = candidato.id_pessoa');
    $query=$this->db->get();
    return $query;
  }

  public function selectCandidatoByIdUsuario($id_usuario)
  {
    $this->db->select('*');
    $this->db->from('usuario');
    $this->db->join('candidato', 'candidato.id_pessoa = usuario.id_pessoa');
    $this->db->where('usuario.id_usuario',$id_usuario);
    $query=$this->db->get();
    return $query->result();
  }


  public function getIdEtapaByProcessoID($id_processo_seletivo){
    try {
      $query = $this->db->select('*')
      ->from('processo_seletivo')
      ->join('etapa', 'etapa.id_processo_seletivo = processo_seletivo.id_processo_seletivo')
      ->where('processo_seletivo.id_processo_seletivo',$id_processo_seletivo)
      ->get();
      if ($query)
      {
        return $query->result()[0];
      }else{
        return 0;
      }
    } catch (\Exception $e) {}
    }

  public function get($id){
    $this->db->select('*');
    $this->db->from('processo_seletivo_candidato')->where('id_etapa',$id);
    $query=$this->db->get();
    return $query->result();
  }
}
