<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoFuncionario_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        
        $cargo_funcionario =  $this->db->select(
           'cargo_funcionario.id_cargo_funcionario,
            funcionario.id_funcionario,
            pessoa.nome AS pessoa,
            setor.nome AS setor, setor.id_setor,
            cargo.id_cargo, cargo.nome'
        )->from('cargo_funcionario')
        ->join('funcionario', 'cargo_funcionario.id_funcionario = funcionario.id_funcionario')
        ->join('pessoa', 'funcionario.id_pessoa = pessoa.id_pessoa')
        ->join('cargo', 'cargo_funcionario.id_cargo = cargo.id_cargo')
        ->join('setor', 'cargo_funcionario.id_setor = setor.id_setor')
        ->get();
    
        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;

    }


    public function insert($data) {

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

}
