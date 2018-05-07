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
			$this->db->update('candidato', $data);
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

	public function get_estado(){
		$query = $this->db->get('estado');
		return $query->result();
	}

	public function get_cidade(){
		$query = $this->db->get('cidade');
		return $query->result();
	}

	public function get_vagas(){
		// $query = $this->db->get('vaga');

		// return $query->result();
	}

}
