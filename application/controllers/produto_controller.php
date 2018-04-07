<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*Produto_controller tera controle sobre as rotas em:
 * http://localhost/projeto/produto
 */

class Produto_controller extends CI_Controller
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
        $produtos = $this->produto->get();
        $this->load->view('produto/index', array('produtos'=>$produtos));
    }
    
    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de cadastrar um produto, cujo os dados são recebidos de um formularios da view insert.php
     * 
     * Rota: http://localhost/projeto/produto/cadastrar
     */
    public function cadastrar()
    {
        $this->load->helper('form','url');
        $this->load->library('form_validation');
        
        
        if($this->form_validation->run('produto')){
            $array = array(
                'nome' => $this->input->post('nome'),
                'codigo' => $this->input->post('codigo'),
                'fabricacao' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
                'validate' => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validate')))),
                'lote' => $this->input->post('lote'),
                'recebimento' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
            );
            
            if($this->produto->insert($array)){
                $this->session->set_flashdata('message','Cadastrado com sucesso');
            }else{
                $this->session->set_flashdata('message', 'Não foi possível cadastrar no banco de dados!');
            }
        }else{
            $dados = validation_errors();
            $this->session->set_flashdata('message', $dados);
        }
        redirect('/produto/view/cadastro');
        
    }    
    
     /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de cadastrar um produto, cujo os dados são recebidos de um formularios da view insert.php
     * 
     * Rota: http://localhost/projeto/produto/atualizar
     */
    public function atualizar(){
       $this->load->helper('form','url');
        $this->load->library('form_validation');
        
        
        if($this->form_validation->run('produto')){
            $array = array(
                'nome' => $this->input->post('nome'),
                'codigo' => $this->input->post('codigo'),
                'fabricacao' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
                'validate' => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validate')))),
                'lote' => $this->input->post('lote'),
                'recebimento' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
            );
            
            if($this->produto->update($array)){
                $this->session->set_flashdata('message','Atualizado com sucesso');
            }else{
                $this->session->set_flashdata('message', 'Não foi possível atualizar o banco de dados!');
            }
        }else{
            $dados = validation_errors();
            $this->session->set_flashdata('message', $dados);
        }
        redirect('/produto/view/atualizar');
    }
        
    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de deletar um elemento pelo $id. ID é recebido através de um formulario da view delete.php
     * 
     * Rota: http://localhost/projeto/produto/
     */
    public function deletar(){
            
        $id = $this->input->post('id');
        
        if($this->produto->delete($id)){
            $this->session->set_flashdata('message', 'Cadastro com sucesso!<br>Id: ' . $id);
            
        }else{
            $this->session->set_flashdata('message', 'não foi possível deletar!<br>' . $id);
        }
    
    }
    
    /**
      *@author: Dhiego Balthazar
      * Esse método tem a finalidade de abrir uma view para testar a inserção de elemento
      *
      * 
      * Rota: http://localhost/projeto/produto/view/cadastro
      */
    public function teste_cadastro_produto()
    {
        $this->load->view('produto/insert');
    }
    
    /**
      *@author: Dhiego Balthazar
      * Esse método tem a finalidade de abrir uma view para testar a exclusão de elementos
      *
      * 
      * Rota: http://localhost/projeto/produto/view/deletar
      */
    public function teste_delete_produto(){
        $this->load->view('produto/delete');
    }
}