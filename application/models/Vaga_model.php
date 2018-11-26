<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga_model extends CI_Model
{

  /*
  *@author: Lucilene Fidelis
  *
  *@return: mixed
  */
  public function get(){
    $vaga =  $this->db->select(
      'vaga.id_vaga, vaga.data_oferta AS data_oferta, vaga.quantidade AS quantidade,
      cargo.nome AS cargo'
      )->from('vaga')
      ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')
      ->get();

      if ($vaga) {
        return $vaga->result();
      }
      return null;

    }
    /*
    *@author: Lucilene Fidelis
    *
    *@params: array - com dados das vagas
    *@return: boolean
    */
    public function insert($array) {

      $this->db->insert('vaga', $array);
      $id_vaga = $this->db->insert_id();

      if($id_vaga)
      {
        $this->relatorio->setLog('insert', 'Inserir', 'Vaga', $id_vaga, 'Inseriu a vaga', $id_vaga);
      }
    }
    /*
    *@author: Lucilene Fidelis
    *
    *@params: mixed com dados das vagas
    *@return: boolean
    */
    public function update($vaga){
      $this->db->where('vaga.id_vaga', $vaga['id_vaga']);

      $this->db->set('vaga.data_oferta', $vaga['data_oferta']);
      $this->db->set('vaga.quantidade',  $vaga['quantidade']);
      $this->db->set('vaga.requisitos',  $vaga['requisitos']);
      $this->db->set('vaga.id_cargo',    $vaga['id_cargo']);
      $id_vaga = $this->db->update('vaga');

      if($id_vaga)
      {
        $this->relatorio->setLog('update', 'Atualizar', 'Vaga', $id_vaga, 'Atualizou a vaga', $vaga['id_vaga']);
      }
    }

    /*
    *@author: Lucilene Fidelis
    *
    *@params: mixed com dados das vagas
    *@return: boolean
    */
    public function remove($id){
      $this->db->where('vaga.id_vaga', $id);
      $id_vaga = $this->db->delete('vaga');

      if($id_vaga)
      {
        $this->relatorio->setLog('delete', 'Deletar', 'Vaga', $id_vaga, 'Deletou a vaga', $id);
      }
    }

    /*
    * @author: Lucilene Fidelis
    * Esse método retorna um objeto Vaga através de seu $id
    *
    * @params: $id
    * @return: object Vaga
    */
    public function getById($id){

      $vaga = $this->db->select(
        'vaga.id_vaga, vaga.data_oferta AS data_oferta, vaga.quantidade AS quantidade, vaga.requisitos, vaga.id_cargo,
        cargo.nome AS cargo'
        )->from('vaga')
        ->join('cargo', 'cargo.id_cargo = vaga.id_cargo')
        ->where('vaga.id_vaga',$id)
        ->get();

        if ($vaga) {
          return $vaga->row();
        }
        return null;
      }

      /**
      * @author: Pedro Henrique
      * Método responsável por contar o total de vagas
      *
      * @param void
      * @return int
      */

      public function count()
      {
        $this->db->select('count(*) as vagas')
        ->from('vaga')
        ->join('cargo', 'vaga.id_cargo = cargo.id_cargo');
        $query = $this->db->get();

        return $query->result()[0]->vagas;
      }

      /**
      * @author Pedro Henrique Guimarães
      * Método responsável por buscar as últimas vagas
      *
      * @param int $total - total de vagas a retornar
      * @return mixed
      */
      public function getLastJobOpportunity($total)
      {
        $this->db->limit($total);

        $this->db->select('*')
        ->from('vaga')
        ->join('cargo', 'vaga.id_cargo = cargo.id_cargo');
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        return $query->result();
        return null;
      }

      public function getVaga_Processo($id){

        $vaga_processo =  $this->db->select(
          '*'
          )->from('processo_seletivo')
          ->join('vaga', 'vaga.id_vaga = processo_seletivo.id_vaga')
          ->where('processo_seletivo.id_vaga',$id)
          ->get();

          if ($vaga_processo) {
            return $vaga_processo->result();
          }
          return null;
        }

      }
