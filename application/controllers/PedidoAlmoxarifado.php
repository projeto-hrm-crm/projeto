<?php

/**
* author: Rodrigo
* Controller de pedido_almoxarifado
**/

class PedidoAlmoxarifado extends CI_Controller {
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
    $dados['title'] = 'Pedido Almoxarifado';
    $dados['pedidos_almoxarifado'] = $this->pedido_almoxarifado->get();
    $dados['assets'] = array(
     'js' => array(
       'confirm.modal.js'
     ),
   );

    loadTemplate('includes/header', 'pedido_almoxarifado/index', 'includes/footer', $dados);

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
                $this->session->set_flashdata('success','Pedido almoxarifado cadastrado com sucesso!');
                redirect('pedido_almoxarifado');

        }
        else{
            $this->redirectError('cadastrar');
        }
    }else{
      $dados['title'] = 'Cadastrar Solicitação Almoxarifado';
      $dados['unidades'] = $this->unidadeMedida->get();
      $dados['setores'] = $this->setor->get();
      $dados['almoxarifados'] = $this->almoxarifado->get();

      loadTemplate('includes/header', 'pedido_almoxarifado/cadastrar', 'includes/footer', $dados);
    }

  }

   public function changeStatus($id, $status) {
      $user_id = $this->session->userdata('user_login');
      $data['pessoa'] = $this->usuario->getUserNameById($user_id);
      // Pegar informações de cliente
      $id_pessoa = $data['pessoa'][0]->id_pessoa;
      $this->pedido_almoxarifado->updateStatus($id, $status, $id_pessoa);
      if($status==2) {
         $this->session->set_flashdata('success', 'Pedido aceito com sucesso!');
      }
      else {
         $this->session->set_flashdata('danger', 'Pedido rejeitado!');
      }
      redirect('pedido_almoxarifado');
   }

   public function information ($id) {

    $dados['title'] = 'Informação da Solicitação';

    $pedido = $this->pedido_almoxarifado->find($id);

    $dados['pedido'] = $pedido;
    $pessoa1 = $this->pessoa->getById($pedido[0]->id_requerente);
    $dados['requerente'] = $pessoa1;

    $pessoa2 = $this->pessoa->getById($pedido[0]->id_requerido);

    $dados['requerido'] = $pessoa2;

    loadTemplate('includes/header', 'pedido_almoxarifado/info', 'includes/footer', $dados);

  }

}
