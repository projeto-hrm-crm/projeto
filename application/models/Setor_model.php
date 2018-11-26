<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_model extends CI_Model
{
  public function __construct(){
    parent::__construct();
  }

  /**
  * @author: Matheus Ladislau
  * Realiza registro de setor
  *
  * @param: mixed
  */
  public function insert($data)
  {
    $this->db->insert('setor', $data);
    $id_setor = $this->db->insert_id();

    if($id_setor)
    {
      $this->relatorio->setLog('insert', 'Inserir', 'cargo_funcionario', $id_setor, 'Inseriu o setor', $id_setor);
    }
  }

  /**
  * @author: Matheus Ladislau
  * Retorna todos registro de setor cadastrados no banco
  * @return array: todos registro de setor cadastrados
  */
  public function get(){
    $setor = $this->db->select(
      '*'
      )
      ->from('setor')
      ->where('setor.deletado is NULL')
      ->get();

      if ($setor) {
        return $setor->result();
      }
      return null;

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
    public function update($id_setor, $data)
    {
      $this->db->update('setor', $data, array('id_setor' => $id_setor));
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

    public function getAtual($id_setor){

      $setor =  $this->db->select(
        '*'
        )->from('setor')
        ->where('setor.id_setor',$id_setor)
        ->where('setor.deletado is NULL')
        ->get();

        if ($setor) {
          return $setor->result();
        }
        return null;
      }

    }
