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
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$this->db->delete('candidato');
		// delete pessoa fisica;
	}

	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('candidato', 'pessoa_fisica.id_pessoa_fisica = candidato.id_pessoa_fisica');
		} catch (\Exception $e) {}

	if ($query)
	{
		return $query->get()->result();
	}else{
		echo 'Não existem dados';
		exit;
	}
	}

	public function find($id)
	{
		try {
			$candidato = $this->db->select('*')->from('candidato')->where('id', $id)->get();
			if ($candidato)
			{
				return $candidato->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}

	public function update($id, $data)
	{
		try {
			$this->db->where('id', $id);
			$this->db->update('candidato', $data);
		} catch (\Exception $e) {}
	}

	public function delete($id)
	{
		try {
			$this->db->where('id', $id);
			$this->db->delete('candidato');
		} catch (\Exception $e) {}
	}

}
