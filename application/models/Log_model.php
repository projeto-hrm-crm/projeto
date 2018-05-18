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
        public $produto_editado;

        public function __construct(){
            parent::__construct();
        }

    }
