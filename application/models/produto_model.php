<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{    
    public function get()
    {
        $query = $this->db->get('produto');
        return $query->result();
    }
    
    public function insert($dados)
    {
        $this->db->insert('produto', $dados);
    }
    
    public function update($dados)
    {
        $this->db->update('produto', $dados);
    }
    
    public function delete($id)
    {
        $this->db->where('id_produto', $id);
        $this->db->delete('produto');
    }
}