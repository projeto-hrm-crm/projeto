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
		$id_documento = $this->db->insert_id();

		if($id_documento)
		{
			$this->relatorio->setLog($this->session->userdata('user_login'), 'insert', 'Insere', 'Documento', date('Y-m-d'), 'Documento', $id_documento);
			return $id_documento;
		}
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

		$id_documento = $this->db->update('documento');

		if($id_documento)
		{
			$this->relatorio->setLog($this->session->userdata('user_login'), 'update', 'Atualiza', 'Documento', date('Y-m-d'), 'Documento', $documento['id_pessoa']);
			return $id_documento;
		}
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
