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
        ->where('cargo_funcionario.deletado is NULL')
        ->get();

        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;

    }

    public function getFunCar($id_funcionario,$id_cargo){

        $cargo_funcionario =  $this->db->select(
           '*'
        )->from('cargo_funcionario')
        ->where('cargo_funcionario.id_funcionario',$id_funcionario)
        ->where('cargo_funcionario.id_cargo',$id_cargo)
        ->get();

        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;

    }

    /**
    * @author: Camila Sales
    * Retorna  os registros de cargo_funcionario referente ao id_funcionario passado por parametro
    *
    * @param integer $id_cargo_funcionario refere-se ao id do registro de cargo_funcionario a ser editado
    * @return boolean: True - caso editado com sucesso, False - não editado
    */
    public function getAll($id_funcionario){

        $cargo_funcionario =  $this->db->select(
           'cargo_funcionario.*,
            funcionario.id_funcionario,
            setor.nome AS setor, setor.id_setor,
            cargo.id_cargo, cargo.nome as cargo'
        )->from('cargo_funcionario')
        ->join('funcionario', 'cargo_funcionario.id_funcionario = funcionario.id_funcionario')
        ->join('pessoa', 'funcionario.id_pessoa = pessoa.id_pessoa')
        ->join('cargo', 'cargo_funcionario.id_cargo = cargo.id_cargo')
        ->join('setor', 'cargo_funcionario.id_setor = setor.id_setor')
        ->where('cargo_funcionario.id_funcionario',$id_funcionario)
        ->get();

        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;

    }

     /**
    * @author: Camila Sales
    * Retorna  o registro de cargo_funcionario ativo referente ao id_funcionario passado por parametro
    *
    * @param integer $id_cargo_funcionario refere-se ao id do registro de cargo_funcionario a ser editado
    * @return boolean: True - caso editado com sucesso, False - não editado
    */
    public function getAtual($id_funcionario){

        $cargo_funcionario =  $this->db->select(
           '*'
        )->from('cargo_funcionario')
        ->where('cargo_funcionario.id_funcionario',$id_funcionario)
        ->where('cargo_funcionario.deletado is null')
        ->get();

        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;

    }

    public function getById($id){

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
        ->where('cargo_funcionario.id_cargo_funcionario',$id)
        ->get();

        if ($cargo_funcionario) {
            return $cargo_funcionario->result();
        }
        return null;

    }

    public function insert($data) {
        $this->db->insert('cargo_funcionario', $data);
		$id_cargo_funcionario = $this->db->insert_id();

		if($id_cargo_funcionario)
		{
			$this->relatorio->setLog('insert', 'Inserir', 'cargo_funcionario', $id_cargo_funcionario, 'Inseriu o cargo_funcionario', $id_cargo_funcionario);
		}

    }

    /**
    * @author: Camila Sales
    * Edita o registro de cargo_funcionario pelo id_cargo_funcionario referente
    *
    * @param integer $id_cargo_funcionario refere-se ao id do registro de cargo_funcionario a ser editado
    */
    public function update($id_cargo_funcionario, $data)
    {
      $this->db->update('cargo_funcionario', $data, array('id_cargo_funcionario' => $id_cargo_funcionario));
    }

    public function find($id){
      $this->db->where('etapa.id_processo_seletivo', $id);
      return $this->db->get('etapa')->result();
    }
}
