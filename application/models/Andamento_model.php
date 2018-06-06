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
            $this->relatorio->setLog('insert', 'Inserir', 'Andamento', $id_andamento, 'Inseriu o andamento', $id_andamento);
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
        $this->db->where('andamento.atual', TRUE);

        $situacao_atual = $this->db->get('andamento')->row()->situacao;

        if($situacao_atual == $andamento['situacao'])
        {
            $this->db->set('andamento.data', $andamento['data']);

            $this->db->where('andamento.id_pedido', $andamento['id_pedido']);
            $this->db->where('andamento.atual', TRUE);

            $this->db->update('andamento');
        }
        else
        {
            $this->db->where('andamento.id_pedido', $andamento['id_pedido']);
            $this->db->set('andamento.atual', FALSE);
            $this->db->update('andamento');

            $this->insert($andamento);
        }
        $id_andamento = $this->db->get('andamento')->row()->id_andamento;

        $this->db->set('andamento.data', $andamento['data']);
        $this->db->set('andamento.situacao', $andamento['situacao']);

        $this->db->update('andamento');

        if($id_andamento)
        {
            $this->relatorio->setLog('update', 'Atualizar', 'Andamento', $id_andamento, 'Atualizou o andamento', $id_andamento);
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
            $this->relatorio->setLog('delete', 'Deletar', 'Andamento', $id_andamento, 'Deletou o andamento', $id_andamento);
        }
        return $id_andamento;

    }

    /**
    * @author: Tiago Villalobos
    * Transforma o campo enum de situacao em array
    *
    *
    * @return: mixed
    */
    public function getSituations(){

        $query = "SHOW COLUMNS FROM andamento LIKE 'situacao'";

        $row = $this->db->query("SHOW COLUMNS FROM andamento LIKE 'situacao'")->row()->Type;

        $regex = "/'(.*?)'/";

        preg_match_all( $regex , $row, $enum_array );

        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key => $value)
        {
            $enums[$value] = getSituationName($value);
        }

        return $enums;
    }
}
