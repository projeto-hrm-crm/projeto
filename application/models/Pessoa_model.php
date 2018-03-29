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
	public function insert()
	{
		$this->db->insert('pessoa', $this->input->post());

		return $this->db->insert_id();
	}

	public function get(){}	

	/**
	* @author: Tiago Villalobos
	* Este método tem como finalidade atualizar os dados 
	* de um registro de pessoa no banco pelo id do mesmo.
	*
	*/
	public function update()
	{
		$this->db->where('id_pessoa', $this->input->post('id_pessoa'));
		$this->db->update('pessoa', $this->input->post());
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
