<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documento_model extends CI_Model {
	
	/**
	* @author: Tiago Villalobos
	* Salva um documento associado à uma pessoa
	* 
	* 
	* @param integer $id_pessoa
	*/
	public function insert($documento)
	{
		$this->db->insert('documento', $documento);
	}


	public function get(){}	

	/**
	* @author: Tiago Villalobos
	* Atualiza um documento associado à uma pessoa
	* 
	* 
	*/	
	public function update($documento)
	{
		$this->db->where('documento.id_pessoa', $documento['id_pessoa']);
		
		$this->db->set('documento.numero', $documento['numero']);
		$this->db->set('documento.tipo',   $documento['tipo']);

		$this->db->update('documento');
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
