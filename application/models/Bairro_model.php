<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bairro_model extends CI_Model 
{

	public $nome;
	public $id_cidade;
	public $id_regiao;


	public function insert()
	{
		$this->nome      = $this->input->post('bairro');
		$this->id_cidade = $this->input->post('cidade');
		
		$this->db->insert('bairro', $this);

		return $this->db->insert_id();

	}

	public function get()
	{

	}

	public function update()
	{

	}

	public function remove()
	{

	}


}