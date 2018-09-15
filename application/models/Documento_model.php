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
			$this->relatorio->setLog('insert', 'Inserir', 'Documento', $id_documento, 'Inseriu o documento', $id_documento);
		}
		return $id_documento;
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
		$id_documento = $this->db->get('documento')->row()->id_documento;

		$this->db->set('documento.numero', $documento['numero']);
		$this->db->set('documento.tipo',   $documento['tipo']);

		$this->db->update('documento');

		if($id_documento)
		{
			$this->relatorio->setLog('update', 'Atualizar', 'Documento', $id_documento, 'Atualizou o documento', $id_documento);
		}
		return $id_documento;
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
		$id_documento = $this->db->get('documento')->row()->id_documento;
		$this->db->delete('documento');

		if($id_documento)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Documento', $id_documento, 'Deletou o documento', $id_documento);
		}
		return $id_documento;

	}
}
