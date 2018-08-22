<?php 

class Notificacao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($to_id)
    {
        $this->db->select('*')
                 ->from('notificacao')
                 ->where('to_id', $to_id);
        $sql = $this->db->get();
        
        if ($sql->num_rows() > 0)
            return $sql->result();
        return null;
    }
}