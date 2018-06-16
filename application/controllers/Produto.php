<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Produto_controller tera controle sobre as rotas em:
 * http://localhost/projeto/produto
 */

class Produto extends CI_Controller
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
    }
    /**
      *@author: Dhiego Balthazar
      * Esse método tem a finalidade de retornar uma lista com todos os produtos
      * cadastrados
      *
      * @return array - carrega lista produtos para view
      */
    // Rota: http://localhost/projeto/produto
    public function index()
    {
      $dados['title'] = 'Produtos';
      $dados['produtos'] = $this->produto->get();
      $dados['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'maskMoney.js',
          'confirm.modal.js',
        ),
      );

      $produtos = $dados['produtos'];
      foreach($produtos as $produto){
          $produto->fabricacao = switchDate($produto->fabricacao);
          $produto->validade = switchDate($produto->validade);
          $produto->recebimento = switchDate($produto->recebimento);

      }
      loadTemplate('includes/header', 'produto/index', 'includes/footer', $dados);
    }


    /**
     * @author: Dhiego Balthazar
     * Se não houver post ele carrega a pagina cadastrar
     * Esse método tem a finalidade de cadastrar um produto
     * Se der certo ele redireciona para a lista de produtos
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/produto/cadastrar
     */
    public function create()
    {
      if($this->input->post()){
        if($this->form_validation->run('produto')){
          $array = array(
           'id_fornecedor' => $this->input->post('id_fornecedor'),
           'nome'          => $this->input->post('nome'),
           'codigo'        => $this->input->post('codigo'),
           'fabricacao'    => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
           'validade'      => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
           'recebimento'   => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
           'lote'          => $this->input->post('lote'),
           'valor'         => $this->input->post('valor'),
          );
            $this->produto->insert($array);
            $this->session->set_flashdata('success','Produto Cadastrado Com Sucesso!');
            redirect('produto');
        }else{
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('old_data', $this->input->post());
            redirect('produto/cadastrar');
        }
      }else{
        $dados['title'] = 'Cadastrar produto';
        $dados['errors'] = $this->session->flashdata('errors');
        $dados['old_data'] = $this->session->flashdata('old_data');
        $dados['fornecedores'] = $this->fornecedor->getRazaoSocial();
        $dados['assets'] = array(
         'js' => array(
           'lib/jquery/jquery.maskMoney.min.js',
           'validate.js',
           'maskMoney.js',
         ),
       );
        loadTemplate('includes/header', 'produto/cadastrar', 'includes/footer', $dados);
      }
    }

    /**
     * @author: Dhiego Balthazar
     * Se não houver post ele carrega a pagina editar
     * Esse método tem a finalidade de cadastrar um produto
     * Se der certo ele redireciona para a lista de produtos
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/produto/editar
     */
    public function edit($id)
    {
      if($this->input->post()){
        if($this->form_validation->run('produto')){
          $array = array(
           'id_produto'    => $id,
           'id_fornecedor' => $this->input->post('id_fornecedor'),
           'nome'          => $this->input->post('nome'),
           'codigo'        => $this->input->post('codigo'),
           'fabricacao'    => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
           'validade'      => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
           'lote'          => $this->input->post('lote'),
           'recebimento'   => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
           'valor'         => $this->input->post('valor'),
         );
          $this->produto->update($array);
          $this->session->set_flashdata('success','Produto Atualizado Com Sucesso!');
          redirect('produto');
        }else{
          $this->session->set_flashdata('errors', $this->form_validation->error_array());
          $this->session->set_flashdata('old_data', $this->input->post());
          redirect('produto/editar/'.$id);
        }
      }else{
        $data['errors'] = $this->session->flashdata('errors');
        $data['title'] = 'Alterar Produto';
        $data['old_data'] = $this->session->flashdata('old_data');
        $data['produto'] = $this->produto->getById($id);
        $data['produto']->fabricacao = switchDate($data['produto']->fabricacao);
        $data['produto']->validade = switchDate($data['produto']->validade);
        $data['produto']->recebimento = switchDate($data['produto']->recebimento);
        $data['fornecedores'] = $this->fornecedor->getRazaoSocial();
        $data['assets'] = array(
         'js' => array(
           'lib/jquery/jquery.maskMoney.min.js',
           'validate.js',
           'maskMoney.js',
         ),
       );
        loadTemplate('includes/header', 'produto/editar', 'includes/footer', $data);
      }
    }

    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de deletar
     * Se der certo ele lança um succes na lista de produtos
     * Se der errado ele lança um danger na lista de produtos
     * @param: $id
     * Rota: http://localhost/projeto/produto/deletar
     */
    public function delete($id){
      $produto = $this->produto->getById($id);
      if($produto){
        $this->produto->delete($id);
        $this->session->set_flashdata('success', 'Produto Excluído Com Sucesso!');
      }else{
        $this->session->set_flashdata('danger', 'Impossível Excluir!');
      }
      redirect('produto');
    }
}
