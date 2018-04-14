<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends CI_Model 
{

	public function insert (){}

	public function get()
	{
		return $this->db->get('estado')->result();
	}

	public function update(){}

	public function remove(){}

}