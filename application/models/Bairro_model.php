<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bairro_model extends CI_Model 
{

	public $nome;
	public $id_cidade;
	public $id_regiao;


	public function insert()
	{
		$this->nome      = strtoupper($this->input->post('bairro'));
		$this->id_cidade = $this->input->post('cidade');
		
		$id_bairro = $this->checkIfExists($this);
		if($id_bairro)
		{
			return $id_bairro; 
		}
		else
		{
			$this->db->insert('bairro', $this);
			return $this->db->insert_id();
		}


	}

	public function get()
	{

	}

	public function update()
	{
		$this->nome      = strtoupper($this->input->post('bairro'));
		$this->id_cidade = $this->input->post('cidade');

		$id_bairro = $this->checkIfExists($this);
		if($id_bairro)
		{
			return $id_bairro; 
		}
		else
		{
			$this->db->insert('bairro', $this);
			return $this->db->insert_id();
		}



	}

	public function remove()
	{

	}

	private function checkIfExists($bairro)
	{
		$this->db->where('nome', strtoupper($bairro->nome));
		$this->db->where('id_cidade', $bairro->id_cidade);

		$query = $this->db->get('bairro');

		return $query->num_rows() > 0 ? $query->row()->id_bairro : false;
	}

}