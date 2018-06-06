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
		$id_pedido = $this->db->insert_id();

		if($id_pedido)
		{
			$this->relatorio->setLog('insert', 'Inserir', 'Pedido', $id_pedido, 'Inseriu o pedido', $id_pedido);
		}
		return $id_pedido;
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
	* Remove todos os dados da tabela relacional entre pedido e produto: pedido_produto
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
			->where('andamento.atual', TRUE)
			->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
			->get('pedido')
			->row();

	}

	/**
	* @author: Tiago Villalobos
	* Retorna um pedido de cliente do banco pelo id do mesmo, contando com todos os dados relativos de outras tabelas
	*
	* @param: $id integer
	* @return: mixed
	*/
	public function getByIdCompleteDataClient($id)
	{
		$this->db->select('pedido.id_pedido, pedido.id_pessoa, pedido.descricao, pedido.tipo, (valor * pedido_produto.quantidade) as subtotal')
		    ->from('produto')
		    ->join('pedido_produto', 'produto.id_produto = pedido_produto.id_produto')
		    ->join('pedido', 'pedido.id_pedido = pedido_produto.id_pedido');

		$sub_query = $this->db->get_compiled_select();

		return
			$this->db->select(
					'pedido.id_pedido AS id, pedido.tipo, descricao, pessoa.nome AS cliente,
					andamento.situacao, andamento.data,  SUM(subtotal) AS total,
					documento.numero AS documento, documento.tipo AS tipo_documento,
					telefone.numero AS telefone,
					endereco.logradouro, endereco.bairro, endereco.numero AS endereco_numero, endereco.complemento,
					cidade.nome AS cidade,
					estado.uf AS estado'
				)
				->from("($sub_query) AS pedido", NULL, FALSE)
				->join('cliente',   'pedido.id_pessoa = cliente.id_pessoa')
				->join('pessoa',    'cliente.id_pessoa = pessoa.id_pessoa')
				->join('endereco',  'cliente.id_pessoa = endereco.id_pessoa')
				->join('documento', 'documento.id_pessoa = cliente.id_pessoa')
				->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
				->join('telefone',  'telefone.id_pessoa = cliente.id_pessoa')
				->join('cidade',    'endereco.id_cidade = cidade.id_cidade')
				->join('estado',    'estado.id_estado = cidade.id_estado')
				->where('andamento.atual', TRUE)
				->where('pedido.id_pedido', $id)
				->order_by('andamento.data', 'DESC')
				->get()
				->row();
	}

	/**
	* @author: Tiago Villalobos
	* Retorna um pedido de fornecedor do banco pelo id do mesmo, contando com todos os dados relativos de outras tabelas
	*
	* @param: $id integer
	* @return: mixed
	*/
	public function getByIdCompleteDataProvider($id)
	{

		return
			$this->db->select('
				pessoa_juridica.razao_social,
				documento.numero AS documento, documento.tipo AS tipo_documento,
				telefone.numero AS telefone,
				endereco.logradouro, endereco.bairro, endereco.complemento, endereco.numero AS endereco_numero,
				cidade.nome AS cidade,
				estado.uf AS estado,
				andamento.situacao, andamento.data,
				pedido.id_pedido, pedido.descricao')
			->from('pedido')
			->join('pessoa_juridica', 'pessoa_juridica.id_pessoa = pedido.id_pessoa')
			->join('documento', 'documento.id_pessoa = pedido.id_pessoa')
			->join('telefone', 'telefone.id_pessoa = pedido.id_pessoa')
			->join('endereco', 'endereco.id_pessoa = pedido.id_pessoa')
			->join('cidade', 'endereco.id_cidade = cidade.id_cidade')
			->join('estado', 'cidade.id_estado = estado.id_estado')
			->join('andamento', 'andamento.id_pedido = pedido.id_pedido')
			->where('andamento.atual', TRUE)
			->where('pedido.id_pedido', $id)
			->order_by('andamento.data', 'DESC')
			->get()
			->row();
	}

	/**
	* @author: Tiago Villalobos
	* Retorna todos os pedidos de clientes do banco, calculando o valor total dos mesmos
	*
	* @return: mixed
	*/
	public function getFromClients()
	{
		$this->db->select('pedido.id_pedido, pedido.id_pessoa, pedido.descricao, pedido.tipo, (valor * pedido_produto.quantidade) as subtotal')
		    ->from('produto')
		    ->where('pedido.transacao', 'V')
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
				->where('andamento.atual', TRUE)
				->group_by('id')
				->group_by('andamento.situacao')
				->group_by('andamento.data')
				->order_by('andamento.data', 'DESC')
				->get()
				->result();

	}

	/**
	* @author: Tiago Villalobos
	* Retorna todos os pedidos de fornecedores do banco, calculando o valor total dos mesmos
	*
	* @return: mixed
	*/
	public function getFromProviders($id = null)
	{

		$this->db->select('pedido.id_pedido, pedido.id_pessoa, pedido.descricao, pedido.tipo, (valor * pedido_produto.quantidade) as subtotal')
		    ->from('produto')
		    ->where('pedido.transacao', 'C')
		    ->join('pedido_produto', 'produto.id_produto = pedido_produto.id_produto')
		    ->join('pedido', 'pedido.id_pedido = pedido_produto.id_pedido');

		$sub_query = $this->db->get_compiled_select();

		if($id)
		{
			$this->db->join('usuario', 'usuario.id_pessoa = pedido.id_pessoa');
			$this->db->where('usuario.id_usuario', $id);
		}

		return
			$this->db->select(
					'pedido.id_pedido AS id, pedido.tipo, descricao, pessoa_juridica.razao_social AS cliente, andamento.situacao, andamento.data,  SUM(subtotal) AS total'
				)
				->from("($sub_query) AS pedido", NULL, FALSE)
				->join('pessoa_juridica', 'pessoa_juridica.id_pessoa = pedido.id_pessoa')
				->join('fornecedor', 'fornecedor.id_pessoa_juridica = pessoa_juridica.id_pessoa_juridica')
				->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
				->where('andamento.atual', TRUE)
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
        if(isset($pedido['id_pessoa'])) $this->db->set('pedido.id_pessoa', $pedido['id_pessoa']);
        if(isset($pedido['tipo']))      $this->db->set('pedido.tipo',      $pedido['tipo']);
        $this->db->set('pedido.descricao', $pedido['descricao']);
        $id_pedido = $this->db->update('pedido');

        if($id_pedido)
        {
          $this->relatorio->setLog('update', 'Atualizar', 'Pedido', $id_pedido, 'Atualizou o pedido', $pedido['id_pedido']);
        }

        return $id_pedido;
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
       	$this->db->where('pedido.id_pedido', $id);
    	$id_pedido = $this->db->delete('pedido');

		if($id_pedido)
		{
			$this->relatorio->setLog('delete', 'Deletar', 'Pedido', $id_pedido, 'Deletou o pedido', $id);
		}
		return $id_pedido;
    }

}
