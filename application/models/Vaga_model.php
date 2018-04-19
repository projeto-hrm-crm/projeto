<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga_model extends CI_Model 
{

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade salvar um registro de pessoa 
	* no banco e retornar um último id inserido.
	*
	* @return integer último id inserido no banco
	*/
	public function insert($vaga)
	{	
		$this->db->insert('vaga', $vaga);

		return $this->db->insert_id();
	}	


	public function get()
	{
		$this->db->select(
			'vaga.id_vaga, vaga.data_oferta, vaga.quantidade,
			cargo.nome,
			setor.nome'
		);

		$this->db->join('cargo', 'vaga.id_cargo = cargo.id_cargo');
		$this->db->join('setor', 'cargo.id_setor = setor.id_setor');
		
		return $this->db->get('vaga')->result();
	}

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade atualizar os dados 
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update($pessoa)
	{
		
		$this->db->where('vaga.id_vaga', $vaga['id_vaga']);
		
		$this->db->set('vaga.data_oferta', $vaga['data_oferta']);
		$this->db->set('vaga.quantidade',  $vaga['quantidade']);
		$this->db->set('vaga.requisitos',  $vaga['requisitos']);
		$this->db->set('vaga.id_cargo',    $vaga['id_cargo']);

		$this->db->update('vaga');
	}	

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade remover um registro de pessoa do banco
	* pelo id do mesmo.
	*
	*/
	public function remove($id_vaga)
	{
		$query = $this->db->where('vaga.id_vaga', $id_vaga);
		$query->delete('vaga');

		return $query->affected_rows() > 0 ? true : false; 
	}	


	/**
	* @author Tiago Villalobos
	* Retorna uma stdClass com dados da pessoa pesquisada pelo id da mesma, tabelas relacionadas tabém são retornadas
	* 	
	* 
	* @param  integer id identificação da pessoa
	* @return mixed objeto 
	
	*/
	public function getById($id_vaga)
	{
		$this->db->where('vaga.id_vaga', $id_vaga);

		return $this->db->get('vaga')->result();
	}	

}