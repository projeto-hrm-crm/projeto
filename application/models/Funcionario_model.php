<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Funcionario_model extends CI_Model {

	/**
	* @author: Camila Sales
	* Salva o registro de funcionario associado à uma pessoa fisica
	*
	* @param integer $data
	*/
	public function insert($data)
	{
		try {
			$this->db->insert('funcionario', $data);
    } catch (\Exception $e) {}
	}


	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('funcionario', 'pessoa_fisica.id_pessoa_fisica = funcionario.id_pessoa_fisica');
    } catch (\Exception $e) {}

	if ($query)
	{
		return $query->get()->result();
	}else{
		echo 'Não existem dados';
		exit;
	}
}
public function find($id_funcionario)
{
	try {
		$funcionario = $this->db->select("*")->from("pessoa")
		->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
		->join('funcionario', 'pessoa_fisica.id_pessoa_fisica = funcionario.id_pessoa_fisica')->where('funcionario.id_funcionario', $id_funcionario)->get();
		if ($funcionario)
		{
			return $funcionario->result();
		}else{
			echo 'Fornecedor não existe';
			return 1;
		}
	} catch (\Exception $e) {}
}

	/**
	* @author: Camila Sales
	* Remove o registro de funcionario associado à uma pessoa fisica
	*
	* @param integer $id_pessoa
	*/
	public function remove($id_funcionario)
	{
		try {
			$this->db->where('id_funcionario', $id_funcionario);
			$this->db->delete('funcionario');
    } catch (\Exception $e) {}
		// delete pessoa fisica;
	}
}
