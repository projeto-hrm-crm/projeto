<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_model extends PR_Model
{

    /**
    * @author: Matheus Ladislau
    * Realiza registro de cargo
    *
    * @param array: Dados(nome, descricao, salario, id_setor) a serem registrados
    */
    public function insert($cargo)
    {
        $this->db->insert('cargo', $cargo);

        $this->setLog($cargo['nome']);
    }

    /**
    * @author: Matheus Ladislau
    * Retorna todos registro de cargo cadastrados no banco
    * 
    * @return array: todos registro de cargo
    */
    public function get()
    {
        return $this->db->get('cargo')->result(); 
    }

    /**
    * @author: Matheus Ladislau
    * Edita o registro de cargo pelo id_cargo referente
    *
    * @param integer $id_cargo refere-se ao id do registro de cargo a ser editado
    * @return boolean: True - caso editado com sucesso, False - não editado
    */
    public function update($cargo)
    {
        $this->db
        ->set('cargo.nome',      $cargo['nome'])
        ->set('cargo.descricao', $cargo['descricao'])
        ->set('cargo.salario',   $cargo['salario'])
        ->set('cargo.id_setor',  $cargo['id_setor'])
        ->where('cargo.id_cargo', $cargo['id_cargo'])
        ->update('cargo');

        $this->setLog($cargo['nome'], $cargo['id_cargo']);

    }

    /**
    * @author: Matheus Ladislau
    * Remove o registro de cargo pelo id_cargo referente
    *
    * @param integer: $id_cargo refere-se ao id do registro de cargo a ser deletado
    */
    public function remove($id_cargo)
    {
        $cargo = $this->db->where('id_cargo', $id_cargo)->get('cargo')->row();

        $this->db
        ->where('cargo.id_cargo', $id_cargo)
        ->delete('cargo');

        $this->setLog($cargo->nome, $id_cargo);
    }

    /**
    * @author: Peterson Munuera
    * Retorna registro do cargo filtrado pelo id_cargo
    * 
    * @param integer $id_cargo refere-se ao id do registro de cargo a ser buscado
    * @return array: cargo buscado
    */
    public function getById($id_cargo)
    {
        return $this->db
        ->where('cargo.id_cargo', $id_cargo)
        ->get('cargo')
        ->row();
    }
    
}
