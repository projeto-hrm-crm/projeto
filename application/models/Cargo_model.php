<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_model extends PR_Model
{

    /**
    * @author: Matheus Ladislau
    * Realiza registro de cargo
    *
    * @param array: Dados(nome, descricao, salario) a serem registrados
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
        ->set('carga_horaria_semanal', $cargo['carga_horaria_semanal'])
        ->set('cargo.salario',   $cargo['salario'])
        //->set('cargo.horario',  $cargo['horario'])
        //->set('cargo.hora_entrada',  $cargo['hora_entrada'])
        //->set('cargo.hora_saida',  $cargo['hora_saida'])
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

    /**
     * @author Pedro Henrique Guimarães
     * Método Responsável por buscar todos os cargos cadastrados
     *
     * @param void
     * @return int
     */
    public function count()
    {
        $this->db->select('count(*) as cargos')
                 ->from('cargo');
        $query = $this->db->get();

        return $query->result()[0]->cargos;

    }
/*
    public function salarioPorHora($id_cargo)
    {
        $sal =  $this->db->get('salario');
        $hora =  $this->db->get('hora');
        $sh = $sal/($hora*220)
    }  */
}
