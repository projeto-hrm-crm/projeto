<?php

/**
* author: Mayra Bueno
* Controller de funcionario
**/

class Funcionario extends CI_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   *
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
   *
   * Metodo index que chama a view inicial de funcionario
  */
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

    if (!is_null($data['funcionarios'])) {
        foreach ($data['funcionarios'] as $key => $funcionario) {
          $data['funcionarios'][$key]->data_nascimento = switchDate($data['funcionarios'][$key]->data_nascimento);
        }
    }

    loadTemplate('includes/header', 'funcionario/index', 'includes/footer', $data);

  }


  /**
   * @author Mayra Bueno
   *
   * Metodo create, apresenta o formulario de cadastro, recebe os dados
   * e envia para função insert de funcionario_model
   *
   * Se cadastrar com sucesso, redireciona para pagina index de funcionario
   * Se não, mostra msg de erro e redireciona para a mesma pagina
   *
   */
  public function create()
  {
    if($this->input->post()){
        $this->funcionario->insert($this->input->post());
        redirect('funcionario');
    }

    $data['paises'] = $this->pais->get();
    $data['estados'] =  $this->estado->get();
    $data['title'] = 'Cadastrar funcionario';
    $data['cargos'] = $this->cargo->get();

    loadTemplate('includes/header', 'funcionario/cadastrar', 'includes/footer', $data);
  }


  /**
   * @author Mayra Bueno
   * @author Camila Sales
   *
   * Metodo edit, apresenta o formulario de edição, com os dados do funcionario a ser editado,
   * recebe os dados e envia para função update de funcionario_model
   *
   * Se cadastrar com sucesso, redireciona para pagina index de funcionario
   * Se não, mostra msg de erro e redireciona para a mesma pagina
   *
   * @param int $id_funcionario
   */
  public function edit($id_funcionario)
  {
    if ($this->input->post()) {
        $data['funcionario'] = $this->input->post();

        echo "<pre>";

        $this->funcionario->update($id_funcionario, $this->input->post());
    }

    $data['funcionario']    = $this->funcionario->getById($id_funcionario);
    $data['estados']        = $this->estado->get();
    $data['cidades']        = $this->cidade->getByState($data['funcionario'][0]->id_estado);
    $data['title']          = 'Editar funcionario';
    $data['id']             = $id_funcionario;
    $data['cargos']         = $this->cargo->get();



    loadTemplate('includes/header', 'funcionario/editar', 'includes/footer', $data);
  }

  /**
   * @author Mayra Bueno
   *
   * Metodo delete, chama a funçao delete de funcionario_model, passando o id do funcionario
   * Redireciona para a pagina index de funcionario
   *
   * @param int $id_funcionario
   */
  public function delete($id_funcionario)
  {
    $data['funcionario'] = $this->funcionario->getById($id_funcionario);

    if ($data) {
      $this->funcionario->remove($id_funcionario);
      $this->session->set_flashdata('success', 'funcionario excluido com sucesso');
      redirect('funcionario');
    }
  }
}
