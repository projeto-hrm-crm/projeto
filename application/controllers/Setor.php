<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $user_id = $this->session->userdata('user_login');
    $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $this->usuario->hasPermission($user_id, $currentUrl);
  }

  /**
  * @author: Desconhecido
  * Carrega a listagem de setores
  */
  public function index()
  {
    $data['title'] = 'Setores';
    $data['setores'] = $this->setor->get();
    $data['assets'] = array(
      'js' => array(
        'confirm.modal.js'
      ),
    );
    foreach ($data['setores'] as $key => $cliente) {
      if($data['setores'][$key]->deletado==null){

      }
    }
    loadTemplate('includes/header', 'setor/index', 'includes/footer', $data);
  }

  /**
  * @author: Matheus Ladislau
  * Realiza o cadastro de um setor, dados recebidos da view setor/cadastro.php
  */
  public function create()
  {
    $data = $this->input->post();

    if($data) {

      if($this->form_validation->run('setor')) {
        $data['criado'] = date("Y-m-d H:i:s");
        $data['atualizado'] = date("Y-m-d H:i:s");

        $antigo = $this->setor->getAtual($data['id_setor']);

        if (isset($antigo[0])) {
          $antigo[0]->atualizado = date("Y-m-d H:i:s");
          $antigo[0]->deletado = date("Y-m-d H:i:s");
          $this->setor->update($antigo[0]->id_setor, $antigo[0]);
        }

        $novo = $this->setor->getById($id_setor);

        if(isset($novo[0])){
          $novo[0]->atualizado = date("Y-m-d H:i:s");
          $novo[0]->deletado = null;
          $this->setor->update($novo[0]->id_setor, $novo[0]);
        }else{
          $this->setor->insert($this->getFromPost());
        }

        $this->session->set_flashdata('success', 'Setor cadastrado com sucesso!');

        $referred_from = $this->session->userdata('referred_from');
        if(isset($referred_from))
        redirect($referred_from, 'refresh');

        redirect('setor');
      }else {
        $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
        redirect('setor/cadastrar');
      }

    }else {
      $data['title'] = 'Setor';
      $data['setores'] = $this->setor->get();
      loadTemplate('includes/header', 'setor/cadastrar', 'includes/footer', $data);
    }

  }

  /**
  * @author: Matheus Ladislau
  *Realiza edição de registro de um setor pelo id, dados recebidos pela view setor/editar.php
  *
  *@param integer: referen-se ao id do setor a ser alterado
  */

  /*public function edit($id_setor)
  {
  if ($this->input->post()){
  $data = $this->input->post();
  $data['atualizado'] = date("Y-m-d H:i:s");

  $antigo = $this->setor->getById($data['id_setor']);
  if (isset($antigo[0]) && $antigo[0]->id_setor == $this->input->post('id_setor')) {
  $this->setor->update($id_setor,$data);
}elseif(isset($antigo[0])){
$antigo[0]->atualizado = date("Y-m-d H:i:s");
$antigo[0]->deletado = date("Y-m-d H:i:s");

$this->setor->update($antigo[0]->id_setor, $antigo[0]);
$novo = $this->setor->getById($this->input->post('id_setor'));

if(isset($novo[0])){
$novo[0]->atualizado = date("Y-m-d H:i:s");
$novo[0]->deletado = null;

$this->setor->update($novo[0]->id_setor, $novo[0]);
}else{
$this->setor->insert($this->getFromPost());
}
}else{
$novo = $this->setor->getById($this->input->post('id_setor'));
if(isset($novo[0])){
$novo[0]->atualizado = date("Y-m-d H:i:s");
$novo[0]->deletado = null;
$this->setor->update($novo[0]->id_setor, $novo[0]);
}else{
$this->setor->insert($this->getFromPost());
}
}


$this->session->set_flashdata('success', 'Setor atualizado com sucesso!');

$referred_from = $this->session->userdata('referred_from');
if(isset($referred_from))
redirect($referred_from, 'refresh');

redirect('setor');
}

$data['title'] = 'Editar Setor';

//$data['setor'] = $this->setor->get();
$data['setor'] = $this->setor->getById($id_setor);
$data['id_setor'] = $id_setor;
loadTemplate('includes/header', 'setor/editar', 'includes/footer', $data);

}*/

public function edit($id_setor)
{
  if ($this->input->post()){
    $data = $this->input->post();
    $data['atualizado'] = date("Y-m-d H:i:s");

    $setor = $this->setor->getById($id_setor);
    if ($setor){
      $antigo = $this->setor->getAtual($id_setor);
      $antigo[0]->atualizado = date("Y-m-d H:i:s");
      $antigo[0]->deletado = date("Y-m-d H:i:s");
      $this->setor->update($antigo[0]->id_setor, $antigo[0]);
      $novo = $this->setor->getById($this->input->post('id_setor'));

      if(isset($novo[0])){
      $novo[0]->atualizado = date("Y-m-d H:i:s");
      $novo[0]->deletado = null;

      $this->setor->update($novo[0]->id_setor, $novo[0]);
      }else{
      $this->setor->insert($this->getFromPost());
      }
    }
    $this->session->set_flashdata('success', 'Setor Atualizado com sucesso!');
    redirect('setor');
  }

  $data['title'] = 'Editar Setor';
  
  $data['setor'] = $this->setor->getById($id_setor);
  $data['id_setor'] = $id_setor;
  loadTemplate('includes/header', 'setor/editar', 'includes/footer', $data);

}


/**
* @author: Matheus Romeo
* Realiza remoção de registro de um setor pelo id, dados recebidos pela view setor/delete.php
*
*@param integer: referen-se ao id do setor a ser alterado
*/

public function delete($id_setor) {
  $setor = $this->setor->getById($id_setor);
  if ($setor){
    $data['atualizado'] = date("Y-m-d H:i:s");
    $data['deletado'] = date("Y-m-d H:i:s");

    $this->setor->update($id_setor,$data);
    $this->session->set_flashdata('success', 'Setor desativado com sucesso!');
  }else {
    $this->session->set_flashdata('danger', 'Não foi possível desativar!');
  }

  $referred_from = $this->session->userdata('referred_from');
  if(isset($referred_from))
  redirect($referred_from, 'refresh');

  redirect('setor');
}


/**
* @author: Tiago Villalobos
* Retorna um array com dados pegos por post
*
* @return: mixed
*/
private function getFromPost()
{
  return array(
    'nome' => $this->input->post('nome'),
    'sigla' => $this->input->post('sigla'),
    'descricao' => $this->input->post('descricao'),
    'criado' => date("Y-m-d H:i:s")
  );
}

/**
* @author: Tiago Villalobos
* Retorna um array com dados pegos por post adicionado a eles o id_setor
*
* @return: mixed
*/
private function getFromPostEdit($id_setor)
{
  $postData = $this->getFromPost();

  $postData['id_setor'] =  $id_setor;

  return $postData;
}
}
