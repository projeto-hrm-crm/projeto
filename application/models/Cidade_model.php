<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_Model 
{

	public function insert ()
	{

	}
	/**
	* @author Rodrigo
	* Retorna todos as cidade do banco, ordenados pelo nome
	* 
	* @return mixed array de objetos
	*/
	public function get()
	{
      $this->db->order_by('cidade.nome', 'ASC');
		return $this->db->get('cidade')->result();
	}
	
	public function update()
	{

	}
	
	public function remove()
	{

	}	
   /**
	* @author Rodrigo
	* Retorna um cidade pelo id
	* 
	* @return mixed array de objetos
	*/
	public function findState($id){
      $this->db->select('id_estado');
		return $this->db->get_where('cidade', array('id_cidade' => $id))->result();
   }
   
   /**
	* @author Rodrigo
	* Retorna todos as cidade do banco, ordenados pelo nome do estado
	* 
	* @return mixed array de objetos
	*/
	public function getByState($state)
	{	
		$this->db->select('id_cidade, nome');
		return $this->db->get_where('cidade', array('id_estado' => $state))->result();
	}

}
