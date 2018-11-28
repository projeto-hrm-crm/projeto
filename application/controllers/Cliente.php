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
    $access_group = $this->session->userdata('user_id_grupo_acesso');
    $currentUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $this->usuario->hasPermission($access_group, $currentUrl);
  }
 

  /**
  * @author Camila Sales
  * Metodo index que chama a view inicial de cliente
  **/
  public function index()
  {
    $data['title'] = 'Clientes';
    $data['clientes'] = $this->cliente->get();
    $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );

    foreach ($data['clientes'] as $key => $cliente) {
      $data['clientes'][$key]->data_nascimento = switchDate($data['clientes'][$key]->data_nascimento);
    }

    $data['edit_button']    = $this->Button->verify('Cliente', 'Editar');
    $data['delete_button']  = $this->Button->verify('Cliente', 'excluir');

    loadTemplate('includes/header', 'cliente/index', 'includes/footer', $data);
  }


  /**
  * @author Camila Sales
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

        $id_pessoa = $this->pessoa->insert([
            'nome' => $data['nome'],
            'email' => $data['email']]
        );

        $this->usuario->insert([
            'login'             => $data['email'],
            'senha'             => substr(md5(date('r')), 0, 10), /*essa é a forma correta para todo e qualquer usuário. Gerar uma senha qualquer e depois ele muda. */
            'id_grupo_acesso'   => 4,
            'id_pessoa'         => $id_pessoa,
            'empresa_id_empresa'=> $this->session->userdata('user_id_empresa')
        ]);

        $this->endereco->insert([
            'cep'           => $this->input->post('cep'),
            'bairro'        => $this->input->post('bairro'),
            'logradouro'    => $this->input->post('logradouro'),
            'numero'        => $this->input->post('numero'),
            'complemento'   => $this->input->post('complemento'),
            'id_pessoa'     => $id_pessoa,
            'estado'        => $this->input->post('estado'),
            'cidade'        => $this->input->post('cidade')]);

        $this->documento->insert([
            'tipo'      => 'cpf',
            'numero'    => $this->input->post('cpf'),
            'id_pessoa' => $id_pessoa]);

        $this->telefone->insert([
            'numero'=>$this->input->post('tel'),
            'id_pessoa' => $id_pessoa]);

        $id_pessoa_fisica = $this->pessoa_fisica->insert([
            'data_nascimento'=> switchDate($data['data_nacimento']),
            'sexo'=>$data['sexo'],
            'id_pessoa'=>$id_pessoa]);

        $this->cliente->insert(['id_pessoa' => $id_pessoa]);

        $this->session->set_flashdata('success', 'Cliente cadastrado com sucesso!');

        redirect('cliente');
    }

    $data['title'] = 'Cadastrar cliente';
    $data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );
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

        $this->pessoa->update(
              [
                'id_pessoa' => $cliente[0]->id_pessoa,
                'nome'      => $data['cliente']['nome'],
                'email'     =>$data['cliente']['email']
              ]
            );

        $this->endereco->update(
          [
            'cep'         => $this->input->post('cep'),
            'bairro'      => $this->input->post('bairro'),
            'logradouro'  => $this->input->post('logradouro'),
            'numero'      => $this->input->post('numero'),
            'complemento' => $this->input->post('complemento'),
            'id_pessoa'   => $cliente[0]->id_pessoa,
            'estado'        => $this->input->post('estado'),
            'cidade'        => $this->input->post('cidade')
          ]
        );


        $this->documento->update(
          [
            'tipo'      => 'cpf',
            'numero'    => $this->input->post('cpf') ,
            'id_pessoa' => $cliente[0]->id_pessoa
          ]
        );

        $this->telefone->update(
          [
            'numero'    =>  $this->input->post('tel'),
            'id_pessoa' =>  $cliente[0]->id_pessoa
          ]
        );

        $this->pessoa_fisica->update($cliente[0]->id_pessoa,
          [
            'data_nascimento' =>  switchDate($data['cliente']['data_nascimento']),
            'sexo'            =>  $data['cliente']['sexo']
          ]
        );

        $this->session->set_flashdata('success', 'Cliente atualizado com sucesso!');

        redirect('cliente');
    }

    $data['cliente'] = $this->cliente->getById($id_cliente);
    $data['title']   = 'Editar cliente';
    $data['id']      = $id_cliente;
	$data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );

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
    $cliente = $this->cliente->getById($id_cliente);
    if ($cliente){
      $this->cliente->delete($id_cliente);
      $this->session->set_flashdata('success', 'Cliente excluído com sucesso!');
    }else {
         $this->session->set_flashdata('danger', 'Não foi possível excluir!');
      }
      redirect('cliente');
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
