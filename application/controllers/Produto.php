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
        $produtos = $this->produto->get();
        $this->load->view('produto/index', array('produtos'=>$produtos));
    }
    
    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de cadastrar um produto, cujo os dados são recebidos de um formularios da view insert.php
     * 
     * Rota: http://localhost/projeto/produto/cadastrar
     */

    public function create()
    {      
        
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
        redirect('/produto/cadastrar');
        
    }    
    
     /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de cadastrar um produto, cujo os dados são recebidos de um formularios da view insert.php
     * 
     * Rota: http://localhost/projeto/produto/alterar
     */
    public function update(){        
        
        if($this->form_validation->run('produto')){
            $array = array(
                'nome' => $this->input->post('nome'),
                'codigo' => $this->input->post('codigo'),
                'fabricacao' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fabricacao')))),
                'validade' => date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('validade')))),
                'lote' => $this->input->post('lote'),
                'recebimento' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('recebimento')))),
            );
            
            if($this->produto->update($array)){
                $this->session->set_flashdata('sucsses','Atualizado com sucesso');
            }else{
                $this->session->set_flashdata('danger', 'Não foi possível atualizar o banco de dados!');
            }
        }else{
            $dados = validation_errors();
            $this->session->set_flashdata('danger', $dados);
        }
        redirect('/produto/index');
    }
        
    /**
     * @author: Dhiego Balthazar
     * Esse método tem a finalidade de deletar um elemento pelo $id. ID é recebido através de um formulario da view delete.php
     * 
     * Rota: http://localhost/projeto/produto/deletar
     */
    public function delete($id){
        
        if($this->produto->delete($id)){
            $this->session->set_flashdata('sucsses', 'Cadastro com sucesso!<br>Id: ' . $id);
            
        }else{
            $this->session->set_flashdata('danger', 'não foi possível deletar!<br>Id: ' . $id);
        }
        redirect('/produto/index');
    
    }
}