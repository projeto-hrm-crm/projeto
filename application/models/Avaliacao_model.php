<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_model extends PR_Model {

    /**
    * @author: Rodrigo Alves
    * Este método inserção de dados
    */
    public function insert($data) {
                
        $this->db->insert('avaliacao', [
            'pontualidade' => $data['pontualidade'],
            'comprometimento' => $data['comprometimento'],
            'produtividade' => $data['produtividade'],
            'relacao_interpessoal' => $data['relacao_interpessoal'],
            'proatividade' => $data['proatividade'],
            'id_funcionario' => $data['id_funcionario'],
            'id_avaliador' => $data['id_avaliador'],
            'observacao' => $data['observacao'],
            'data_avaliacao' => date("Y-m-d H:i:s")
        ]);
                
        $this->setLog("Nova avaliacao");
        
    }

    /**
    * @author: Rodrigo Alves
    * listar todas as avaliações de um funcionario
    *
    * @param: $id_funcionario integer
    */
    public function get($id_funcionario) {
        return $this->db
        ->select('avaliacao.*, pessoa.nome')
        ->join('funcionario', 'avaliacao.id_funcionario = funcionario.id_funcionario')
        ->join('pessoa', 'pessoa.id_pessoa = funcionario.id_pessoa')
        ->where('avaliacao.id_funcionario', $id_funcionario)
        ->get('avaliacao')
        ->result();
    }

    /**
    * @author: Rodrigo Alves
    * Retorna uma avaliação pelo id
    *
    * @param: $id_avaliacao integer
    */
    public function find($id_avaliacao) {
        return $this->db
        ->where('avaliacao.id_avaliacao', $id_avaliacao)
        ->get('avaliacao')
        ->result();
    }


    /**
    * @author: Rodrigo Alves
    * Este método atualiza as informações de uma avaliação referenciado pelo id
    *
    * @param: $data mixed
    */
    public function update($data) {

        $this->db
        ->set('avaliacao.pontualidade', $data['pontualidade'])
        ->set('avaliacao.comprometimento', $data['comprometimento'])
        ->set('avaliacao.produtividade', $data['produtividade'])
        ->set('avaliacao.relacao_interpessoal', $data['relacao_interpessoal'])
        ->set('avaliacao.proatividade', $data['proatividade'])
        ->set('avaliacao.id_avaliador', $data['id_avaliador'])
        ->set('avaliacao.observacao', $data['observacao'])
        ->where('avaliacao.id_avaliacao', $data['id_avaliacao'])
        ->update('avaliacao');
        
        $this->setLog("Edição avaliação", $data['id_avaliacao']);

    }


}
