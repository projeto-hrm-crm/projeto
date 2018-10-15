<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PedidoAlmoxarifado_model extends PR_Model
{

    /**
    * @author: Rodrigo
    * Realiza registro de pedido_almoxarifado
    *
    * @param: mixed
    */
    public function insert($pedido_almoxarifado)
    {
        $this->db->insert('pedido_almoxarifado', $pedido_almoxarifado);

        $this->setLog($pedido_almoxarifado['nome']);
    }

    /**
    * @author: Rodrigo
    * Retorna todos registro de pedido_almoxarifado cadastrados no banco
    * @return array: todos registro de pedido_almoxarifado cadastrados
    */
    public function get()
    {
        return $this->db
           ->select('pedido_almoxarifado.*, almoxarifado.nome as item, unidade_medida.medida, pessoa.nome as nome, setor.nome as setor')
           ->join('unidade_medida', 'unidade_medida.id_unidade_medida = pedido_almoxarifado.id_unidade_medida')
           ->join('pessoa', 'pessoa.id_pessoa = pedido_almoxarifado.id_requerente')
           ->join('setor', 'setor.id_setor = pedido_almoxarifado.id_setor')
           ->join('almoxarifado', 'almoxarifado.id_almoxarifado = pedido_almoxarifado.id_almoxarifado')
           ->get('pedido_almoxarifado')
           ->result();
    }

    /**
    * @author: Rodrigo
    * Retorna registro de pedido_almoxarifado cadastrados no banco com id_pedido_almoxarifado referente
    *
    * @param integer $id_pedido_almoxarifado refere-se ao id do registro de pedido_almoxarifado a ser consultado
    */
    public function find($id_pedido_almoxarifado)
    {
        return $this->db
           ->select('pedido_almoxarifado.*, almoxarifado.nome as item, almoxarifado.descricao as descricao, unidade_medida.medida, setor.nome as setor')
           ->join('unidade_medida', 'unidade_medida.id_unidade_medida = pedido_almoxarifado.id_unidade_medida')
           ->join('setor', 'setor.id_setor = pedido_almoxarifado.id_setor')
           ->join('almoxarifado', 'almoxarifado.id_almoxarifado = pedido_almoxarifado.id_almoxarifado')
           ->where('pedido_almoxarifado.id_pedido_almoxarifado', $id_pedido_almoxarifado)
           ->get('pedido_almoxarifado')
           ->result();
    }

    /**
    * @author: Rodrigo
    * Altera o status pedido_almoxarifado pelo id_pedido_almoxarifado referente
    *
    */
    public function updateStatus ($id_pedido_almoxarifado, $status, $id_pessoa)
    {
      $this->db
         ->set('status', $status)
         ->set('id_requerido', $id_pessoa)
         ->where('id_pedido_almoxarifado', $id_pedido_almoxarifado)
         ->update('pedido_almoxarifado');
    }
}
