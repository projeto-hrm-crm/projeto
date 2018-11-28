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
    $data['title'] = 'Funcionarios';
    $data['funcionarios'] = $this->funcionario->get();
    $data['assets'] = array(
        'js' => array(
          'validate.js',
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js',
        ),
    );

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
    if($this->input->post())
    {
        if($this->form_validation->run('funcionario')){
            $id_funcionario = $this->funcionario->insert($this->getFromPost());
            $this->cargo_funcionario->insert(['id_funcionario'=>$id_funcionario, 'id_cargo'=>$this->input->post('id_cargo'),'status'=>1]);
            $this->session->set_flashdata('success', 'Funcionário cadastrado com sucesso!');
            redirect('funcionario');

        }else{
          $this->session->set_flashdata('danger', 'Não foi possível realizar o cadastro!');
          redirect('cadastrar');
        }
    }else{

      $data['title'] = 'Cadastrar funcionarios';
      $data['cargos'] = $this->cargo->get();
      $data['funcionarios'] = $this->funcionario->get();
      $data['assets'] = array(
          'js' => array(
            'validate.js',
            'confirm.modal.js',
            'thirdy_party/apicep.js',
          ),
      );

      loadTemplate('includes/header', 'funcionario/cadastrar', 'includes/footer', $data);
    }

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
        $funcionario = $this->funcionario->getById($id_funcionario);

        if($this->input->post('id_cargo') != $funcionario[0]->id_cargo){
            $antigo = $this->cargo_funcionario->get($id_funcionario,$funcionario[0]->id_cargo);
            $antigo[0]->deletado = date("Y-m-d H:i:s");
            $this->cargo_funcionario->atualizar($antigo[0]->id_cargo_funcionario, $antigo[0]);
            $novo = $this->cargo_funcionario->get($id_funcionario,$this->input->post('id_cargo'));
            if(isset($novo[0])){
                $novo[0]->status = 1;
                $this->cargo_funcionario->atualizar($novo[0]->id_cargo_funcionario, $novo[0]);
            }else{
                $this->cargo_funcionario->insert(['id_funcionario'=>$id_funcionario, 'id_cargo'=>$this->input->post('id_cargo')]);
            }
        }
        $this->funcionario->update($id_funcionario, $this->input->post());

    }
    $data['title']          = 'Editar funcionario';
    $data['funcionarios']   = $this->funcionario->get();
    $data['funcionario']    = $this->funcionario->getById($id_funcionario);
    $data['cargos']         = $this->cargo->get();
    $data['id']             = $id_funcionario;

    $data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );
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
      $this->session->set_flashdata('success', 'Funcionário Excluído Com Sucesso!');
      redirect('funcionario');
    }
  }

 /**
    * @author: Lucilene Fidelis

    */
   private function getFromPost()
    {
        return array(
            'nome'            => $this->input->post('nome'),
            'email'           => $this->input->post('email'),
            'senha'           => $this->input->post('senha'),
            'senha2'          => $this->input->post('senha2'),
            'data_nacimento'  => $this->input->post('data_nacimento'),
            'sexo'            => $this->input->post('sexo'),
            'cpf'             => $this->input->post('cpf'),
            'tel'             => $this->input->post('tel'),
            'cep'             => $this->input->post('cep'),
            'estado'          => $this->input->post('estado'),
            'cidade'          => $this->input->post('cidade'),
            'bairro'          => $this->input->post('bairro'),
            'logradouro'      => $this->input->post('logradouro'),
            'numero'          => $this->input->post('numero'),
            'complemento'     => $this->input->post('complemento'),

        );
    }

    /**
    * @author: Lucilene Fidelis
    * Retorna um array com dados pegos por post adicionado a eles o id_cargo
    *
    * @return: mixed
    */
    private function getFromPostEdit($id_funcionario)
    {
        $postData = $this->getFromPost();

        $postData['id_funcionario'] = $id_funcionario;
        return $postData;
    }

   /**
     * @author Mayra Bueno
     *
     * Método evaluate refere-se à avaliação do funcionário.
     *
     * Se avaliado com sucesso, apresenta mensagem de sucesso.
     * Se não, mostra mensagem de erro e redireciona para a mesma pagina.
     *
     * @param int $id_funcionario
     */
    public function evaluate($id_funcionario) {

        //Pega o id de usuario da sessão
        $user_id = $this->session->userdata('user_login');

        if ($this->input->post()) {
            $array = array(
                'pontualidade' => $this->input->post('pontualidade'),
                'comprometimento' => $this->input->post('comprometimento'),
                'produtividade' => $this->input->post('produtividade'),
                'relacao_interpessoal' => $this->input->post('relacao_interpessoal'),
                'proatividade' => $this->input->post('proatividade'),
                'id_funcionario' => $id_funcionario,
                'id_avaliador' => $user_id,
                'observacao' => $this->input->post('observacao')

            );

            $this->avaliacao->insert($array);

            $this->session->set_flashdata('success', 'Avaliação cadastrada');
            redirect('funcionario/avaliacoes/'.$id_funcionario);
        }
        //Pega o tipo de usuario e informações de pessoas
        $typeUser = $this->usuario->getUserAccessGroup($user_id);

        $data['title'] = 'Avaliar funcionário';
        $data['funcionario'] = $this->funcionario->getById($id_funcionario);
        $data['avaliador'] = $this->usuario->getUserNameById($user_id);
        $data['funcionario'] = $this->funcionario->getById($id_funcionario);
        $data['id_funcionario'] = $id_funcionario;
        $data['assets'] = array(
            'js' => array(
              'validate.js',
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
              'confirm.modal.js',
            ),
        );

        loadTemplate('includes/header', 'funcionario/avaliar', 'includes/footer', $data);
    }

    public function assessments($id_funcionario) {
        $data['title'] = 'Avaliação de Funcionários';
        $data['avaliacoes'] = $this->avaliacao->get($id_funcionario);
        $data['funcionario'] = $this->funcionario->getById($id_funcionario);
        $data['id_funcionario'] = $id_funcionario;
        $data['assets'] = array(
            'js' => array(
              'validate.js',
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
              'confirm.modal.js',
            ),
        );

        loadTemplate('includes/header', 'funcionario/avaliacoes', 'includes/footer', $data);
    }

    public function evaluate_info($id_avaliacao) {

        //Pega o id de usuario da sessão
        $user_id = $this->session->userdata('user_login');
        //Pega o tipo de usuario e informações de pessoas
        $typeUser = $this->usuario->getUserAccessGroup($user_id);
        $data = $this->avaliacao->find($id_avaliacao);
        $data['avaliador'] = $this->usuario->getUserNameById($user_id);
        $id_funcionario = $data[0]->id_funcionario;

        $data['title'] = 'Informações Avaliação';
        $data['funcionario'] = $this->funcionario->getById($id_funcionario);
        $data['avaliacao'] = $this->avaliacao->find($id_avaliacao);

        $data['id_funcionario'] = $id_funcionario;
        $data['assets'] = array(
            'js' => array(
              'validate.js',
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
              'confirm.modal.js',
            ),
        );
        loadTemplate('includes/header', 'funcionario/avaliacao-info', 'includes/footer', $data);
    }

   public function evaluate_edit($id_avaliacao) {

        //Pega o id de usuario da sessão
        $user_id = $this->session->userdata('user_login');

        $data = $this->avaliacao->find($id_avaliacao);
        $id_funcionario = $data[0]->id_funcionario;

        if ($this->input->post()) {
            $array = array(
                'pontualidade' => $this->input->post('pontualidade'),
                'comprometimento' => $this->input->post('comprometimento'),
                'produtividade' => $this->input->post('produtividade'),
                'relacao_interpessoal' => $this->input->post('relacao_interpessoal'),
                'proatividade' => $this->input->post('proatividade'),
                'id_avaliacao' => $id_avaliacao,
                'id_avaliador' => $user_id,
                'observacao' => $this->input->post('observacao')
            );

            $this->avaliacao->update($array);

            $this->session->set_flashdata('success', 'Avaliação editada');
            redirect('funcionario/avaliacoes/'.$id_funcionario);
        }

        //Pega o tipo de usuario e informações de pessoas
        $typeUser = $this->usuario->getUserAccessGroup($user_id);
        $data['avaliador'] = $this->usuario->getUserNameById($user_id);
        $data['title'] = 'Informações Avaliação';
        $data['funcionario'] = $this->funcionario->getById($id_funcionario);
        $data['avaliacao'] = $this->avaliacao->find($id_avaliacao);
        $data['id_funcionario'] = $id_funcionario;
        $data['id_avaliacao'] = $id_avaliacao;
        $data['assets'] = array(
            'js' => array(
              'validate.js',
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
              'confirm.modal.js',
            ),
        );
        loadTemplate('includes/header', 'funcionario/avaliacao-editar', 'includes/footer', $data);

    }

    /**
     * @author Camila Sales
     *
     * Responsavel por redirecionar para a view de visualização de todos os cargos do funcionario
    */
    public function cargos($id_funcionario)
    {
      $this->setTitle('Histórico dos Cargos');

      $this->addData('cargos',$this->funcionario->getCargos($id_funcionario));

      $this->loadIndexDefaultScripts();

      $this->loadView('historico');

    }
}
