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
	public function remove($id)
	{
		$query = $this->db->where('id_pessoa', $id);
		$query->delete('pessoa');

		return $query->affected_rows() > 0 ? true : false; 
	}	


	/**
	* @author Tiago Villalobos
	* Retorna uma stdClass com dados da pessoa pesquisada pelo id da mesma, tabelas relacionadas tabém são retornadas
	* 	
	* Formato retornado:
	* stdClass Object ( 
	* [id_pessoa] => 7 
	* [nome] => Tiago Villalobos 
	* [email] => asassas@asasas.com 
	* [numero_documento] => 340.124.578-37 
	* [tipo] => CPF 
	* [numero_telefone] => (12) 54514-5000 
	* [cep] => 11541-251 
	* [logradouro] => Rua Treze 
	* [numero_endereco] => 52 
	* [complemento] => apto 1
	* [id_estado] => 15 
	* [nome_bairro] => Estrada do Lago )
	* 
	* @param  integer id identificação da pessoa
	* @return mixed objeto 
	
	*/
	public function getById($id)
	{
		$this->db->select(
			'pessoa.id_pessoa, pessoa.nome, pessoa.email,
			documento.numero AS numero_documento, documento.tipo,
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

		$this->db->where('pessoa.id_pessoa', $id);

		return $this->db->get('pessoa')->row();
	}

}
