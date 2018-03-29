<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_controller extends CI_Controller
{
    // Rota: http://localhost/projeto/produto
    public function index()
    {
        $produtos = $this->produto->get();
        $this->load->view('produto/index', array('produtos'=>$produtos));
    }
}