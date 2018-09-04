<?php

/**
* author: Camila Sales
* Controller de almoxarifado
**/

class Almoxarifado extends PR_Controller
{
  /**
   * @author Pedro Henrique Guimarães
   *
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct('almoxarifado');
  }

  /**
   * @author Camila Sales
   *
   * Metodo index que chama a view inicial de almoxarifado
  */
  public function index()
  {
    $this->setTitle('Almoxarifados');

    $this->addData('almoxarifados',$this->almoxarifado->get());

    $this->loadIndexDefaultScripts();

    $this->loadView('index');

  }


  /**
   * @author Camila Sales
   *
   * Metodo create, apresenta o formulario de cadastro, recebe os dados
   * e envia para função insert de almoxarifado_model
   *
   * Se cadastrar com sucesso, redireciona para pagina index de almoxarifado
   * Se não, mostra msg de erro e redireciona para a mesma pagina
   *
   */
  public function create()
  {
    if($this->input->post())
    {

        if($this->form_validation->run('almoxarifado'))
        {
            $this->almoxarifado->insert($this->getFromPost());

            $this->redirectSuccess('Funcionário Cadastrado Com Sucesso!');
        }
        else
        {
            $this->redirectError('cadastrar');
        }
    }
    else
    {
        $this->setTitle('Cadastrar Almoxarifado');
        $this->addData('cargos', $this->cargo->get());

        $this->addScripts(array('lib/jquery/jquery.maskMoney.min.js', 'thirdy_party/apicep.js'));
        $this->loadFormDefaultScripts();

        $this->loadView('cadastrar');
    }

  }


  /**
   * @author Camila Sales
   *
   * Metodo edit, apresenta o formulario de edição, com os dados do almoxarifado a ser editado,
   * recebe os dados e envia para função update de almoxarifado_model
   *
   * Se cadastrar com sucesso, redireciona para pagina index de almoxarifado
   * Se não, mostra msg de erro e redireciona para a mesma pagina
   *
   * @param int $id_almoxarifado
   */
  public function edit($id_almoxarifado)
  {
    if ($this->input->post()) {
        $data['almoxarifado'] = $this->input->post();
        $this->almoxarifado->update($id_almoxarifado, $this->input->post());
    }

    $data['almoxarifado']    = $this->almoxarifado->getById($id_almoxarifado);
    $data['title']          = 'Editar almoxarifado';
    $data['id']             = $id_almoxarifado;

    $data['assets'] = array(
        'js' => array(
          'thirdy_party/apicep.js',
        ),
    );

    loadTemplate('includes/header', 'almoxarifado/editar', 'includes/footer', $data);
  }

  /**
   * @author Camila Sales
   *
   * Metodo delete, chama a funçao delete de almoxarifado_model, passando o id do almoxarifado
   * Redireciona para a pagina index de almoxarifado
   *
   * @param int $id_almoxarifado
   */
  public function delete($id_almoxarifado)
  {
    $data['almoxarifado'] = $this->almoxarifado->getById($id_almoxarifado);

    if ($data) {
      $this->almoxarifado->remove($id_almoxarifado);
      $this->session->set_flashdata('success', 'Funcionário Excluído Com Sucesso!');
      redirect('almoxarifado');
    }
  }
}
