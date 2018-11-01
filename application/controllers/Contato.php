<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller
{
  public function __construct()
  {
    parent::__construct('contato');
  }

  public function index()
	{
    $data = $this->getDadosGerais();
    $data['title'] = 'Contatos';
    $data['assets'] = [
      'js' => [
         'list.min.js',
         'contato/contato.js',
      ]
    ];

    loadTemplate(
        'includes/header',
        'contato/index',
        'includes/footer',
        $data
      );
  }

  public function getDadosGerais(){

    $data = [];
    $data['telefones'] = $this->telefone->get();
    $data['pessoas'] = $this->pessoa->get();
    $data['clientes'] = $this->cliente->get();
    $data['fornecedores'] = $this->fornecedor->get();
    $data['funcionarios'] = $this->funcionario->get();
    $data['candidatos'] = $this->candidato->get();
    $data['telefone'] = $this->telefone->get();
    return $data;
  }

  public function getDataCustomer(){
    $data = [];

    return $data;
  }
}
