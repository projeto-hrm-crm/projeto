<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model 
{

	/**
	* @author: Tiago Villalobos
	* Insere pedido no banco e retorna o último id inserido
	*
	* @param: $pedido mixed 
	* @return: integer
	*/
	public function insert($pedido)
	{
		$this->db->insert('pedido', $pedido);

		return $this->db->insert_id();
	}

	/**
	* @author: Tiago Villalobos
	* Insere dados na tabela relacional entre pedido e produto: pedido_produto
	*
	* @param: $products mixed
	*/
	public function insertProducts($products)
	{
		$this->db->insert('pedido_produto', $products);
	}

	/**
	* @author: Tiago Villalobos
	* Remove todos os dados da tabel relacional entre pedido e produto: pedido_produto
	* utilizando o id do pedido e retorna verdadeiro ou falso caso consiga remove-los
	*
	* @param: $id integer
	* @return boolean
	*/
	public function removeProducts($id)
	{
		$query = $this->db->where('pedido_produto.id_pedido', $id);
        $query->delete('pedido_produto');

        return $query->affected_rows() > 0 ? true : false;
	}

	/**
	* @author: Tiago Villalobos
	* Retorna um pedido do banco pelo id do mesmo
	*
	* @param: $id integer
	* @return: mixed
	*/
	public function getById($id)
	{
		return 
			$this->db->select('pedido.*, andamento.situacao')
			->where('pedido.id_pedido', $id)
			->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
			->get('pedido')
			->row();

	}

	/**
	* @author: Tiago Villalobos
	* Retorna todos os pedidos do banco, calculando o valor total dos mesmos
	*
	* @return: mixed
	*/
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
				->group_by('andamento.situacao')
				->group_by('andamento.data')
				->order_by('andamento.data', 'DESC')
				->get()
				->result();

	}

	/**
	* @author: Tiago Villalobos
	* Atualiza um pedido no banco
	*
	* @param: $pedido mixed
	*/
	public function update($pedido)
	{
        $this->db->where('pedido.id_pedido', $pedido['id_pedido']);
        
        $this->db->set('pedido.id_pessoa', $pedido['id_pessoa']);
        $this->db->set('pedido.descricao',    $pedido['descricao']);
        $this->db->set('pedido.tipo',       $pedido['tipo']);
        
        $this->db->update('pedido');

    }

    /**
	* @author: Tiago Villalobos
	* Remove um pedido do banco utilizando o id do mesmo e 
	* retorna verdadeiro ou falso caso consiga remove-lo
	*
	* @param: $id integer
	* @return: boolean
	*/
    public function remove($id)
    { 
        $query = $this->db->where('pedido.id_pedido', $id);
        
        $query->delete('pedido');
        
        return $query->affected_rows() > 0 ? true : false;
    }

}