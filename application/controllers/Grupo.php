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
    $data['grupos'] = $this->grupo->get();
    $data['permissoes'] = $this->grupo->getPermissions();
    $data['usuarios'] = $this->grupo->getUsersForGroups();
    //echo '<pre>';
    //echo print_r($data);exit;
    //echo '</pre>';
    $data['title'] = 'Grupo';

    $data['create_button']  = $this->Button->verify('Grupo', 'cadastrar');
    $data['edit_button']    = $this->Button->verify('Grupo', 'Editar');
    $data['list_button']  = $this->Button->verify('Grupo', 'listar');

    loadTemplate(
      'includes/header',
      'grupo/index',
      'includes/footer',
      $data
    );
  }

  public function create(){

    $data['title'] = 'Cadastrar Grupo de Acesso';
    $data['assets'] = array(
      'js' => array(
        'grupo/permissoes.js',
        'validate.js',
        'confirm.modal.js',
      ),
    );

    loadTemplate(
      'includes/header',
      'grupo/cadastrar',
      'includes/footer',
      $data
    );
  }
  public function edit($id_grupo_acesso){

  }

  public function permissoes(){

  }



}
