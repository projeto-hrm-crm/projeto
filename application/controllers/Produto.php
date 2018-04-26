<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Produto_controller tera controle sobre as rotas em:
 * http://localhost/projeto/produto
 */

class Produto extends CI_Controller
{
    public $menus;

    /**
     * @author Pedro Henrique Guimarães
     * Com a configuração do menu esse controller serve como base para todos os outros controllers
     * onde todos devem seguir essa mesma estrutura mínima no consrutor.
     */
    public function __construct()
    {
      parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $url = isset($_SERVER['PATH_INFO']) ? ltrim($_SERVER['PATH_INFO'], '/') : '';
      $this->usuario->hasPermission($user_id, $url);
      $this->menus = $this->menu->getUserMenu($user_id);
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
      $dados['menus'] = $this->menus;
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
      $dados['menus'] = $this->menus;
      if($this->input->post()){
        if($this->form_validation->run('produto')){
          $array = array(
           'nome' => $this->input->post('nome'),
           'codigo' => $this->input->post('codigo'),
           'fabricacao' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
           'validade' => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
           'lote' => $this->input->post('lote'),
           'recebimento' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
          );
            $this->produto->insert($array);
            $this->session->set_flashdata('success','Cadastrado com sucesso');
            redirect('produto');
        }else{
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('old_data', $this->input->post());
            redirect('cadastrar/produto');
        }
      }else{
        $dados['title'] = 'Cadastrar produto';
        $dados['errors'] = $this->session->flashdata('errors');
        $dados['old_data'] = $this->session->flashdata('old_data');
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
      $dados['menus'] = $this->menus;
      if($this->input->post()){
        if($this->form_validation->run('produto')){
          $array = array(
           'id_produto' => $id,
           'nome' => $this->input->post('nome'),
           'codigo' => $this->input->post('codigo'),
           'fabricacao' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
           'validade' => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
           'lote' => $this->input->post('lote'),
           'recebimento' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
         );
          $this->produto->update($array);
          $this->session->set_flashdata('success','Alterado com sucesso.');
          redirect('produto');
        }else{
          $this->session->set_flashdata('errors', $this->form_validation->error_array());
          $this->session->set_flashdata('old_data', $this->input->post());
          redirect('editar/produto/'.$id);
        }
      }else{
        $data['errors'] = $this->session->flashdata('errors');
        $data['title'] = 'Alterar Produto';
        $data['old_data'] = $this->session->flashdata('old_data');
        $data['produto'] = $this->produto->getById($id);
        $data['produto']->fabricacao = switchDate($data['produto']->fabricacao);
        $data['produto']->validade = switchDate($data['produto']->validade);
        $data['produto']->recebimento = switchDate($data['produto']->recebimento);
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
        $this->session->set_flashdata('success', 'Produto deletado com sucesso.');
      }else{
        $this->session->set_flashdata('danger', 'Impossível Deletar!');
      }
      redirect('produto');
    }
}
