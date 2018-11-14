<?php 

class Config_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModulesAndSubModules()
    {
        $data = [];
        //Módulos
        $this->db->select("*")
                 ->from("modulo");

        $modulos = $this->db->get(); 

        $this->db->select("*")
                 ->from('sub_modulo');
        $sub_modulos = $this->db->get(); 

        if ($modulos->num_rows() > 0)
            $data['modulos'] = $modulos->result(); 

        if ($sub_modulos->num_rows() > 0)
            $data['sub_modulos'] = $sub_modulos->result();    
        
        
        return $data;        
    }

    public function createProfile($data)
    {
        $data = json_decode($data); 
        
        $this->db->insert('pessoa', array(
            'nome' => $data['nome'],
            'email' => $data['email'],
            'data_criacao' => date('Y-m-d')
        ));

        $id_pessoa = $this->db->lastInsertId();

        $this->db->insert('usuario', array(
            'login' => $data['email'],
            'senha' =>
        ))
        
        
    }
}