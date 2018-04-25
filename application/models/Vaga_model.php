<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga_model extends CI_Model
{   
    
    
    public function __construct(){
        parent::__construct();
    }
    
    /*
    *@author: Lucilene Fidelis
    *
    *@return: mixed
    */
    public function get(){
        $this->db->select(
            'vaga.id_vaga, vaga.data_oferta, vaga.quantidade,
            cargo.nome AS cargo,
            setor.nome AS setor'
        );
        $this->db->join('cargo', 'vaga.id_cargo = cargo.id_cargo');
        $this->db->join('setor', 'cargo.id_setor = setor.id_setor');
        
        return $this->db->get('vaga')->result();
    }
     /*
     *@author: Lucilene Fidelis
     * 
     *@params: array - com dados das vagas
     *@return: boolean
    */
    public function insert($array) {
        
        $this->db->insert('vaga', $vaga);
        return $this->db->insert_id();        
    }
     /*
     *@author: Lucilene Fidelis
     * 
     *@params: mixed com dados das vagas
     *@return: boolean
    */
    public function update($array){
        $this->db->where('id_vaga', $array['id_vaga']);
        
        $this->db->set('vaga.data_oferta', $vaga['data_oferta']);
        $this->db->set('vaga.quantidade',  $vaga['quantidade']);
        $this->db->set('vaga.requisitos',  $vaga['requisitos']);
        $this->db->set('vaga.id_cargo',    $vaga['id_cargo']);
        $this->db->update('vaga');    
    }
    

    /*
     *@author: Lucilene Fidelis
     * 
     *@params: mixed com dados das vagas
     *@return: boolean
    */
    public function remove($id){
        $query = $this->db->where('vaga.id_vaga', $id);
        $query = $this->db->delete('vaga');
        return $query->affected_rows() > 0 ? true : false;
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

    
    

}