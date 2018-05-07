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
 	} catch (\Exception $e) {}
  }


	/**
	* @author: Camila Sales
	* Remove o registro de cliente associado à uma pessoa fisica
	*
	* @param integer $id_cliente
	*/
	public function remove($id_cliente)
	{
		$this->db->where('id_cliente', $id_cliente);
		$this->db->delete('cliente');
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

	public function find($id_cliente)
	{
		try {
			$cliente = $this->db->select("*")->from("pessoa")
			->join('pessoa_fisica', 'pessoa.id_pessoa = pessoa_fisica.id_pessoa')
			->join('cliente', 'pessoa_fisica.id_pessoa = cliente.id_pessoa')->where('cliente.id_cliente', $id_cliente)->get();
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

	public function get_estado(){
		$query = $this->db->get('estado');
		return $query->result();
	}

	public function get_cidade(){
		$query = $this->db->get('cidade');
		return $query->result();
	}

}
