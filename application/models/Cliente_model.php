<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente_model extends CI_Model {

	public $id_pessoa;
	/**
	* @author: Camila Sales
	* Salva o registro de cliente associado à uma pessoa fisica
	*
	*/
	public function insert($data)
  {
 	try {
 		$this->db->insert('cliente', $data);
		$id_cliente = $this->db->insert_id();

		if($id_cliente)
		{
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'insert';
			$dados['acao'] = 'Inserir';
			$dados['data'] = date('Y-m-d');
			$dados['tabela'] = 'Cliente';
			$dados['item_editado'] = $id_cliente;
			$dados['descricao'] = $dados['id_usuario'] . ' Inseriu o cliente ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

			$this->relatorio->setLog($dados);
			return $id_cliente;
		}
 	} catch (\Exception $e) {}
  }


	/**
	* @author: Camila Sales
	* Remove o registro de cliente associado à uma pessoa fisica
	*
	* @param integer $id_cliente
	*/
	public function remove($id)
	{
		$this->db->where('id_cliente', $id);
		$id_cliente = $this->db->delete('cliente');

		if($id_cliente)
		{
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'delete';
			$dados['acao'] = 'Deletar';
			$dados['data'] = date('Y-m-d');
			$dados['tabela'] = 'Cliente';
			$dados['item_editado'] = $id;
			$dados['descricao'] = $dados['id_usuario'] . ' Deletou o cliente ' . $dados['item_editado'] . ' na data de ' . $dados['data'];

			$this->relatorio->setLog($dados);
			return $id_cliente;
		}
		// delete pessoa fisica;
	}

	public function get()
	{
		try {
			$query = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa');
		} catch (\Exception $e) {}

	if ($query)
	{
		return $query->get()->result();
	}else{
		echo 'Não existem dados';
		exit;
	}
	}

	public function getById($id_cliente)
	{
		try {
			$cliente = $this->db->select("
			pessoa.id_pessoa, pessoa.nome, pessoa.email,
			pessoa_fisica.sexo,pessoa_fisica.data_nascimento,
			endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco,
			endereco.complemento,
			cidade.id_cidade,
			documento.numero AS numero_documento,
			telefone.numero AS telefone,
			estado.id_estado
			")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa')
			->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa')
			->join('cidade',    'endereco.id_cidade = cidade.id_cidade')
			->join('documento', 'pessoa.id_pessoa = documento.id_pessoa')
			->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa')
			->join('estado',    'cidade.id_estado = estado.id_estado')
			->where('cliente.id_cliente', $id_cliente)->get();
			if ($cliente)
			{
				return $cliente->result();
			}else{
				echo 'Candidato não existe';
				return 1;
			}
		} catch (\Exception $e) {}
	}

	public function update($id_cliente, $data)
	{
		try {
			$this->db->where('id_cliente', $id_cliente);
			$this->db->update('cliente', $data);

		} catch (\Exception $e) {}
	}

	/**
	* @author: Mayra Bueno
	* Métodos para a caixa de seleção dinâmica
	* País, estado e cidade
	*/
	public function get_pais(){
		$query = $this->db->get('pais');
		return $query->result();
	}

	/**
	* @author: Pedro Henrique
	* Método responsável por alimentar o gráfico de clientes da home
	* País, estado e cidade
	*/
	public function getClienteChartData()
	{
		for($i = 1; $i <= 12; $i++) {
			$this->db->select('count(*) as c')
						   ->from('cliente as c ')
							 ->join('pessoa as p', ' c.id_pessoa = p.id_pessoa')
							 ->where('MONTH(p.data_criacao)', $i);
			$chart[] = $this->db->get()->result()[0]->c;
		}

		$data = [
			'data' => $chart,
			'status' => 'ok'
		];
		return $data;
	}


}
