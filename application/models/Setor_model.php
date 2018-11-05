<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_model extends PR_Model
{

    /**
    * @author: Matheus Ladislau
    * Realiza registro de setor
    *
    * @param: mixed
    */
    public function insert($setor)
    {
        $this->db->insert('setor', $setor);

        $this->setLog($setor['nome'],$setor['sigla'],$setor['descricao']);
    }

    /**
    * @author: Matheus Ladislau
    * Retorna todos registro de setor cadastrados no banco
    * @return array: todos registro de setor cadastrados
    */
    public function get(){
        return $this->db->get('setor')->result();
    }

    /**
    * @author: Matheus Ladislau
    * Retorna registro de setor cadastrados no banco com id_setor referente
    *
    * @param integer $id_setor refere-se ao id do registro de setor a ser consultado
    */
    public function getById($id_setor)
    {
        return $this->db->where('id_setor', $id_setor)->get('setor')->result();
    }

    /**
    * @author: Matheus Ladislau
    * Edita o registro de setor pelo id_setor referente
    *
    * @param integer $id_setor refere-se ao id do registro de setor a ser editado
    * @return boolean: True - caso editado com sucesso, False - não editado
    */
    public function update($setor)
    {
        $this->db
        ->set('setor.nome', $setor['nome'])
        ->set('setor.sigla', $setor['sigla'])
        ->set('setor.descricao', $setor['descricao'])
        ->where('setor.id_setor', $setor['id_setor'])
        ->update('setor');

        $this->setLog($setor['nome'], $setor['sigla'], $setor['descricao'], $setor['id_setor']);

    }

    /**
    * @author: Matheus Ladislau
    * Remove o registro de setor pelo id_setor referente
    *
    * @param integer: $id_setor refere-se ao id do registro de setor a ser deletado
    */
    public function remove($id_setor)
    {
        $setor = $this->db->where('id_setor', $id_setor)->get('setor')->row();

        $this->db->where('id_setor', $id_setor);
        $id_produto = $this->db->delete('setor');

        $this->setLog($setor->nome, $setor->sigla, $setor->descricao, $setor->id_setor);

    }
}
