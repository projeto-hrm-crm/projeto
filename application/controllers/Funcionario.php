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

    $this->addData('funcionarios',$this->funcionario->get())
    
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
            $this->cargo->insert($this->getFromPost());
            
            $this->redirectSuccess('Funcionario cadastrado com sucesso');
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
        $this->addData('estados', $this->estado->get());
        
        $this->addScripts(array('lib/jquery/jquery.maskMoney.min.js'));
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
