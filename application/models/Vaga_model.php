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
        $this->db->select(
            'vaga.id_vaga, vaga.data_oferta, vaga.quantidade,
             cargo.nome AS cargo'
             // setor.nome AS setor'
        );
        $this->db->join('cargo', 'vaga.id_cargo = cargo.id_cargo');
        // $this->db->join('setor', 'cargo.id_setor = setor.id_setor');

        return $this->db->get('vaga')->result();
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

      $this->db->where('vaga.id_vaga', $id);
      return $this->db->get('vaga')->row();
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

}
