<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Log extends CI_Controller
    {

        public function __construct()
        {
             parent::__construct();
            $user_id = $this->session->userdata('user_login');
            $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
            $this->usuario->hasPermission($user_id, $currentUrl);
        }

        public function index()
        {
          $dados['title'] = 'Relatório de Atividades';
          $dados['assets'] = array(
            'js' => array(
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
            ),
          );

          $dados['logs'] = $this->relatorio->get();

          loadTemplate('includes/header', 'log/index', 'includes/footer', $dados);

        }

    }
