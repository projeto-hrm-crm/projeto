<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sugestao extends CI_Controller {

    /**
    * @author: Rodrigão
    * Carrega a listagem de sugestao
    */
    public function index() {
        
        
        $data['title'] = 'Sugestões'; 
        $data['sugestao'] = $this->sugestao->get();
        $data['assets'] = array(
            'js' => array(
              'lib/data-table/datatables.min.js',
              'lib/data-table/dataTables.bootstrap.min.js',
              'datatable.js',
              'confirm.modal.js',
            ),
        );        
        loadTemplate('includes/header', 'sugestao/index.php', 'includes/footer', $data);
        
    }
    
    /**
    * @author: Rodrigão
    * Carrega a listagem de sugestao
    */
    public function details($id_sugestao) {
        
        
        $data['title'] = 'Sugestões'; 
        $data['sugestao'] = $this->sugestao->getById($id_sugestao);
        
        loadTemplate('includes/header', 'sugestao/visualizar.php', 'includes/footer', $data);
        
    }

    /**
    * @author: Rodrigão Bobão
    * Realiza o cadastro de um sugestao, dados recebidos da view sugestao/cadastro.php
    */
    public function create() {
        
        $data = $this->input->post();
        
        if($data) {

            if($this->form_validation->run('sugestao')) {
                
                $this->sugestao->insert($data);
                $this->session->set_flashdata('success', 'Sugestão cadastrado com sucesso!');
                redirect('sugestao/cadastrar');
            }
            else {
                $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
                redirect('sugestao/cadastrar');
            }
        }
        else {
            $data['title'] = 'Sugestões';             
            $this->load->view('sugestao/cadastrar.php', $data);           

        }

    }

    /**
    * @author: Rodrigão
    * Realiza remoção de registro de um sugestao pelo id, dados recebidos pela view sugestao/delete.php
    *
    *@param integer: referen-se ao id do sugestao a ser alterado
    */
    public function delete($id_sugestao) {      
        $id_pessoa = $this->sugestao->remove($id_sugestao);
        $this->pessoa->remove($id_pessoa);
        $this->session->set_flashdata('success','sugestao removido com sucesso!');

        redirect('sugestao');
    }

}
