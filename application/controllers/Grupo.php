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
    $data['modulos_grupos'] = $this->grupo->getModulesForGroups();
    $data['acoes'] = $this->grupo->getActions();
    $data['acoes_sub_modulos'] = $this->grupo->getActionsSubModules();
    $data['acoes_grupos'] = $this->grupo->getActionsForGroups();
    $data['permissoes'] = $this->grupo->getPermissions();
    $data['usuarios'] = $this->grupo->getUsersForGroups();

    // echo '<pre>';
    // echo print_r($data);exit;

    $data['title'] = 'Grupo';

    $data['create_button']  = $this->Button->verify('Grupo', 'Cadastrar');
    $data['edit_button']    = $this->Button->verify('Grupo', 'Editar');
    $data['list_button']  = $this->Button->verify('Grupo', 'Listar');

    loadTemplate(
      'includes/header',
      'grupo/index',
      'includes/footer',
      $data
    );
  }

  public function create(){

    $data = $this->input->post();

    if($data) {

      if($this->form_validation->run('grupo')) {

        $this->grupo->insert($data);
        $this->session->set_flashdata('success', 'Grupo cadastrado com sucesso!');
        redirect('grupo/cadastrar');
        redirect('grupo');
      }
      else {
        $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
        redirect('grupo/cadastrar');
      }
    }

    $data['title'] = 'Cadastrar Grupo de Acesso';
    $data['modulos'] = $this->grupo->getModules();
    //echo "<pre>";
    //print_r($data);exit;
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
