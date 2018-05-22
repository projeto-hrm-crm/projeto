<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* author: Nikolas Lencioni
* Controller de fornecedor
**/

class Fornecedor extends CI_Controller
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
   }

  /**
  * author: Nikolas Lencioni
  * Metodo index que chama a view inicial de fornecedores
  **/
  public function index()
  {
    $data['title'] = 'Fornecedores';
    $data['fornecedores'] = $this->fornecedor->get();
    $data['assets'] = array(
     'js' => array(
       'lib/data-table/datatables.min.js',
       'lib/data-table/dataTables.bootstrap.min.js',
       'datatable.js',
       'confirm.modal.js',
     ),
   );
    // print_r($data);
    // exit();

    loadTemplate('includes/header', 'fornecedor/index', 'includes/footer', $data);
  }


  /**
  * author: Nikolas Lencioni
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de Fornecedor_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {

    $data = $this->input->post();

    if($data)
    {
      if ($this->form_validation->run('fornecedor'))
      {
        $this->fornecedor->insert($data);
        $this->session->set_flashdata('success', 'Fornecedor cadastrado com sucesso.');

        redirect('fornecedor');
      }else{
        $this->session->set_flashdata('danger', 'Fornecedor não pode ser cadastrado');

        redirect('fornecedor');
      }
    }

    $data['title'] = 'Cadastrar Fornecedor';
    $data['fornecedor'] = $this->input->post();
    $data['estados'] = $this->estado->get();
    $data['assets'] = array(
     'js' => array(
       'lib/data-table/datatables.min.js',
       'lib/data-table/dataTables.bootstrap.min.js',
       'datatable.js',
       'confirm.modal.js',
     ),
   );
    loadTemplate('includes/header', 'fornecedor/cadastrar', 'includes/footer', $data);
  }


  /**
  * author: Nikolas Lencioni
  * Metodo edit, apresenta o formulario de edição, com os dados do fornecedor a ser editado,
  * recebe os dados e envia para função update de Fornecedor_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id int, id do fornecedor
  **/
  public function edit($id_fornecedor)
  {

    $data = $this->input->post();
    if ($data)
    {

      if ($this->form_validation->run('fornecedor'))
      {
        $this->fornecedor->update($id_fornecedor, $data);
        $this->session->set_flashdata('success', 'Fornecedor editado com sucesso.');
        redirect('fornecedor');
      }else{
        $this->session->set_flashdata('danger', 'Fornecedor não pode ser atualizado.');
        redirect('fornecedor/edit/'.$id_fornecedor);
      }
    }

    $fornecedor = $this->fornecedor->getById($id_fornecedor); //FIXME ARRUMAR
    $state = $this->cidade->findState($fornecedor[0]->id_cidade);
    $data['fornecedor'] = $this->fornecedor->find($id_fornecedor);
    $data['title'] = 'Editar Fornecedor';
    $data['estados'] = $this->estado->get();
    $data['estado_fornecedor'] = $state;
    $data['cidades'] = $this->cidade->getByState($state[0]->id_estado);
    $data['id'] = $id_fornecedor;
    $data['assets'] = array(
     'js' => array(
       'lib/data-table/datatables.min.js',
       'lib/data-table/dataTables.bootstrap.min.js',
       'datatable.js',
       'confirm.modal.js',
     ),
   );

    loadTemplate('includes/header', 'fornecedor/editar', 'includes/footer', $data);
  }

  /**
  * author: Nikolas Lencioni
  * Metodo delete, chama a funçao delete de Fornecedor_model, passando o id do fornecedores
  * Redireciona para a pagina index de fornecedor
  *
  * @param $id_fornecedor int
  **/
  /* public function delete($id_fornecedor)
  {
     $fornecedor = $this->fornecedor->find($id_fornecedor);
     if($fornecedor){
        $this->fornecedor->delete($id_fornecedor);
        $this->session->set_flashdata('success', 'fornecedor deletado com sucesso.');
     }else{
       $this->session->set_flashdata('danger', 'Impossível Deletar!');
     }
     redirect('fornecedor');

  } */

  public function delete($id_fornecedor)
  {
    $data['fornecedor'] = $this->fornecedor->getById($id_fornecedor);
    if ($data)
    {
      $this->fornecedor->remove($id_fornecedor);
      $this->session->set_flashdata('success', 'fornecedor excluido com sucesso');
      redirect('fornecedor');
    }
  }



}
