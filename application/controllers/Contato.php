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

  public function getDadosGerais()
  {
    $data = [];
    $data['pessoas'] = $this->pessoa->get();
    $data['clientes'] = $this->cliente->getDadosCliente();
    $data['fornecedores'] = $this->fornecedor->getDadosFornecedor();
    $data['funcionarios'] = $this->funcionario->getDadosFuncionario();
    $data['candidatos'] = $this->candidato->getDadosCandidato();
    return $data;
  }

}
