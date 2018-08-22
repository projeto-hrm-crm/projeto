<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sugestao_model extends PR_Model
{
    
    /**
    * @author: Rodrigo Alves
    * Cadastrar Sugestão
    *
    * @param: mixed 
    */
    public function insert($data) {
        
        $id_pessoa = $this->pessoa->insert([
          'nome' => $data['nome'],
          'email' => $data['email'],
        ]);
        
        $this->db->insert('sugestao', [
           'id_pessoa' => $id_pessoa,
            'sugestao' => $data['sugestao']
        ]);

        $this->setLog($data['nome']);
    }

    /**
    * @author: Rodrigo Alves
    * Retorna todas as sugestões
    * @return array: todos registro de sugestões cadastrados
    */
    public function get() {        
        return $this->db
            ->select('sugestao.*, sugestao.sugestao')
            ->join('pessoa', 'sugestao.id_pessoa = pessoa.id_pessoa')
            ->get('sugestao')
            ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Retorna registro de sugestao cadastrados no banco com id_sugestao referente
    *
    * @param integer $id_sugestao refere-se ao id do registro de sugestao a ser consultado
    */
    public function getById($id_sugestao) {
        return $this->db
            ->select('sugestao.*, sugestao.sugestao')
            ->join('pessoa', 'sugestao.id_pessoa = pessoa.id_pessoa')
            ->get('sugestao')
            ->where('sugestao.id_sugestao', $id_sugestao)
            ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Edita o registro de sugestao pelo id_sugestao referente
    *
    * @param integer $id_sugestao refere-se ao id do registro de sugestao a ser editado
    * @return boolean: True - caso editado com sucesso, False - não editado
    */
    public function update($sugestao) {
        $this->db->set('sugestao.sugestao', $sugestao['sugestao'])
            ->where('sugestao.id_sugestao', $sugestao['id_sugestao'])
            ->update('sugestao');
        $this->setLog($sugestao['nome'], $sugestao['id_sugestao']);
    }

    /**
    * @author: Rodrigo Alves
    * Remove o registro de sugestao pelo id_sugestao referente
    *
    * @param integer: $id_sugestao refere-se ao id do registro de sugestao a ser deletado
    */
    public function remove($id_sugestao)  {
        $sugestao = $this->db->where('id_sugestao', $id_sugestao)->get('sugestao')->row();
        $this->db->where('id_sugestao', $id_sugestao)->delete('sugestao');
        $this->setLog($sugestao->nome, $sugestao->id_sugestao);        
    }
}

