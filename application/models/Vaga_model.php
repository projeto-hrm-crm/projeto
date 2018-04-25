<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga_model extends CI_Model
{   
    public $cargo;
    public $setor;
    public $data_oferta;
    
    
    public function __construct(){
        parent::__construct();
    }
    
    /*
    *@author: Lucilene Fidelis
    *
    *@return: mixed
    */
    public function get(){
        try{
            $query = $this->db->get('vaga');
            return $query->result();
        }catch (\Exception $e) {

        }
    }
     /*
     *@author: Lucilene Fidelis
     * 
     *@params: array - com dados das vagas
     *@return: boolean
    */
    public function insert($array) {
        $this->db->set('cargo', $array['cargo']);
        $this->db->set('setor', $array['setor']);
        $this->db->set('data_oferta', $array['data_oferta']);
        return $this->db->insert('vaga');        
    }
     /*
     *@author: Lucilene Fidelis
     * 
     *@params: mixed com dados das vagas
     *@return: boolean
    */
    public function update($array){
        $this->db->where('id_vaga', $array['id_vaga']);
        $this->db->set('cargo', $array['cargo']);
        $this->db->set('setor', $array['setor']);
        $this->db->set('data_oferta', $array['data_oferta']);
        return $this->db->insert('vaga');        
    }
    

    /*
     *@author: Lucilene Fidelis
     * 
     *@params: mixed com dados das vagas
     *@return: boolean
    */
    public function delete($id){
        $this->db->where('id_vaga', $id);
        return $this->db->delete('vaga');
    }

    /*
     * @author: Lucilene Fidelis
     * Esse método retorna um objeto Vaga através de seu $id
     * 
     * @params: $id
     * @return: object Vaga
     */
    public function getById($id){
      $this->db->select('id_vaga, cargo, setor, data_oferta');
      $this->db->where('id_vaga', $id);
      return $this->db->get('vaga')->row();
    }

    /*
     * @author:Lucilene Fidelis
     * Esse método retorna um objeto Vaga através de seu $cargo como parametro de entrada
     * 
     * @params: $cargo
     * @return: object Vaga
     */
    public function getByName($nome){
       $this->db->select('id_vaga, cargo, setor, data_oferta');
      $this->db->where('cargo', $cargo);
      return $this->db->get('vaga')->row();
    }

}