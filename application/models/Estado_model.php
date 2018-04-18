<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends CI_Model 
{

	public function insert (){}

	/**
	* @author Tiago Villalobos
	* Retorna todos os estados do banco, ordenados pelo nome do estado
	* 
	* @return mixed array de objetos
	*/
	public function get()
	{	
		$this->db->order_by('estado.nome', 'ASC');
		return $this->db->get('estado')->result();
	}

	public function update(){}

	public function remove(){}

}