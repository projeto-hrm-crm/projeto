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

		$this->db->update('telefone');
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
