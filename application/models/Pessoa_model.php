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
	* Retorna pessoas com suas respectivas relações, ao passar um $id_pessoa delimita-se a condição de busca.
	* 
	* 
	* @todo verificar a necessidade de retornar todos os campos
	* @return mixed array de objetos
	*/
	public function get($id_pessoa = null)
	{

		if($id_pessoa) $this->db->where('pessoa.id_pessoa', $id_pessoa);

		return 
		$this->db->select('pessoa.id_pessoa AS id, pessoa.nome AS nome_pessoa, pessoa.email, telefone.numero AS telefone, documento.numero AS documento, documento.tipo AS tipo_documento, endereco.cep, endereco.estado, endereco.cidade, endereco.bairro, endereco.logradouro, endereco.numero AS numero_endereco, endereco.complemento')
		->from('pessoa')
		->join('telefone', 'telefone.id_pessoa = pessoa.id_pessoa')
		->join('documento', 'documento.id_pessoa = pessoa.id_pessoa')
		->join('endereco', 'endereco.id_pessoa = pessoa.id_pessoa')
		->get()->result();


	}	

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade atualizar os dados 
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update()
	{
		$this->nome  = $this->input->post('nome');
		$this->email = $this->input->post('email');
		
		$this->db->update('pessoa', $this, array('id_pessoa' => $this->input->post('id_pessoa')));
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

}
