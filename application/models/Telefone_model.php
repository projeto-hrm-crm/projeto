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
	public function insert($id_pessoa)
	{
		$this->numero    = $this->input->post('telefone');
		$this->id_pessoa = $id_pessoa;

		$this->db->insert('telefone', $this);
	}

	public function get(){}	


	/**
	* @author: Tiago Villalobos
	* Permite atualização de telefone associado à uma pessoa
	*
	* 
	*/
	public function update($id)
	{
		$this->numero    = $this->input->post('telefone');
		$this->id_pessoa = $id;
		
		$this->db->update('telefone', $this, array('id_pessoa' => $this->id_pessoa));
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
