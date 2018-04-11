<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{   
    public $nome;
    public $codigo;
    public $fabricacao;
    public $validade;
    public $lote;
    public $recebimento;
    
    public function __construct(){
        parent::__construct();
    }
    
    /*
    *@author: Dhiego Balthazar
    *
    *@return: mixed
    */
    public function get(){
        $query = $this->db->get('produto');
        return $query->result();
    }
    
    /*
     *@author: Dhiego Balthazar
     * 
     *@params: array - com dados do produto 
     *@return: boolean
    */
    public function insert($array) {
        $this->db->set('nome', $array['nome']);
        $this->db->set('codigo', $array['codigo']);
        $this->db->set('fabricacao', $array['fabricacao']);
        $this->db->set('validade', $array['validate']);
        $this->db->set('lote', $array['lote']);
        $this->db->set('recebimento', $array['recebimento']);
        return $this->db->insert('produto');        
    }
    
    /*
     *@author: Dhiego Balthazar
     * 
     *@params: mixed com dados do produto 
     *@return: boolean
    */
    public function update($array){
        $this->db->set('nome', $array['nome']);
        $this->db->set('codigo', $array['codigo']);
        $this->db->set('fabricacao', $array['fabricacao']);
        $this->db->set('validade', $array['validate']);
        $this->db->set('lote', $array['lote']);
        $this->db->set('recebimento', $array['recebimento']);
        return $this->db->update('produto');        
    }
    

    /*
     *@author: Dhiego Balthazar
     * 
     *@params: mixed com dados do produto 
     *@return: boolean
    */
    public function delete($id){
        $this->db->where('id_produto', $id);
        return $this->db->delete('produto');
    }
}