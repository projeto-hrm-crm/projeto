<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $access_group = $this->session->userdata('user_id_grupo_acesso');
    $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    //$this->usuario->hasPermission($access_group, $currentUrl);
  }

  public function index()
  {
    $data['title'] = 'Grupo';

    loadTemplate(
      'includes/header',
      'grupo/index',
      'includes/footer',
      $data
    );
  }



}
