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
    public function getById($id_pedido_almoxarifado)
    {
        return $this->db->where('id_pedido_almoxarifado', $id_pedido_almoxarifado)->get('pedido_almoxarifado')->result();
    }

    /**
    * @author: Rodrigo
    * Edita o registro de pedido_almoxarifado pelo id_pedido_almoxarifado referente
    *
    * @param integer $id_pedido_almoxarifado refere-se ao id do registro de pedido_almoxarifado a ser editado
    * @return boolean: True - caso editado com sucesso, False - não editado
    */
    public function update($id_pedido_almoxarifado, $data)
    {
      $this->db->update('pedido_almoxarifado', $data, array('id_pedido_almoxarifado' => $id_pedido_almoxarifado));

      $this->setLog($data['pedido_almoxarifado']['nome'], $id_pedido_almoxarifado);

    }

    /**
    * @author: Rodrigo
    * Remove o registro de pedido_almoxarifado pelo id_pedido_almoxarifado referente
    *
    * @param integer: $id_pedido_almoxarifado refere-se ao id do registro de pedido_almoxarifado a ser deletado
    */
    public function remove($id_pedido_almoxarifado)
    {
        $pedido_almoxarifado = $this->db->where('id_pedido_almoxarifado', $id_pedido_almoxarifado)->get('pedido_almoxarifado')->row();

        $this->db
        ->where('id_pedido_almoxarifado', $id_pedido_almoxarifado)
        ->delete('pedido_almoxarifado');

        $this->setLog($pedido_almoxarifado->nome, $pedido_almoxarifado->id_pedido_almoxarifado);


    }
}
