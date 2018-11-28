<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Habilidade extends CI_Controller {

   
   function __construct()
    {
        parent::__construct('habilidade');
    }
   
    /**
    * @author: Rodrigão
    * Realiza o cadastro de um habilidade, dados recebidos da view habilidade/cadastro.php
    */
   
    public function create() {    
         
       
        $data = $this->input->post();
        
        if($data) {

            if($this->form_validation->run('habilidade')) {               
               
               $data['pessoa'] = $this->usuario->getUserNameById($this->session->userdata('user_login'));
               $id_pessoa = $data['pessoa'][0]->id_pessoa;
               
               $array = array(
                 'id_pessoa' => $id_pessoa,
                 'nome' => $this->input->post('nome'),
               );
                
                $this->habilidade->insert($array);
                $this->session->set_flashdata('success', 'Habilidade cadastrado com sucesso!');
                redirect('perfil/');
               
            }
            else {
                $this->session->set_flashdata('danger', 'Não foi possivel cadastrar');
                redirect('habilidade/cadastrar');
            }
        }
        else {
           
           
            $data['title'] = 'Cadastrar Habilidades';             
            loadTemplate('includes/header', 'habilidade/cadastrar', 'includes/footer', $data);
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
               
                $this->habilidade->update($array);
                $this->session->set_flashdata('success', 'Habilidade editada com sucesso!');
                redirect('perfil');
            }
            else {
                $this->session->set_flashdata('danger', 'Não foi possivel editar');
                redirect('habilidade/editar/'.$id_habilidade);
            }
        }
        else {
            $data['title'] = 'Sugestões';   
            $data['habilidade'] = $this->habilidade->find($id_habilidade);
            loadTemplate('includes/header', 'habilidade/editar', 'includes/footer', $data);
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
        $this->session->set_flashdata('success','Habilidade removido com sucesso!');

        redirect('perfil');
    }

}
