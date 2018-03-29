<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documento_model extends CI_Model {
	
	public $numero;
	public $tipo;
	public $id_pessoa;
	
	public function insert($id_pessoa)
	{
		$this->numero    = $this->input->post('documento_numero');
		$this->tipo      = $this->input->post('tipo');
		$this->id_pessoa = $id_pessoa;

		$this->db->insert('documento', $this);
	}

	public function get(){}	

	
	public function update()
	{
		$this->numero  = $this->input->post('documento_numero');
		$this->tipo    = $this->input->post('tipo');
		
		$this->db->update('documento', $this, array('id_pessoa' => $this->input->post('id_pessoa')));
	}	

	
	public function remove()
	{
		$this->db->where('id_pessoa', $this->input->post('id_pessoa'));
		$this->db->delete('documento');
	}
}
