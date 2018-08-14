<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends CI_Model
{

	public function insert (){}

		public function update($data)
		{
			$this->db->update('estado', $data, array('id_estado' => $data['id_estado']));
		}

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

   /**
	* @author Rodrigo
	* Retorna uma cidade especifica
	*
	* @return mixed array de objetos
	*/
	public function getById($id)
	{
		$this->db->select('*');
		return $this->db->get_where('estado', array('id_estado' => $id))->result();
	}


	public function remove(){}

}
