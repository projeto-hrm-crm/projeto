<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Funcionario_model extends CI_Model {

	public $id_pessoa_fisica;
	/**
	* @author: Camila Sales
	* Salva o registro de funcionario associado à uma pessoa fisica
	*
	* @param integer $id_pessoa_fisica
	*/
	public function insert($id_pessoa_fisica)
	{
		$this->id_pessoa = $id_pessoa_fisica;
		$this->db->insert('funcionario', $this);
	}

	/**
	* @author: Camila Sales
	* Remove o registro de funcionario associado à uma pessoa fisica
	*
	* @param integer $id_pessoa_fisica
	*/
	public function remove($id_pessoa_fisica)
	{
		$this->db->where('id_pessoa_fisica', $id_pessoa_fisica);
		$this->db->delete('funcionario');
		// delete pessoa fisica;
	}
}
