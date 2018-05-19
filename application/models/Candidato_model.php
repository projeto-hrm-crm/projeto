<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Candidato_model extends CI_Model {

	public $id_pessoa;
	/**
	* @author: Camila Sales
	* Salva o registro de candidato associado à uma pessoa fisica
	*
	*/
	public function insert($data)
  {
 	try {
 		$this->db->insert('candidato', $data);
		$id_candidato = $this->db->insert_id();

		if($id_candidato)
		{
			$this->relatorio->setLog($this->session->userdata('user_login'), 'insert', 'Insere', 'Candidato', date('Y-m-d'), 'Candidato',  $id_candidato);
			return $id_candidato;
		}
 	} catch (\Exception $e) {}
  }


	/**
	* @author: Camila Sales
	* Remove o registro de candidato associado à uma pessoa fisica
	*
	* @param integer $id_candidato
	*/
	public function remove($id_candidato)
	{
		$this->db->where('id_candidato', $id_candidato);
		$this->db->delete('candidato');
		// delete pessoa fisica;
	}

	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa');
		} catch (\Exception $e) {}

	if ($query)
	{
		return $query->get()->result();
	}else{
		echo 'Não existem dados';
		exit;
	}
	}
	public function getById($id_candidato)
	{
		try {
			$candidato = $this->db->select("
			pessoa.id_pessoa, pessoa.nome, pessoa.email,
			pessoa_fisica.sexo,pessoa_fisica.data_nascimento,
			endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco,
			endereco.complemento,
			cidade.id_cidade, cidade.nome AS cidade,
			documento.tipo AS tipo_documento, documento.numero AS numero_documento,
			telefone.numero AS telefone,
			estado.id_estado, estado.nome AS estado
			")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa')
			->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
			->join('cidade',    'endereco.id_cidade = cidade.id_cidade')
			->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
			->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa')
			->join('estado',    'cidade.id_estado = estado.id_estado')
			->where('candidato.id_candidato', $id_candidato)->get();
			if ($candidato)
			{
				return $candidato->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}
	public function find($id_candidato)
	{
		try {
			$candidato = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa = candidato.id_pessoa')->where('candidato.id_candidato', $id_candidato)->get();
			if ($candidato)
			{
				return $candidato->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}

	public function update($id_candidato, $data)
	{
		try {
			$this->db->where('id_candidato', $id_candidato);
			$candidato = $this->db->update('candidato', $data);

			if($candidato)
			{
				$this->relatorio->setLog($this->session->userdata('user_login'), 'update', 'Atualiza', 'Candidato', date('Y-m-d'), 'Candidato',  $id_candidato);
				return $candidato;
			}
		} catch (\Exception $e) {}
	}

	/**
	* @author: Mayra Bueno
	* Métodos para a caixa de seleção dinâmica
	* País, estado e cidade
	*/
	public function get_pais(){
		$query = $this->db->get('pais');
		return $query->result();
	}

	public function get_vagas(){
		// $query = $this->db->get('vaga');

		// return $query->result();
	}

}
