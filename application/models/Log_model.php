<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Log_model extends CI_Model
    {
        
        public function __construct(){
            parent::__construct();
        }

        public function get()
        {
            return $this->db->get('log')->result();
        }

        public function setLog($dados)
        {
            $this->db->insert('log', $dados);
        }

    }
