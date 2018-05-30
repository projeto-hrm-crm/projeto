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

        public function insertLog($tabela, $id, $mensagem, $nome_item)
        {
            $nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'insert';
            $dados['acao'] = 'Inserir';
            $dados['data'] = date('Y-m-d H:i:s');            
            $dados['tabela'] = $tabela;
            $dados['item_editado'] = $id;
            $dados['descricao'] = $nome . ' ' . $mensagem . ' ' . $nome_item;

            $this->db->insert('log', $dados);
        }

        public function updateLog($tabela, $id, $mensagem, $nome_item)
        {
            $nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'update';
            $dados['acao'] = 'Atualizar';
            $dados['data'] = date('Y-m-d H:i:s');            
            $dados['tabela'] = $tabela;
            $dados['item_editado'] = $id;
            $dados['descricao'] = $nome . ' ' . $mensagem . ' ' . $nome_item;

            $this->db->insert('log', $dados);
        }

        public function deleteLog($tabela, $id, $mensagem, $nome_item)
        {
            $nome = $this->usuario->getUserNameById($this->session->userdata('user_login'));
            $dados['id_usuario'] = $this->session->userdata('user_login');
            $dados['tipo'] = 'delete';
            $dados['acao'] = 'Deletar';
            $dados['data'] = date('Y-m-d H:i:s');            
            $dados['tabela'] = $tabela;
            $dados['item_editado'] = $id;
            $dados['descricao'] = $nome . ' ' . $mensagem . ' ' . $nome_item;

            $this->db->insert('log', $dados);
        }

    }
