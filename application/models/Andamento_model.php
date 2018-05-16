<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento_model extends CI_Model 
{

	public function insert($andamento)
	{
		$this->db->insert('andamento', $andamento);
	}

}