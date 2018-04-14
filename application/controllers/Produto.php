<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Produto_controller tera controle sobre as rotas em:
 * http://localhost/projeto/produto
 */

class Produto extends CI_Controller
{
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
      loadTemplate('includes/header', 'produto/index', 'includes/footer', $dados);
    }

    /**
      * @author: Dhiego Balthazar
      * Esse metodo abre a view produto/cadastrar
      *
      */
    public function create()
    {
      $dados['title'] = 'Cadastrar produto';
      loadTemplate('includes/header', 'produto/cadastrar', 'includes/footer', $dados);
    }

    /**
      * @author: Dhiego Balthazar
      * Esse metodo abre a view produto/editar
      *
      */
    public function edit($id)
    {
      $data['title'] = 'Alterar Produto';
      $data['produto'] = $this->produto->getById($id);
      loadTemplate('includes/header', 'produto/editar', 'includes/footer', $data);
    }

    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de cadastrar um produto
     * Se der certo ele redireciona para a lista de produtos
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/produto/salvar
     */

    public function save()
    {

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
        redirect('produto/index');
      }else{
        $errors = validation_errors();
        $this->session->set_flashdata('danger', $errors);
        $this->session->set_flashdata('old_data', $this->input->post());
        redirect('produto/create');
      }
    }


     /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de cadastrar um produto
     * Se der certo ele redireciona para a lista de produtos
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/produto/alterar
     */
     public function update($id){
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
        redirect('produto/index');
      }else{
        $errors = validation_errors();
        $this->session->set_flashdata('danger', $errors);
        redirect('produto/editar/'.$id);
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
      redirect('produto/index');
    }
}
