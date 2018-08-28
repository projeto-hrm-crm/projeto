<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_model extends PR_Model {

    /**
    * @author: Rodrigo Alves
    * Este método inserção de dados
    */
    public function insert($avaliacao) {
        $this->db->insert('avaliacao', $avaliacao);
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
        ->select('sac.*, pessoa.nome')
        ->join('cliente', 'sac.id_cliente = cliente.id_cliente')
        ->join('pessoa', 'cliente.id_pessoa = pessoa.id_pessoa')
        ->get('sac')
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
        ->where('sac.id_sac', $id_avaliacao)
        ->get('sac')
        ->result();
    }


    /**
    * @author: Rodrigo Alves
    * Este método atualiza as informações de uma avaliação referenciado pelo id
    *
    * @param: $id_avaliacao mixed
    */
    public function update($id_avaliacao) {

        $this->db
        ->set('sac.id_produto', $sac['id_produto'])
        ->set('sac.titulo', $sac['titulo'])
        ->set('sac.descricao', $sac['descricao'])
        ->set('sac.abertura', $sac['abertura'])
        ->set('sac.fechamento', $sac['fechamento'])
        ->set('sac.encerrado', $sac['encerrado'])
        ->where('sac.id_sac', $sac['id_sac'])
        ->update('sac');

        $this->setLog($sac['titulo'], $sac['id_sac']);

    }


}
