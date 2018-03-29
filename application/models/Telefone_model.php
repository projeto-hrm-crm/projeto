<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telefone_model extends CI_Model {

	public $numero;
	public $id_pessoa;
	
	public function insert($id_pessoa)
	{
		$this->numero    = $this->input->post('telefone_numero');
		$this->id_pessoa = $id_pessoa;

		$this->db->insert('telefone', $this);
	}

	public function get(){}	

	
	public function update()
	{
		$this->numero  = $this->input->post('telefone_numero');
		
		$this->db->update('telefone', $this, array('id_pessoa' => $this->input->post('id_pessoa')));
	}	

	
	public function remove()
	{
		$this->db->where('id_pessoa', $this->input->post('id_pessoa'));
		$this->db->delete('telefone');
	}	
	

}
