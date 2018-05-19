<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Log_model extends CI_Model
    {
        public $id_Usuario;
        public $tipo;
        public $acao;
        public $descricao;
        public $data;
        public $tabela;
        public $item_editado;

        public function __construct(){
            parent::__construct();
        }

        public function get()
        {
            return $this->db->get('log')->result();
        }

        public function setLog($id_usuario, $tipo, $acao, $descricao, $data, $tabela, $item_editado)
        {
            $this->db->insert('log', array(
                'id_usuario'   => $id_usuario,
                'tipo'         => $tipo,
                'acao'         => $acao,
                'descricao'    => $descricao,
                'data'         => $data,
                'tabela'       => $tabela,
                'item_editado' => $item_editado,
            ));
        }

    }
