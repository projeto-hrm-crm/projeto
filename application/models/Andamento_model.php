<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento_model extends PR_Model
{

    /**
    * @author: Tiago Villalobos
    * Insere andamento no banco
    * 
    * @param: $andamento mixed
    */
	public function insert($andamento)
	{
        $this->db->insert('andamento', $andamento);

        $this->setLog(getSituationName($andamento['situacao']).' para o pedido '.$andamento['id_pedido']);
	}

    /**
    * @author: Tiago Villalobos
    * Atualiza andamento no banco
    * Desabilita os outros andamentos deixando apenas o atual habilitado
    * Insere um novo andamento caso necessário
    *
    * @param: $andamento mixed
    */
	public function update($andamento)
	{
        $andamento_atual = $this->db
        ->where('andamento.id_pedido', $andamento['id_pedido'])
        ->where('andamento.atual', TRUE)
        ->get('andamento')->row();

        if($andamento_atual->situacao == $andamento['situacao'])
        {
            $this->db
            ->set('andamento.data', $andamento['data'])
            ->where('andamento.id_pedido', $andamento['id_pedido'])
            ->where('andamento.atual', TRUE)
            ->update('andamento');

            $this->setLog(
                getSituationName($andamento['situacao']).' para o pedido '.$andamento['id_pedido'], 
                $andamento_atual->id_andamento
            );
        }
        else
        {
            $this->db
            ->where('andamento.id_pedido', $andamento['id_pedido'])
            ->set('andamento.atual', FALSE)
            ->update('andamento');

            $this->setLog(
                getSituationName($andamento['situacao']).' para o pedido '.$andamento['id_pedido'], 
                $andamento_atual->id_andamento
            );

            $this->insert($andamento);

            $this->setLog(getSituationName($andamento['situacao']).' para o pedido '.$andamento['id_pedido']);
        }
        
    }

    /**
    * @author: Tiago Villalobos
    * Remove andamento do banco utilizado o id do pedido
    *
    * @param: $id_pedido integer
    */
    public function remove($id_pedido)
    {
        $andamentos = $this->db->where('id_pedido', $id_pedido)->get('andamento')->result();

        $this->db
        ->where('andamento.id_pedido', $id_pedido)
        ->delete('andamento');

        foreach($andamentos as $andamento)
        {
            $this->setLog(getSituationName($andamento->situacao).' para o pedido '.$id_pedido, $andamento->id_andamento);
        }

    }

    /**
    * @author: Tiago Villalobos
    * Transforma o campo enum da tabela andamento, situacao em array
    *
    * @return: mixed
    */
    public function getSituations(){

        $query = "SHOW COLUMNS FROM andamento LIKE 'situacao'";

        $row = $this->db->query("SHOW COLUMNS FROM andamento")->row()->Type;

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
