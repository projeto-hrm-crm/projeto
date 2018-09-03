<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function index()
    {
        $dados['title'] = 'Agenda';

        $dados['eventos'] = $this->evento->get();

        loadTemplate('includes/header', 'agenda/index', 'includes/footer', $dados);
    }

}
