<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telefone_model extends CI_Model {

	public $numero;
	public $id_pessoa;

	/**
	* @author: Tiago Villalobos
	* Salva telefone associado à pessoa.
	*
	* @param integer $id_pessoa
	*/
	public function insert($telefone)
	{
		$this->db->insert('telefone', $telefone);
		$id_telefone = $this->db->insert_id();

		if($id_telefone)
		{
			$this->relatorio->setLog($this->session->userdata('user_login'), 'insert', 'Insere', 'Telefone', date('Y-m-d'), 'Telefone', $telefone);
			return $id_telefone;
		}
	}

	public function get(){}


	/**
	* @author: Tiago Villalobos
	* Permite atualização de telefone associado à uma pessoa
	*
	*
	*/
	public function update($telefone)
	{
		$this->db->where('telefone.id_pessoa', $telefone['id_pessoa']);
		$this->db->set('telefone.numero', $telefone['numero']);
		$id_telefone = $this->db->update('telefone');

		if($id_telefone)
		{
			$this->relatorio->setLog($this->session->userdata('user_login'), 'update', 'Atualiza', 'Telefone', date('Y-m-d'), 'Telefone', $telefone['id_pessoa']);
			return $id_telefone;
		}
	}


	/**
	* @author: Tiago Villalobos
	* Remove o telefone associado à uma pessoa
	*
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$this->db->delete('telefone');
	}


}
