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
          'email' => $data['email']
        ]);
        
        $this->db->insert('sugestao', [
           'id_pessoa' => $id_pessoa,
            'sugestao' => $data['sugestao'],
            'criacao' => date("Y-m-d H:i:s")
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
            ->select('sugestao.*, pessoa.nome')
            ->join('pessoa', 'sugestao.id_pessoa = pessoa.id_pessoa')
            ->order_by('criacao', 'DESC')
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
            ->select('sugestao.*, pessoa.nome, pessoa.email')
            ->join('pessoa', 'sugestao.id_pessoa = pessoa.id_pessoa')            
            ->where('sugestao.id_sugestao', $id_sugestao)
            ->get('sugestao')
            ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Remove o registro de sugestao pelo id_sugestao referente
    *
    * @param integer: $id_sugestao refere-se ao id do registro de sugestao a ser deletado
    */
    public function remove($id_sugestao)  {
        $sugestao = $this->db
            ->select('sugestao.*')            
            ->where('id_sugestao', $id_sugestao)
            ->get('sugestao')
            ->result();
                
        $sugestao_delete = $this->db->where('id_sugestao', $id_sugestao)->delete('sugestao');
        
        return $sugestao[0]->id_pessoa;
        
        
        $this->setLog($sugestao->nome, $sugestao->id_sugestao);        
    }
}

