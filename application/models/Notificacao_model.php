<?php 

class Notificacao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * @author Pedro Henrique Guimarães 
    * 
    * Busca todas as notificações de um determinado usuário
    *
    * @param int $to_id
    * @return mixed 
    */ 
   public function get($to_id)
    {
        $this->db->select('*')
                 ->from('notificacao')
                 ->where('destinatario_id', $to_id)
                 ->order_by('id_notificacao', 'DESC');
        $sql = $this->db->get();
        
        if ($sql->num_rows() > 0)
            return $sql->result();
        return null;
    }

    /**
    * @author Pedro Henrique Guimarães 
    * 
    * Busca todas as notificações de um determinado usuário
    *
    * @param int $to_id
    * @return int 
    */ 
    public function getTotal($to_id)
    {
        $this->db->select('count(*) as count')
                 ->from('notificacao')
                 ->where('destinatario_id', $to_id);
        $sql = $this->db->get();   

        return $sql->result()[0]->count;
    }

     /**
    * @author Pedro Henrique Guimarães 
    * 
    * Busca o total de notificações
    *
    * @param int $to_id
    * @return int 
    */ 
    public function getCount($to_id)
    {
        $this->db->select('count(*) as count')
                 ->from('notificacao')
                 ->where('view', 0) 
                 ->where('destinatario_id', $to_id);
        $sql = $this->db->get();   

        return $sql->result()[0]->count;
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Método responsável por setar a notificação como visualizada
     * 
     * @param int $notification_id
     * @return void 
     */
    public function setViewed($notification_id)
    {
        $this->db->where('id_notificacao', $notification_id);
        $this->db->update('notificacao', ['view' => 1]);
    }
}