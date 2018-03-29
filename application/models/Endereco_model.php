<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_model extends CI_Model {

	public $cep;
	public $estado;
	public $cidade;
	public $bairro;
	public $logradouro;
	public $numero;
	public $complemento;
	public $id_pessoa;
	

	/**
	* @author: Tiago Villalobos
	* Salva um endereço associado à uma pessoa
	* 
	* 
	* @param integer $id_pessoa
	*/
	public function insert($id_pessoa)
	{
		$this->cep         = $this->input->post('cep');
		$this->estado      = $this->input->post('estado');
		$this->cidade      = $this->input->post('cidade');
		$this->bairro      = $this->input->post('bairro');
		$this->logradouro  = $this->input->post('logradouro');
		$this->numero      = $this->input->post('endereco_numero');
		$this->complemento = $this->input->post('complemento');
		$this->id_pessoa   = $id_pessoa;
	

		$this->db->insert('endereco', $this);
	}


	public function get(){}	


	/**
	* @author: Tiago Villalobos
	* Atualiza um endereço associado à uma pessoa
	* 
	* 
	*/
	public function update()
	{
		$this->cep         = $this->input->post('cep');
		$this->estado      = $this->input->post('estado');
		$this->cidade      = $this->input->post('cidade');
		$this->bairro      = $this->input->post('bairro');
		$this->logradouro  = $this->input->post('logradouro');
		$this->numero      = $this->input->post('endereco_numero');
		$this->complemento = $this->input->post('complemento');
		$this->id_pessoa   = $this->input->post('id_pessoa');
		
		$this->db->update('endereco', $this, array('id_pessoa' => $this->id_pessoa));
	}	

	
	/**
	* @author: Tiago Villalobos
	* Remove um endereço associado à uma pessoa
	* 
	* 
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$this->db->delete('endereco');
	}	

}
