<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento_model extends CI_Model 
{

	public function insert($andamento)
	{
		$this->db->insert('andamento', $andamento);
	}

	public function update($andamento)
	{
        $this->db->where('andamento.id_pedido', $andamento['id_pedido']);
        
        $this->db->set('andamento.data', $andamento['data']);
        $this->db->set('andamento.situacao', $andamento['situacao']);
        
        $this->db->update('andamento');

    }

    public function remove($id)
    {
        
        $query = $this->db->where('andamento.id_pedido', $id);
        
        $query->delete('andamento');
        
        return $query->affected_rows() > 0 ? true : false;
    }

}