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

        if($this->form_validation->run('funcionario'))
        {
            $this->funcionario->insert($this->getFromPost());

            $this->redirectSuccess('Funcionário Cadastrado Com Sucesso!');
        }
        else
        {
            $this->redirectError('cadastrar');
        }
    }
    else
    {
        $this->setTitle('Cadastrar Funcionario');
        $this->addData('cargos', $this->cargo->get());

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
        $data['funcionario'] = $this->input->post();
        $this->funcionario->update($id_funcionario, $this->input->post());
    }

    $data['funcionario']    = $this->funcionario->getById($id_funcionario);
    $data['title']          = 'Editar funcionario';
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
            'nome'      => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'senha'   => $this->input->post('senha'),
            'senha2'  => $this->input->post('senha2'),
            'data_nacimento'      => $this->input->post('data_nacimento'),
            'sexo' => $this->input->post('sexo'),
            'cpf'   => $this->input->post('cpf'),
            'tel'  => $this->input->post('tel'),
            'cep'  => $this->input->post('cep'),
            'estado' => $this->input->post('estado'),
            'cidade' => $this->input->post('cidade'),
            'bairro' => $this->input->post('bairro'),
            'logradouro' => $this->input->post('logradouro'),
            'numero' => $this->input->post('numero'),
            'complemento' => $this->input->post('complemento'),

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
    public function evaluate($id_funcionario)
    {
      if ($this->input->post()) {
          $data['funcionario'] = $this->input->post();

          echo "<pre>";

          $this->funcionario->update($id_funcionario, $this->input->post());
      }

      $data['funcionario']    = $this->funcionario->getById($id_funcionario);
      $data['title']          = 'Avaliar funcionario';
      $data['id']             = $id_funcionario;

      loadTemplate('includes/header', 'funcionario/avaliar', 'includes/footer', $data);
    }
}
