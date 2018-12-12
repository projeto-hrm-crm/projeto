<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends PR_Model
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

		$this->setLog($id_pedido);

		return $id_pedido;
	}

	/**
	* @author: Tiago Villalobos
	* Insere dados na tabela relacional entre pedido e produto: pedido_produto
	*
	* @param: $pedido_produto mixed
	*/
	public function insertProducts($pedido_produto)
	{
		$produto = $this->produto->getById($pedido_produto['id_produto']);

		$this->db->insert('pedido_produto', $pedido_produto);
		$this->setLog(
			'',
			$pedido_produto['id_pedido'],
			'Inseriu no pedido '.
			$pedido_produto['id_pedido'].
			' o produto '
			.$produto->nome.
			' quantidade de '.$pedido_produto['quantidade']
		);
	}



	/**
	* @author: Tiago Villalobos
	* Retorna um pedido do banco pelo id do mesmo
	*
	* @param:  $id_pedido integer
	* @return: mixed
	*/
	public function getById($id_pedido)
	{
		return
			$this->db->select('pedido.*, andamento.situacao')
			->where('pedido.id_pedido', $id_pedido)
			->where('andamento.atual', TRUE)
			->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
			->get('pedido')
			->row();

	}

	/**
	* @author: Tiago Villalobos
	* Retorna um pedido de cliente do banco pelo id do mesmo, contando com todos os dados relativos de outras tabelas
	*
	* @param:  $id_pedido integer
	* @return: mixed
	*/
	public function getByIdCompleteDataClient($id_pedido)
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
					endereco.logradouro, endereco.bairro, endereco.numero AS endereco_numero, endereco.complemento'
				)
				->from("($sub_query) AS pedido", NULL, FALSE)
				->join('cliente',   'pedido.id_pessoa = cliente.id_pessoa')
				->join('pessoa',    'cliente.id_pessoa = pessoa.id_pessoa')
				->join('endereco',  'cliente.id_pessoa = endereco.id_pessoa')
				->join('documento', 'documento.id_pessoa = cliente.id_pessoa')
				->join('andamento', 'pedido.id_pedido = andamento.id_pedido')
				->join('telefone',  'telefone.id_pessoa = cliente.id_pessoa')
				->where('andamento.atual', TRUE)
				->where('pedido.id_pedido', $id_pedido)
				->group_by('andamento.situacao')
				->group_by('andamento.data')
				->group_by('documento.numero')
				->group_by('documento.tipo')
				->group_by('telefone.numero')
				->group_by('endereco.logradouro')
				->group_by('endereco.bairro')
				->group_by('endereco.numero')
				->group_by('endereco.complemento')
				->order_by('andamento.data', 'DESC')
				->get();
				echo $this->db->last_query();
				exit;
				// ->row();
	}

	/**
	* @author: Tiago Villalobos
	* Retorna um pedido de fornecedor do banco pelo id do mesmo, contando com todos os dados relativos de outras tabelas
	*
	* @param:  $id_pedido integer
	* @return: mixed
	*/
	public function getByIdCompleteDataProvider($id_pedido)
	{

		return
			$this->db->select('
				pessoa_juridica.razao_social,
				documento.numero AS documento, documento.tipo AS tipo_documento,
				telefone.numero AS telefone,
				endereco.logradouro, endereco.bairro, endereco.complemento, endereco.numero AS endereco_numero,
				andamento.situacao, andamento.data,
				pedido.id_pedido, pedido.descricao')
			->from('pedido')
			->join('pessoa_juridica', 'pessoa_juridica.id_pessoa = pedido.id_pessoa')
			->join('documento', 'documento.id_pessoa = pedido.id_pessoa')
			->join('telefone', 'telefone.id_pessoa = pedido.id_pessoa')
			->join('endereco', 'endereco.id_pessoa = pedido.id_pessoa')
			->join('andamento', 'andamento.id_pedido = pedido.id_pedido')
			->where('andamento.atual', TRUE)
			->where('pedido.id_pedido', $id_pedido)
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
				->group_by('pessoa_juridica.razao_social')
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

        $this->db
        ->set('pedido.descricao', $pedido['descricao'])
        ->update('pedido');

        $this->setLog($pedido['id_pedido'], $pedido['id_pedido']);

    }

    /**
	* @author: Tiago Villalobos
	* Remove um pedido do banco utilizando o id do mesmo e
	*
	* @param:  $id_pedido integer
	* @return: boolean
	*/
    public function remove($id_pedido)
    {
    	$pedido = $this->db->where('id_pedido', $id_pedido)->get('pedido')->row();

       	$this->db
       	->where('pedido.id_pedido', $id_pedido)
       	->delete('pedido');

       	$this->setLog($pedido->id_pedido, $pedido->id_pedido);
    }

    /**
	* @author: Tiago Villalobos
	* Remove todos os dados da tabela relacional entre pedido e produto: pedido_produto
	* utilizando o id do pedido
	*
	* @param: $id_pedido integer
	*/
	public function removeProducts($id_pedido)
	{
		$this->db
		->where('pedido_produto.id_pedido', $id_pedido)
		->delete('pedido_produto');

        $this->setLog(
			'',
			$id_pedido,
			'Removeu os produtos do pedido '.$id_pedido
		);
	}

	/**
	 * @author Pedro Henrique Guimarães
	 *
	 * Verifica se existe determinado produto inserido em algum pedido
	 * @param int $product_id
	 * @return boolean
	 */

	 public function checkIfProductIssetInSomeOrder($product_id)
	 {
		 $this->db->select('id_produto')
				   ->from('pedido_produto')
				   ->where('id_produto', $product_id);
		$sql = $this->db->get();

		if ($sql->num_rows() > 0)
			return true;
		return false;
	 }

	 /**
	  * @author Pedro Henrique Guimarães
	  *
	  * Verifica o total de pedidos realizados pelo cliente logado
	  *
	  * @param int $customer_id
	  * @return int
	 */
	public function getCustomerTotalOrders($customer_id)
	{
		$this->db->select('COUNT(*) orders')
				 ->from('pedido')
				 ->where('pedido.id_pessoa', $customer_id);
		$query = $this->db->get();

		return $query->result()[0]->orders;
	}

}
