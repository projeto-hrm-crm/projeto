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

	public function get()
	{

		$this->db->select('pedido.id_pedido, pedido.id_cliente, pedido.descricao, pedido.tipo, (valor * quantidade) as subtotal')
		    ->from('produto')
		    ->join('pedido_produto', 'produto.id_produto = pedido_produto.id_produto')
		    ->join('pedido', 'pedido.id_pedido = pedido_produto.id_pedido');

		$sub_query = $this->db->get_compiled_select();
		     
		return 
			$this->db->select(
					'pedido.id_pedido AS id, pedido.tipo, descricao, pessoa.nome AS cliente, andamento.situacao, SUM(subtotal) AS total'
				)
				->from("($sub_query) AS pedido", NULL, FALSE)
				->join('cliente', 'pedido.id_cliente = cliente.id_cliente')
				->join('pessoa',  'cliente.id_pessoa = pessoa.id_pessoa')
				->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
				->group_by('id')
				->get()
				->result();

	}

}