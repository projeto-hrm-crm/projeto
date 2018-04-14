<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_Model 
{

	public function insert ()
	{

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

	public function getByState($state)
	{	
		$this->db->select('id_cidade, nome');
		return $this->db->get_where('cidade', array('id_estado' => $state))->result();
	}

}
