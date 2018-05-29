<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_model extends CI_Model {

	/**
	* @author: Tiago Villalobos
	* Salva um endereço associado à uma pessoa
	*
	*
	* @param integer $id_pessoa
	*/
	public function insert($endereco)
	{
		$this->db->insert('endereco', $endereco);
		$id_endereco = $this->db->insert_id();

		if($id_endereco)
		{
			$nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'insert';
			$dados['acao'] = 'Inserir';
			$dados['data'] = date('Y-m-d H:i:s');			
			$dados['tabela'] = 'Endereco';
			$dados['item_editado'] = $id_endereco;
			$dados['descricao'] = $nome . ' Inseriu o endereço ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_endereco;
		}
	}


	public function get(){}


	/**
	* @author: Tiago Villalobos
	* Atualiza um endereço associado à uma pessoa
	*
	*
	*/
	public function update($endereco)
	{
		$this->db->where('endereco.id_pessoa', $endereco['id_pessoa']);
		$this->db->set('endereco.cep',         $endereco['cep']);
		$this->db->set('endereco.bairro',      $endereco['bairro']);
		$this->db->set('endereco.logradouro',  $endereco['logradouro']);
		$this->db->set('endereco.numero',      $endereco['numero']);
		$this->db->set('endereco.complemento', $endereco['complemento']);
		$this->db->set('endereco.id_cidade',   $endereco['id_cidade']);

		$id_endereco = $this->db->get('endereco')->row()->id_endereco;
		$this->db->update('endereco');

		if($id_endereco)
		{
			$nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'update';
			$dados['acao'] = 'Atualizar';
			$dados['data'] = date('Y-m-d H:i:s');			
			$dados['tabela'] = 'Endereco';
			$dados['item_editado'] = $id_endereco;
			$dados['descricao'] = $nome . ' Atualizou o endereço ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_endereco;
		}
	}


	/**
	* @author: Tiago Villalobos
	* Remove um endereço associado à uma pessoa
	*
	*
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$id_endereco = $this->db->get('endereco')->row()->id_endereco;
		$this->db->delete('endereco');
		
		if($id_endereco)
		{
			$nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'delete';
			$dados['acao'] = 'Deletar';
			$dados['data'] = date('Y-m-d H:i:s');			
			$dados['tabela'] = 'Endereco';
			$dados['item_editado'] = $id_endereco;
			$dados['descricao'] = $nome . ' Deletou o endereço ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_endereco;
		}

	}

}
