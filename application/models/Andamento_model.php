<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento_model extends CI_Model
{

    /**
    * @author: Tiago Villalobos
    * Insere andamento no banco
    * @param: $andamento mixed
    */
	public function insert($andamento)
	{
		$this->db->insert('andamento', $andamento);
	}

    /**
    * @author: Tiago Villalobos
    * Atualiza andamento no banco
    *
    * @param: $andamento mixed
    */
	public function update($andamento)
	{
        $this->db->where('andamento.id_pedido', $andamento['id_pedido']);

        $this->db->set('andamento.data', $andamento['data']);
        $this->db->set('andamento.situacao', $andamento['situacao']);

        $this->db->update('andamento');

    }

    /**
    * @author: Tiago Villalobos
    * Remove andamento do banco utilizado o id do pedido
    * e retorna verdadeiro ou falso caso consiga remove-lo
    *
    *
    * @param: $id integer
    */
    public function remove($id)
    {

        $query = $this->db->where('andamento.id_pedido', $id);

        $query->delete('andamento');

        return $query->affected_rows() > 0 ? true : false;
    }

}
