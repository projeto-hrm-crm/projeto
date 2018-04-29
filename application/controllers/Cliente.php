<?php

/**
* author: Mayra Bueno
* Controller de cliente
**/

class Cliente extends CI_Controller
{
  public $menus;

  /**
   * @author Pedro Henrique Guimarães
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */

  // public function __construct()
  // {
  //   parent::__construct();
  //   $user_id = $this->session->userdata('user_login');
  //   $url = isset($_SERVER['PATH_INFO']) ? rtrim($_SERVER['PATH_INFO'], '') : '';
  //   $this->usuario->hasPermission($user_id, $url);
  //   $this->menus = $this->menu->getUserMenu($user_id);
  // }

  /**
  * @author Mayra Bueno
  * Metodo index que chama a view inicial de cliente
  **/
  public function index()
  {
    $data['menus'] = $this->menus;
    $data['title'] = 'Clientes';
    $data['clientes'] = $this->cliente->get();

    loadTemplate('includes/header', 'cliente/index', 'includes/footer', $data);
  }


  /**
  * @author Mayra Bueno
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de Cliente_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de cliente
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {
    $data['menus'] = $this->menus;
    $data = $this->input->post();

    if($data){
        $id_pessoa = $this->pessoa->insert(['nome' => $data['nome'], 'email' => $data['email']]);
    		$id_pessoa_fisica = $this->pessoa_fisica->insert(['data_nascimento'=> $data['data_nacimento'],'sexo'=>$data['sexo'],'id_pessoa'=>$id_pessoa]);
        $this->cliente->insert(['id_pessoa' => $id_pessoa]);
        $this->session->set_flashdata('success', 'Cliente cadastrado com sucesso.');
        redirect('cliente');
    }

    $data['title'] = 'Cadastrar cliente';
    loadTemplate('includes/header', 'cliente/cadastrar', 'includes/footer', $data);
  }


  /**
  * @author Mayra Bueno
  * @author Camila Sales
  * Metodo edit, apresenta o formulario de edição, com os dados do cliente a ser editado,
  * recebe os dados e envia para função update de Cliente_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de cliente
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id_cliente int
  **/
  public function edit($id_cliente)
  {
    $data['menus'] = $this->menus;
    if ($this->input->post())
    {
      $data['cliente'] = $this->input->post();
        $cliente = $this->cliente->find($id_cliente);

        $this->pessoa->update(['id_pessoa' => $cliente[0]->id_pessoa, 'nome'=> $data['cliente']['nome'],'email'=>$data['cliente']['email']]);
        $this->pessoa_fisica->update($cliente[0]->id_pessoa_fisica,['data_nascimento'=> $data['cliente']['data_nascimento'],'sexo'=>$data['cliente']['sexo']]);
        $this->session->set_flashdata('success', 'Cliente editado com sucesso.');
        redirect('cliente');
    }

    $data['cliente'] = $this->cliente->find($id_cliente);
    $data['title'] = 'Editar cliente';
    $data['id'] = $id_cliente;

    loadTemplate('includes/header', 'cliente/editar', 'includes/footer', $data);
  }

  /**
  * @author Mayra Bueno
  * Metodo delete, chama a funçao delete de Cliente_model, passando o id do cliente
  * Redireciona para a pagina index de cliente
  *
  * @param $id_cliente int
  **/
  public function delete($id_cliente)
  {
    $data['cliente'] = $this->cliente->find($id_cliente);
    if ($data)
    {
      $this->cliente->remove($id_cliente);
      $this->session->set_flashdata('success', 'cliente excluido com sucesso');
      redirect('cliente');
    }
  }
}
