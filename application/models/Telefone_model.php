<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telefone_model extends CI_Model {

	public $numero;
	public $id_pessoa;

	/**
	* @author: Tiago Villalobos
	* Salva telefone associado à pessoa.
	*
	* @param integer $id_pessoa
	*/
	public function insert($telefone)
	{
		$this->db->insert('telefone', $telefone);
		$id_telefone = $this->db->insert_id();

		if($id_telefone)
		{
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'insert';
			$dados['acao'] = 'Inserir';
			$dados['data'] = date('Y-m-d');
			$dados['hora'] = date('H:i:s');
			$dados['tabela'] = 'Telefone';
			$dados['item_editado'] = $id_telefone;
			$dados['descricao'] = $dados['id_usuario'] . ' Inseriu o telefone ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_telefone;
		}
	}

	public function get(){}


	/**
	* @author: Tiago Villalobos
	* Permite atualização de telefone associado à uma pessoa
	*
	*
	*/
	public function update($telefone)
	{
		$this->db->where('telefone.id_pessoa', $telefone['id_pessoa']);
		$id_telefone = $this->db->get('telefone')->row()->id_telefone;

		$this->db->set('telefone.numero', $telefone['numero']);
		$this->db->update('telefone');

		if($id_telefone)
		{
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'update';
			$dados['acao'] = 'Atualizar';
			$dados['data'] = date('Y-m-d');
			$dados['hora'] = date('H:i:s');
			$dados['tabela'] = 'Telefone';
			$dados['item_editado'] = $id_telefone;
			$dados['descricao'] = $dados['id_usuario'] . ' Atualizou o telefone ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_telefone;
		}
	}


	/**
	* @author: Tiago Villalobos
	* Remove o telefone associado à uma pessoa
	*
	* @param integer $id_pessoa
	*/
	public function remove($id_pessoa)
	{
		$this->db->where('id_pessoa', $id_pessoa);
		$id_telefone = $this->db->get('telefone')->row()->id_telefone;
		$this->db->delete('telefone');

		if($id_telefone)
		{
			$dados['id_usuario'] = $this->session->userdata('user_login');
			$dados['tipo'] = 'delete';
			$dados['acao'] = 'Deletar';
			$dados['data'] = date('Y-m-d');
			$dados['hora'] = date('H:i:s');
			$dados['tabela'] = 'Telefone';
			$dados['item_editado'] = $id_telefone;
			$dados['descricao'] = $dados['id_usuario'] . ' Deletou o telefone ' . $dados['item_editado'];

			$this->relatorio->setLog($dados);
			return $id_telefone;
		}

	}

}
