<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Habilidade extends CI_Controller {

    /**
    * @author: Rodrigão
    * Realiza o cadastro de um habilidade, dados recebidos da view habilidade/cadastro.php
    */
    public function create($id_pessoa) {
        
        $data = $this->input->post();
        
        if($data) {

            if($this->form_validation->run('habilidade')) {
               
               $array = array(
                 'id_pessoa' => $id_pessoa,
                 'nome' => $this->input->post('nome'),
               );
                
                $this->habilidade->insert($array);
                $this->session->set_flashdata('success', 'Sugestão cadastrado com sucesso!');
                redirect('perfil/');
            }
            else {
                $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
                redirect('habilidade/cadastrar');
            }
        }
        else {
            $data['title'] = 'Cadastrar Habilidades';             
            $this->load->view('habilidade/cadastrar.php', $data);           

        }

    }
   
    /**
    * @author: Rodrigão
    * Realiza a atualização de um habilidade
    */
    public function edit($id_habilidade) {
        
        $data = $this->input->post();
        
        if($data) {
            if($this->form_validation->run('habilidade')) {
               
                $array = array(
                 'id_habilidade' => $id_habilidade,
                 'nome' => $this->input->post('nome'),
               );
               
                $this->habilidade->insert($array);
                $this->session->set_flashdata('success', 'Sugestão cadastrado com sucesso!');
                redirect('habilidade/cadastrar');
            }
            else {
                $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
                redirect('habilidade/cadastrar');
            }
        }
        else {
            $data['title'] = 'Sugestões';             
            $this->load->view('habilidade/cadastrar.php', $data);
        }
    }

    /**
    * @author: Rodrigão
    * Realiza remoção de registro de um habilidade pelo id, dados recebidos pela view habilidade/delete.php
    *
    *@param integer: referen-se ao id do habilidade a ser alterado
    */
    public function delete($id_habilidade) {      
        $this->habilidade->remove($id_habilidade);
        $this->session->set_flashdata('success','habilidade removido com sucesso!');

        redirect('habilidade');
    }

}
