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

	public function removeProducts($id)
	{
		$query = $this->db->where('pedido_produto.id_pedido', $id);
        $query->delete('pedido_produto');

        return $query->affected_rows() > 0 ? true : false;
	}

	public function getById($id_pedido)
	{
		return 
			$this->db->select('pedido.*, andamento.situacao')
			->where('pedido.id_pedido', $id_pedido)
			->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
			->get('pedido')
			->row();

	}

	public function get()
	{
		
		$this->db->select('pedido.id_pedido, pedido.id_pessoa, pedido.descricao, pedido.tipo, (valor * quantidade) as subtotal')
		    ->from('produto')
		    ->join('pedido_produto', 'produto.id_produto = pedido_produto.id_produto')
		    ->join('pedido', 'pedido.id_pedido = pedido_produto.id_pedido');

		$sub_query = $this->db->get_compiled_select();
		     
		return 
			$this->db->select(
					'pedido.id_pedido AS id, pedido.tipo, descricao, pessoa.nome AS cliente, andamento.situacao, andamento.data,  SUM(subtotal) AS total'
				)
				->from("($sub_query) AS pedido", NULL, FALSE)
				->join('cliente', 'pedido.id_pessoa = cliente.id_pessoa')
				->join('pessoa',  'cliente.id_pessoa = pessoa.id_pessoa')
				->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
				->group_by('id')
				->order_by('andamento.data', 'DESC')
				->get()
				->result();

	}

	public function update($pedido)
	{
        $this->db->where('pedido.id_pedido', $pedido['id_pedido']);
        
        $this->db->set('pedido.id_pessoa', $pedido['id_pessoa']);
        $this->db->set('pedido.descricao',    $pedido['descricao']);
        $this->db->set('pedido.tipo',       $pedido['tipo']);
        
        $this->db->update('pedido');

    }

    public function remove($id)
    { 
        $query = $this->db->where('pedido.id_pedido', $id);
        
        $query->delete('pedido');
        
        return $query->affected_rows() > 0 ? true : false;
    }

}