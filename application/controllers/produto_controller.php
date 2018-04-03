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
     * Esse método tem a finalidade de cadastrar um produto
     * 
     * @params $dados Mixed - com os dados do produto
     * 
     */
    public function cadastrar()
    {
        

        $this->load->helper('form','url');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome', 'Nome', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('codigo', 'Codigo', 'required|numeric');
        $this->form_validation->set_rules('fabricacao', 'Fabricacao', 'required|exact_length[10]');
        $this->form_validation->set_rules('validate', 'Validate', 'required|exact_length[10]');
        $this->form_validation->set_rules('lote', 'Lote', 'required|numeric');
        $this->form_validation->set_rules('recebimento', 'Recebimento', 'required|exact_length[10]');
        
        if($this->form_validation->run()){
            
            $this->produto->nome = $this->input->post('nome');
            $this->produto->codigo = $this->input->post('codigo');
            $this->produto->fabricacao = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao'))));
            $this->produto->validate = date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validate'))));
            $this->produto->lote = $this->input->post('lote');
            $this->produto->recebimento = date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento'))));
        
            if($this->produto->insert()){
                $this->load->view('produto/success');
            }else{
                $this->load->view('produto/problem');
            }
        }else{
            $dados['msg'] = validation_errors();
            $this->load->view('produto/problem', $dados);
        }
        
    }
    
    public function teste_cadastro_produto()
    {
        $this->load->view('produto/insert');
    }
    
    public function deletar(){
        
    }
}