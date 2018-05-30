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
        $id_andamento = $this->db->insert_id();
        
        if($id_andamento)
        {
            $this->relatorio->insertLog('Andamento', $id_andamento, 'Inseriu o andamento', $id_andamento);
        }
        return $id_andamento;
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
        $id_andamento = $this->db->get('andamento')->row()->id_andamento;

        $this->db->set('andamento.data', $andamento['data']);
        $this->db->set('andamento.situacao', $andamento['situacao']);

        $this->db->update('andamento');

        if($id_andamento)
        {
            $this->relatorio->updateLog('Andamento', $id_andamento, 'Atualizou o andamento', $id_andamento);
        }
        return $id_andamento;

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
        $id_andamento = $this->db->get('andamento')->row()->id_andamento;
        $this->db->where('andamento.id_pedido', $id);
        $this->db->delete('andamento');

        if($id_andamento)
        {
            $this->relatorio->deleteLog('Andamento', $id_andamento, 'Deletou o andamento', $id_andamento);
        }
        return $id_andamento;

    }

}
