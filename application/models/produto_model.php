<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{   
    public $nome;
    public $codigo;
    public $fabricacao;
    public $validate;
    public $lote;
    public $recebimento;
    
    public function __construct(){
        parent::__construct();
    }
    
    /*
    *@author: Dhiego Balthazar
    *
    *
    */
    public function get(){
        $query = $this->db->get('produto');
        return $query->result();
    }
    
    public function insert() {
        return $this->db->insert('produto', $this);        
    }
    
    public function update($dados){
        return $this->db->update('produto', $dados);
    }
    
    public function delete($id){
        $this->db->where('id_produto', $id);
        return $this->db->delete('produto');
    }
}