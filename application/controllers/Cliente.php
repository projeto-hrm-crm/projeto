<?php

/**
* author: Mayra Bueno
* Controller de cliente
**/

class Cliente extends CI_Controller
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
  * @author Mayra Bueno
  * Metodo index que chama a view inicial de cliente
  **/
  public function index()
  {
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
    $data = $this->input->post();

    if($data){
        $id_pessoa = $this->pessoa->insert(['nome' => $data['nome'], 'email' => $data['email']]);

        $this->endereco->insert(['cep'=> $this->input->post('cep'),'bairro' => $this->input->post('bairro'),
        'logradouro'  => $this->input->post('logradouro'),'numero' => $this->input->post('numero'), 'complemento' => $this->input->post('complemento')
        ,'id_pessoa'  => $id_pessoa, 'id_cidade' => $this->input->post('cidade')]);

        $this->documento->insert(['tipo' => 'cpf','numero' => $this->input->post('cpf'),'id_pessoa' => $id_pessoa]);

        $this->telefone->insert(['numero'=>$this->input->post('tel'),'id_pessoa' => $id_pessoa]);
    		$id_pessoa_fisica = $this->pessoa_fisica->insert(['data_nascimento'=> $data['data_nacimento'],'sexo'=>$data['sexo'],'id_pessoa'=>$id_pessoa]);
        $this->cliente->insert(['id_pessoa' => $id_pessoa]);
        $this->session->set_flashdata('success', 'Cliente cadastrado com sucesso.');
        redirect('cliente');
    }

    $data['paises'] = $this->cliente->get_pais();
    $data['estados'] = $this->estado->get();
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
    if ($this->input->post())
    {
      $data['cliente'] = $this->input->post();
        $cliente = $this->cliente->getById($id_cliente);

        $this->pessoa->update(['id_pessoa' => $cliente[0]->id_pessoa, 'nome'=> $data['cliente']['nome'],'email'=>$data['cliente']['email']]);

        $this->endereco->update(['cep'=> $this->input->post('cep'),'bairro' => $this->input->post('bairro'),
        'logradouro'  => $this->input->post('logradouro'),'numero' => $this->input->post('numero'), 'complemento' => $this->input->post('complemento'),
        'id_pessoa'   => $candidato[0]->id_pessoa, 'id_cidade' => $this->input->post('cidade')]);

        $this->documento->update(['tipo' => 'cpf','numero' => $this->input->post('cpf') , 'id_pessoa' => $candidato[0]->id_pessoa]);

        $this->telefone->update(['numero'=>$this->input->post('tel'),'id_pessoa' => $candidato[0]->id_pessoa]);

        $this->pessoa_fisica->update($cliente[0]->id_pessoa_fisica,['data_nascimento'=> $data['cliente']['data_nascimento'],'sexo'=>$data['cliente']['sexo']]);
        $this->session->set_flashdata('success', 'Cliente editado com sucesso.');
        redirect('cliente');
    }
    $data['cliente'] = $this->cliente->getById($id_cliente);
    // $data['cliente'] = $this->cliente->getById($data['cliente'][0]->id_pessoa);

    $data['paises'] = $this->cliente->get_pais();
    $data['estados'] =  $this->estado->get();
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
    $data['cliente'] = $this->cliente->getById($id_cliente);
    if ($data)
    {
      $this->cliente->remove($id_cliente);
      $this->session->set_flashdata('success', 'cliente excluido com sucesso');
      redirect('cliente');
    }
  }

  /**
  * @author Pedro Henrique Guimarães
  *
  * Método chamado por ajax
  */
  public function getChartData()
  {
      echo json_encode($this->cliente->getClienteChartData());
  }
}
