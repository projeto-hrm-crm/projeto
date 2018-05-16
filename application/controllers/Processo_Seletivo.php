<?php

/**
* author: Nikolas Lencioni
* Controller de funcionario
**/

class Processo_Seletivo extends CI_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
      $this->usuario->hasPermission($user_id, $currentUrl);
    $this->load->model('funcionario_model');
  }

  public function index()
  {
    $data['title'] = 'Processo Seletivo'
  }

  public function create()
  {

  }

  public function edit()
  {

  }
}
