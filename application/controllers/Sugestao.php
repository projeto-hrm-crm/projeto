<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sugestao extends CI_Controller {

    /**
    * @author: Rodrigão
    * Carrega a listagem de sugestao
    */
    public function index() {
        
        $data['sugestao'] = $this->sugestao->get();
        $data['title'] = 'Sugestões'; 
        
        $this->load->view('sugestao/index.php', $data);
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
    *Realiza edição de registro de um sugestao pelo id, dados recebidos pela view sugestao/editar.php
    *
    *@param integer: referen-se ao id do sugestao a ser alterado
    */
    public function edit($id_sugestao)
    {
        if ($this->input->post())
        {

            if($this->form_validation->run('sugestao'))
            {
                $this->sugestao->update($this->getFromPostEdit($id_sugestao));
                $this->redirectSuccess('sugestao atualizado com sucesso!');
            }
            else
            {
                $this->redirectError('editar/'.$id_sugestao);
            }

        }
        else
        {
            $this->setTitle('Editar sugestao');

            $this->addData('sugestao',    $this->sugestao->getById($id_sugestao));
            $this->addData('id_sugestao', $id_sugestao);

            $this->loadFormDefaultScripts();

            $this->loadView('editar');
        }

    }

    /**
    * @author: Rodrigão
    * Realiza remoção de registro de um sugestao pelo id, dados recebidos pela view sugestao/delete.php
    *
    *@param integer: referen-se ao id do sugestao a ser alterado
    */
    public function delete($id_sugestao) {
      $sugestao =  $this->db->where('cargo.id_sugestao', $id_sugestao)->get('cargo')->row();

      if(!$sugestao){
         $this->sugestao->remove($id_sugestao);
         $this->session->set_flashdata('success','sugestao removido com sucesso!');
      }else{
        $this->session->set_flashdata('danger','Não foi possivel Realizar esta operação, Existem cargos cadastrados no sugestao!');
      }
      redirect('sugestao');
    }

}
