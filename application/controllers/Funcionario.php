<?php

/**
* author: Mayra Bueno
* Controller de funcionario
**/

class Funcionario extends PR_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   *
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct('funcionario');
  }

  /**
   * @author Mayra Bueno
   *
   * Metodo index que chama a view inicial de funcionario
  */
  public function index()
  {
    $this->setTitle('Funcionarios');

    $this->addData('funcionarios',$this->funcionario->get());

    $this->loadIndexDefaultScripts();

    $this->loadView('index');

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
            $this->cargo_funcionario->insert(['id_funcionario' => $id_funcionario, 'id_cargo' => $this->input->post('id_cargo'), 'id_setor' => $this->input->post('id_setor')]);
            $this->redirectSuccess('Funcionário Cadastrado Com Sucesso!');
        }else{
            $this->redirectError('cadastrar');
        }
    }else{
        $this->setTitle('Cadastrar Funcionario');
        $this->addData('cargos', $this->cargo->get());
        $this->addData('setores', $this->setor->get());

        $this->addScripts(array('lib/jquery/jquery.maskMoney.min.js', 'thirdy_party/apicep.js'));
        $this->loadFormDefaultScripts();

        $this->loadView('cadastrar');
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

        if($this->input->post('id_cargo')!=$funcionario[0]->id_cargo){
            $antigo = $this->cargo_funcionario->get($id_funcionario,$funcionario[0]->id_cargo);
            $this->cargo_funcionario->atualizar($antigo[0]->id_cargo_funcionario, $antigo[0]);

            $novo = $this->cargo_funcionario->get($id_funcionario,$this->input->post('id_cargo'));
            if(isset($novo[0])){
                $this->cargo_funcionario->atualizar($novo[0]->id_cargo_funcionario, $novo[0]);
            }else{
                $this->cargo_funcionario->insert(['id_funcionario'=>$id_funcionario, 'id_cargo'=>$this->input->post('id_cargo')]);
            }
        }
        $this->funcionario->update($id_funcionario, $this->input->post());

    }

    $data['funcionario']    = $this->funcionario->getById($id_funcionario);
    $data['title']          = 'Editar funcionario';
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
                'id_avaliador' => $user_id
            );

            $this->avaliacao->insert($array);

            $this->session->set_flashdata('success', 'Avaliação cadastrada');
            redirect('funcionario/avaliacoes/'.$id_funcionario);
        }



        //Pega o tipo de usuario e informações de pessoas
        $typeUser = $this->usuario->getUserAccessGroup($user_id);
        $data['avaliador'] = $this->usuario->getUserNameById($user_id);

        $this->setTitle('Avaliar Funcionario');
        $this->addData('funcionario', $this->funcionario->getById($id_funcionario));
        $this->addData('avaliador', $this->usuario->getUserNameById($user_id));
        $this->addData('id_funcionario', $id_funcionario);

        $this->loadIndexDefaultScripts();

        $this->loadView('avaliar');

    }

    public function assessments($id_funcionario) {
        $this->setTitle('Avaliação de Funcionarios');

        $this->addData('avaliacoes', $this->avaliacao->get($id_funcionario));
        $this->addData('funcionario', $this->funcionario->getById($id_funcionario));
        $this->addData('id_funcionario', $id_funcionario);

        $this->loadIndexDefaultScripts();

        $this->loadView('avaliacoes');
    }

    public function evaluate_info($id_avaliacao) {

        //Pega o id de usuario da sessão
        $user_id = $this->session->userdata('user_login');
        //Pega o tipo de usuario e informações de pessoas
        $typeUser = $this->usuario->getUserAccessGroup($user_id);
        $data['avaliador'] = $this->usuario->getUserNameById($user_id);


        $data = $this->avaliacao->find($id_avaliacao);
        $id_funcionario = $data[0]->id_funcionario;

        $this->setTitle('Informações Avaliação');
        $this->addData('funcionario', $this->funcionario->getById($id_funcionario));
        $this->addData('avaliador', $this->usuario->getUserNameById($user_id));
        $this->addData('avaliacao', $this->avaliacao->find($id_avaliacao));
        $this->addData('id_funcionario', $id_funcionario);

        $this->loadIndexDefaultScripts();

        $this->loadView('avaliacao-info');

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
                'id_avaliador' => $user_id
            );

            $this->avaliacao->update($array);

            $this->session->set_flashdata('success', 'Avaliação editada');
            redirect('funcionario/avaliacoes/'.$id_funcionario);
        }

        //Pega o tipo de usuario e informações de pessoas
        $typeUser = $this->usuario->getUserAccessGroup($user_id);
        $data['avaliador'] = $this->usuario->getUserNameById($user_id);




        $this->setTitle('Informações Avaliação');
        $this->addData('funcionario', $this->funcionario->getById($id_funcionario));
        $this->addData('avaliador', $this->usuario->getUserNameById($user_id));
        $this->addData('avaliacao', $this->avaliacao->find($id_avaliacao));
        $this->addData('id_funcionario', $id_funcionario);
        $this->addData('id_avaliacao', $id_avaliacao);

        $this->loadIndexDefaultScripts();

        $this->loadView('avaliacao-editar');

    }
}
