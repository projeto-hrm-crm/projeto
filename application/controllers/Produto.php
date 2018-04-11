<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Produto extends CI_Controller
    {
        public function index()
        {
            $data['title'] = 'Produtos';
            loadTemplate('includes/header', 'produto/index', 'includes/footer', $data);
        }

        public function create()
        {
            $data['title'] = 'Novo Produto';
            loadTemplate('includes/header', 'produto/cadastrar', 'includes/footer', $data);
        }
        public function edit()
        {
            $data['title'] = 'Editar Produto';
            loadTemplate('includes/header', 'produto/editar', 'includes/footer', $data);
        }

    }
