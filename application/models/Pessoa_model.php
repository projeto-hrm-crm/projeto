<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade salvar um registro de pessoa
	* no banco e retornar um último id inserido.
	*
	* @return integer último id inserido no banco
	*/
	public function insert($pessoa)
	{
		$pessoa['data_criacao'] = date("Y-m-d");
		$this->db->insert('pessoa', $pessoa);
		$id_pessoa = $this->db->insert_id();

		if($id_pessoa)
		{
			$nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'insert';
			$dados['acao'] = 'Inserir';
			$dados['data'] = date('Y-m-d H:i:s');			
			$dados['tabela'] = 'Pessoa';
			$dados['item_editado'] = $id_pessoa;
			$dados['descricao'] = $nome . ' Inseriu pessoa ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_pessoa;
		}
	}


	public function get()
	{

		$this->db->select(
			'pessoa.id_pessoa, pessoa.nome, pessoa.email,
			endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco, endereco.complemento,
			cidade.id_cidade, cidade.nome AS cidade,
			documento.tipo AS tipo_documento, documento.numero AS numero_documento,
			telefone.numero AS telefone,
			estado.id_estado, estado.nome AS estado'
		);

		$this->db->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa');
		$this->db->join('cidade',    'endereco.id_cidade = cidade.id_cidade');
		$this->db->join('documento', 'pessoa.id_pessoa = documento.id_pessoa');
		$this->db->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');
		$this->db->join('estado',    'cidade.id_estado = estado.id_estado');

		return $this->db->get('pessoa')->result();
	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade atualizar os dados
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update($pessoa)
	{
		$this->db->where('pessoa.id_pessoa', $pessoa['id_pessoa']);
		$this->db->set('pessoa.nome', $pessoa['nome']);
		$this->db->set('pessoa.email', $pessoa['email']);
		$this->db->update('pessoa', $pessoa);

		$id_pessoa = $pessoa['id_pessoa'];

		if($id_pessoa)
		{
			$nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'update';
			$dados['acao'] = 'Atualizar';
			$dados['data'] = date('Y-m-d H:i:s');			
			$dados['tabela'] = 'Pessoa';
			$dados['item_editado'] = $id_pessoa;
			$dados['descricao'] = $nome . ' Atualizou pessoa ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_pessoa;
		}

	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco
	* pelo id do mesmo.
	*
	*/
	public function remove($id)
	{
		$this->db->where('id_pessoa', $id);
		$this->db->delete('pessoa');

		if($id)
		{
			$nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'delete';
			$dados['acao'] = 'Deletar';
			$dados['data'] = date('Y-m-d H:i:s');			
			$dados['tabela'] = 'Pessoa';
			$dados['item_editado'] = $id;
			$dados['descricao'] = $nome . ' Deletou a pessoa ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id;
		}
	}


	/**
	* @author Tiago Villalobos
	* Retorna uma stdClass com dados da pessoa pesquisada pelo id da mesma, tabelas relacionadas tabém são retornadas
	*
	*
	* @param  integer id identificação da pessoa
	* @return mixed objeto

	*/
	public function getById($id_pessoa)
	{
		$this->db->select(
			'pessoa.id_pessoa, pessoa.nome, pessoa.email,
			endereco.cep, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco,
			endereco.complemento,
			cidade.id_cidade, cidade.nome AS cidade,
			documento.tipo AS tipo_documento, documento.numero AS numero_documento,
			telefone.numero AS telefone,
			estado.id_estado, estado.nome AS estado'
		);

		$this->db->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa');
		$this->db->join('cidade',    'endereco.id_cidade = cidade.id_cidade');
		$this->db->join('documento', 'pessoa.id_pessoa = documento.id_pessoa');
		$this->db->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');
		$this->db->join('estado',    'cidade.id_estado = estado.id_estado');

		$this->db->where('pessoa.id_pessoa', $id_pessoa);

		return $this->db->get('pessoa')->row();
	}

}
