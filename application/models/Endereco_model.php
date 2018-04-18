<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_model extends CI_Model {

	/**
	* @author: Tiago Villalobos
	* Salva um endereço associado à uma pessoa
	* 
	* 
	* @param integer $id_pessoa
	*/
	public function insert($endereco)
	{
		$this->db->insert('endereco', $endereco);
	}


	public function get(){}	


	/**
	* @author: Tiago Villalobos
	* Atualiza um endereço associado à uma pessoa
	* 
	* 
	*/
	public function update($endereco)
	{

		$this->db->where('endereco.id_pessoa', $endereco['id_pessoa']);
		
		$this->db->set('endereco.cep',         $endereco['cep']);
		$this->db->set('endereco.bairro',      $endereco['bairro']);
		$this->db->set('endereco.logradouro',  $endereco['logradouro']);
		$this->db->set('endereco.numero',      $endereco['numero']);
		$this->db->set('endereco.complemento', $endereco['complemento']);
		$this->db->set('endereco.id_cidade',   $endereco['id_cidade']);
		

		$this->db->update('endereco');
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
