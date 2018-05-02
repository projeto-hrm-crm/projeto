<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* author: Nikolas Lencioni
* Controller de fornecedor
**/

class Fornecedor extends CI_Controller
{
  public $menus;
   
   /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
   public function __construct()
   {
      parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $url = isset($_SERVER['PATH_INFO']) ? ltrim($_SERVER['PATH_INFO'], '/') : '';
      $this->usuario->hasPermission($user_id, $url);
      $this->menus = $this->menu->getUserMenu($user_id);
   }

  /**
  * author: Nikolas Lencioni
  * Metodo index que chama a view inicial de fornecedores
  **/
  public function index()
  {
    $data['title'] = 'Fornecedores';
    $data['fornecedores'] = $this->fornecedor->get();
    $data['menus'] = $this->menus;
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
    $data['menus'] = $this->menus;
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
  public function edit($id)
  {
    $data['menus'] = $this->menus;  
    if ($this->input->post())
    {
      
      if ($this->form_validation->run('fornecedor'))
      {
        $this->fornecedor->update($id, (array)$data['fornecedor']);
        $this->session->set_flashdata('success', 'Fornecedor editado com sucesso.');
        redirect('fornecedor');
      }else{
        $this->session->set_flashdata('danger', 'Fornecedor não pode ser atualizado.');
        redirect('fornecedor/edit/'.$id);
      }
    }

    $data['fornecedor'] = $this->fornecedor->find($id);
    $data['title'] = 'Editar Fornecedor';
    $data['fornecedor'] = $this->input->post();
    $data['id'] = $id;

    loadTemplate('includes/header', 'fornecedor/editar', 'includes/footer', $data);
  }

  /**
  * author: Nikolas Lencioni
  * Metodo delete, chama a funçao delete de Fornecedor_model, passando o id do fornecedores
  * Redireciona para a pagina index de fornecedor
  *
  * @param $id int
  **/
  public function delete($id)
  {
    $data['fornecedor'] = $this->fornecedor->find($id);
     $data['menus'] = $this->menus;  
    if ($data)
    {
      $this->fornecedor->delete($id);
      $this->session->set_flashdata('success', 'Fornecedor excluido com sucesso');
      redirect('fornecedor');
    }
  }
}
