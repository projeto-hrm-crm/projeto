<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documento_model extends CI_Model {
	
	public $numero;
	public $tipo;
	public $id_pessoa;
	
	/**
	* @author: Tiago Villalobos
	* Salva um documento associado à uma pessoa
	* 
	* 
	* @param integer $id_pessoa
	*/
	public function insert($id_pessoa)
	{
		$this->numero    = $this->input->post('documento_numero');
		$this->tipo      = $this->input->post('tipo');
		$this->id_pessoa = $id_pessoa;

		$this->db->insert('documento', $this);
	}


	public function get(){}	

	/**
	* @author: Tiago Villalobos
	* Atualiza um documento associado à uma pessoa
	* 
	* 
	*/	
	public function update()
	{
		$this->numero    = $this->input->post('documento_numero');
		$this->tipo      = $this->input->post('tipo');
		$this->id_pessoa = $this->input->post('id_pessoa');
		
		$this->db->update('documento', $this, array('id_pessoa' => $this->id_pessoa));
	}	


	/**
	* @author: Tiago Villalobos
	* Remove um documento associado à uma pessoa
	* 
	* 
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$this->db->delete('documento');
	}


}
