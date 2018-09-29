<?php

/**
* author: Rodrigo
* Controller de pedido_almoxarifado
**/

class PedidoAlmoxarifado extends PR_Controller
{
  /**
   * @author Rodrigo
   *
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct()
  {
    parent::__construct('pedido_almoxarifado');
  }

  /**
   * @author Rodrigo
   *
   * Metodo index que chama a view inicial de pedido_almoxarifado
  */
  public function index()
  {
    $this->setTitle('pedido_almoxarifados');

    $this->addData('pedido_almoxarifados',$this->pedido_almoxarifado->get());

    $this->loadIndexDefaultScripts();

    $this->loadView('index');

  }


  /**
   * @author Rodrigo
   *
   * Metodo create, apresenta o formulario de cadastro, recebe os dados
   * e envia para função insert de pedido_almoxarifado_model
   *
   * Se cadastrar com sucesso, redireciona para pagina index de pedido_almoxarifado
   * Se não, mostra msg de erro e redireciona para a mesma pagina
   *
   */
  public function create()
  {
    if($this->input->post())
    {

        if($this->form_validation->run('pedido_almoxarifado'))
        {
            $this->pedido_almoxarifado->insert([
                'id_almoxarifado'  => $this->input->post('id_almoxarifado'),
                'quantidade'       => $this->input->post('quantidade'),
                'id_setor'         => $this->input->post('id_setor'),
                'id_pessoa'        => $this->input->post('id_pessoa'),
                'data_solicitacao' => switchDate($this->input->post('data_solicitacao')),
                'data_entrega'     => $this->input->post('data_entrega');
                'status'           => $this->input->post('status')]);

            $this->redirectSuccess('Solicitação Cadastrada Com Sucesso!');
           
        }
        else{
            $this->redirectError('cadastrar');
        }
    }else{
        $this->setTitle('Cadastrar Solicitação Almoxarifado');

        $this->loadFormDefaultScripts();

        $this->loadView('cadastrar');
    }

  }


  /**
   * @author Rodrigo
   *
   * Metodo edit, apresenta o formulario de edição, com os dados do pedido_almoxarifado a ser editado,
   * recebe os dados e envia para função update de pedido_almoxarifado_model
   *
   * Se cadastrar com sucesso, redireciona para pagina index de pedido_almoxarifado
   * Se não, mostra msg de erro e redireciona para a mesma pagina
   *
   * @param int $id_pedido_almoxarifado
   */
  public function edit($id_pedido_almoxarifado) {
    if ($this->input->post()) {
      if($this->form_validation->run('pedido_almoxarifado')) {
         
         $this->pedido_almoxarifado->insert([
             'id_almoxarifado'  => $this->input->post('id_almoxarifado'),
             'quantidade'       => $this->input->post('quantidade'),
             'id_setor'         => $this->input->post('id_setor'),
             'id_pessoa'        => $this->input->post('id_pessoa'),
             'data_solicitacao' => switchDate($this->input->post('data_solicitacao')),
             'data_entrega'     => $this->input->post('data_entrega');
             'status'           => $this->input->post('status')]);

         $this->redirectSuccess('Solicitação Cadastrada Com Sucesso!');

      }
    }
    $data['unidades'] = $this->unidadeMedida->get();

    $data['pedido_almoxarifado']    = $this->pedido_almoxarifado->getById($id_pedido_almoxarifado);
    $data['pedido_almoxarifado'][0]->recebimento = switchDate($data['pedido_almoxarifado'][0]->recebimento);

    $data['title']           = 'Editar pedido_almoxarifado';
    $data['id']              = $id_pedido_almoxarifado;


    loadTemplate('includes/header', 'pedido_almoxarifado/editar', 'includes/footer', $data);
  }

  /**
   * @author Rodrigo
   *
   * Metodo delete, chama a funçao delete de pedido_almoxarifado_model, passando o id do pedido_almoxarifado
   * Redireciona para a pagina index de pedido_almoxarifado
   *
   * @param int $id_pedido_almoxarifado
   */
  public function delete($id_pedido_almoxarifado)
  {
    $data['pedido_almoxarifado'] = $this->pedido_almoxarifado->getById($id_pedido_almoxarifado);

    if ($data) {
      $this->pedido_almoxarifado->remove($id_pedido_almoxarifado);
      $this->session->set_flashdata('success', 'Item Excluído Com Sucesso!');
      redirect('pedido_almoxarifado');
    }
  }
}
