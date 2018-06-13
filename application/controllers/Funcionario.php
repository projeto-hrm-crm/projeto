<?php

/**
* author: Mayra Bueno
* Controller de funcionario
**/

class Funcionario extends CI_Controller
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

  /**
  * @author Mayra Bueno
  * Metodo index que chama a view inicial de funcionario
  **/
  public function index()
  {
    $data['title'] = 'funcionarios';
    $data['funcionarios'] = $this->funcionario->get();
    $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );

    foreach ($data['funcionarios'] as $key => $funcionario) {
      $data['funcionarios'][$key]->data_nascimento = switchDate($data['funcionarios'][$key]->data_nascimento);
    }

    loadTemplate('includes/header', 'funcionario/index', 'includes/footer', $data);
  }


  /**
  * @author Mayra Bueno
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de funcionario_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de funcionario
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
    		$id_pessoa_fisica = $this->pessoa_fisica->insert(['data_nascimento'=> switchDate($data['data_nacimento']),'sexo'=>$data['sexo'],'id_pessoa'=>$id_pessoa]);
        $this->funcionario->insert(['id_pessoa' => $id_pessoa]);
        $this->usuario->insert(['login' => $this->input->post("email"), 'senha'=>$this->input->post("senha"),'id_grupo_acesso'=>6,'id_pessoa'=>$id_pessoa]);

        $this->session->set_flashdata('success', 'funcionario cadastrado com sucesso.');
        redirect('funcionario');
    }

    $data['paises'] = $this->funcionario->get_pais();
    $data['estados'] =  $this->estado->get();
    $data['title'] = 'Cadastrar funcionario';
    loadTemplate('includes/header', 'funcionario/cadastrar', 'includes/footer', $data);
  }


  /**
  * @author Mayra Bueno
  * @author Camila Sales
  * Metodo edit, apresenta o formulario de edição, com os dados do funcionario a ser editado,
  * recebe os dados e envia para função update de funcionario_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de funcionario
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id_funcionario int
  **/
  public function edit($id_funcionario)
  {
    if ($this->input->post())
    {
      $data['funcionario'] = $this->input->post();
        $funcionario = $this->funcionario->getById($id_funcionario);

        $this->pessoa->update(['id_pessoa' => $funcionario[0]->id_pessoa, 'nome'=> $data['funcionario']['nome'],'email'=>$data['funcionario']['email']]);
        $this->endereco->update(['cep'=> $this->input->post('cep'),'bairro' => $this->input->post('bairro'),
        'logradouro'  => $this->input->post('logradouro'),'numero' => $this->input->post('numero'), 'complemento' => $this->input->post('complemento'),
        'id_pessoa'   => $funcionario[0]->id_pessoa, 'id_cidade' => $this->input->post('cidade')]);

        $this->documento->update(['tipo' => 'cpf','numero' => $this->input->post('cpf') , 'id_pessoa' => $funcionario[0]->id_pessoa]);

        $this->telefone->update(['numero'=>$this->input->post('tel'),'id_pessoa' => $funcionario[0]->id_pessoa]);

        $this->pessoa_fisica->update($funcionario[0]->id_pessoa,['data_nascimento'=> switchDate($data['funcionario']['data_nascimento']),'sexo'=>$data['funcionario']['sexo']]);
        $this->session->set_flashdata('success', 'funcionario editado com sucesso.');
        redirect('funcionario');
    }

    $data['funcionario'] = $this->funcionario->getById($id_funcionario);
    $data['estados'] =  $this->estado->get();
    $data['cidades'] = $this->cidade->getByState($data['funcionario'][0]->id_estado);
    $data['title'] = 'Editar funcionario';
    $data['id'] = $id_funcionario;
    loadTemplate('includes/header', 'funcionario/editar', 'includes/footer', $data);
  }

  /**
  * @author Mayra Bueno
  * Metodo delete, chama a funçao delete de funcionario_model, passando o id do funcionario
  * Redireciona para a pagina index de funcionario
  *
  * @param $id_funcionario int
  **/
  public function delete($id_funcionario)
  {
    $data['funcionario'] = $this->funcionario->getById($id_funcionario);
    if ($data)
    {
      $this->funcionario->remove($id_funcionario);
      $this->session->set_flashdata('success', 'funcionario excluido com sucesso');
      redirect('funcionario');
    }
  }
}
