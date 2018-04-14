<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {

	public $nome;
	public $email;

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade salvar um registro de pessoa 
	* no banco e retornar um último id inserido.
	*
	* @return integer último id inserido no banco
	*/
	public function insert()
	{	
		$this->nome  = $this->input->post('nome');
		$this->email = $this->input->post('email');
		
		$this->db->insert('pessoa', $this);

		return $this->db->insert_id();
	}	

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade atualizar os dados 
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update($id)
	{
		$this->nome  = $this->input->post('nome');
		$this->email = $this->input->post('email');
		
		$this->db->update('pessoa', $this, array('id_pessoa' => $id));
	}	

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco
	* pelo id do mesmo.
	*
	*/
	public function remove()
	{
		$this->db->where('id_pessoa', $this->input->post('id_pessoa'));
		$this->db->delete('pessoa');
	}	

	public function find($id)
	{
		$this->db->select(
			'pessoa.id, pessoa.nome, pessoa.email,
			documento.numero AS numero_documento, documento.tipo
			telefone.numero AS numero_telefone,
			endereco.cep, endereco.logradouro, endereco.numero AS numero_endereco, endereco.complemento,
			estado.id_estado,
			bairro.nome AS nome_bairro'
		);

		$this->db->join('documento', 'pessoa.id_pessoa = documento.id_pessoa');
		$this->db->join('telefone',  'pessoa.id_pessoa = telefone.id_pessoa');
		$this->db->join('endereco',  'pessoa.id_pessoa = endereco.id_pessoa');
		$this->db->join('bairro',    'endereco.id_bairro = bairro.id_bairro');
		$this->db->join('cidade',    'bairro.id_cidade = cidade.id_cidade');
		$this->db->join('estado',    'cidade.id_estado = estado.id_estado');

		$this->db->where('pessoa.id', $id);

		return $this->db->get('pessoa')->row();
	}

}
