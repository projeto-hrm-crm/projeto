<?php

/**
* author: Rodrigo
* Controller de pedido_almoxarifado
**/

class PedidoAlmoxarifado extends PR_Controller {
  /**
   * @author Rodrigo
   *
   * Com a configuração do menu esse controller serve como base para todos os outros controllers
   * onde todos devem seguir essa mesma estrutura mínima no consrutor.
   */
  public function __construct() {
    parent::__construct('pedido_almoxarifado');
  }

  /**
   * @author Rodrigo
   *
   * Metodo index que chama a view inicial de pedido_almoxarifado
  */
  public function index() {
     
    $this->setTitle('Solicitações Almoxarifado');

    $this->addData('pedidos_almoxarifado', $this->pedido_almoxarifado->get());

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
           
            $user_id = $this->session->userdata('user_login');
            $data['pessoa'] = $this->usuario->getUserNameById($user_id);
            // Pegar informações de cliente
            $id_pessoa = $data['pessoa'][0]->id_pessoa;
           
            $this->pedido_almoxarifado->insert([
                'id_almoxarifado'   => $this->input->post('id_almoxarifado'),
                'quantidade'        => $this->input->post('quantidade'),
                'id_setor'          => $this->input->post('id_setor'),
                'id_unidade_medida' => $this->input->post('id_unidade_medida'),
                'id_requerente'     => $id_pessoa,
                'status'            => 0]);
            $this->redirectSuccess('Solicitação Cadastrada Com Sucesso!');
           
        }
        else{
            $this->redirectError('cadastrar');
        }
    }else{
        $this->setTitle('Cadastrar Solicitação Almoxarifado');
        $this->addData('unidades', $this->unidadeMedida->get());
        $this->addData('setores', $this->setor->get());
        $this->addData('almoxarifados', $this->almoxarifado->get());
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
            'data_entrega'     => $this->input->post('data_entrega'),
            'status'           => $this->input->post('status')
         ]);
         
         $this->redirectSuccess('Solicitação Cadastrada Com Sucesso!');
         
      }
    }
     
    $this->addData('unidades', $this->unidadeMedida->get());

    $data['title']           = 'Editar Pedido Almoxarifado';
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
  public function delete($id_pedido_almoxarifado) {
    
      $this->pedido_almoxarifado->remove($id_pedido_almoxarifado);
      $this->session->set_flashdata('success', 'Item Excluído Com Sucesso!');
      redirect('pedido_almoxarifado');
    
  }
}
