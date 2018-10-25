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
    $user_id = $this->session->userdata('user_login');
    $id_grupo_acesso = $this->usuario->getUserAccessGroup($user_id);
    $data['fornecedor'] = $this->getFornecedorData($user_id);
    $data['cliente'] = $this->getCustomerData($user_id);
    //$data['candidato'] = $this->getCandidatoData($user_id);

    $data['title'] = 'Contatos';
    $data['assets'] = [
      'js' => [
         'list.min.js',
      ]
    ];
    loadTemplate(
        'includes/header',
        'contato/index',
        'includes/footer',
        $data
      );
  }
  private function getCustomerData($user_id)
  {
    $data = [];
    $data['produtos']     = $this->produto->get();
    $data['calls']        = $this->sac->getCustomerCalls($user_id);
    $data['orders']       = $this->pedido->getCustomerTotalOrders($user_id);
    $data['last_sac']     = $this->sac->getCustomerSac($user_id);
    return $data;
  }



  public function getFornecedorData($user_id)
  {
    $data = [];
    //
    $data['produtos']  = $this->produto->countProdutosFornecedorLogado($user_id);
    $data['last_sac']  = $this->sac->getLastSacFornecedorLogado($user_id);

    return $data;
  }

  /*public function getCandidatoData($user_id)
  {
    $data = [];
    //
    $data['produtos']  = $this->produto->countProdutosFornecedorLogado($user_id);
    $data['etapa']  = $this->sac->getLastSacFornecedorLogado($user_id);

    return $data;
  }*/
}
