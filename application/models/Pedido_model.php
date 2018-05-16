<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model 
{

	public function insert($pedido)
	{
		$this->db->insert('pedido', $pedido);

		return $this->db->insert_id();
	}

	public function insertProducts($products)
	{
		$this->db->insert('pedido_produto', $products);
	}

}