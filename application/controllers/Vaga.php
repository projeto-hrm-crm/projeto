<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Vaga extends CI_Controller
{
    /**
      *@author: Lucilene Fidelis
      * Esse método tem a finalidade de retornar uma lista com todos as vagas
      * cadastradas
      *
      * 
      */
    
    public function index()
    {
      $data['title'] = 'vagas';
      $data['vagas'] = $this->vaga->get();
      $data['sucess_message']=$this->session->flashdata('sucess');
       $data['error_message']=$this->session->flashdata('danger');
       $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'vaga/main.js',
        ),
      );
      
      loadTemplate('includes/header', 'Vaga/index', 'includes/footer', $data);
    }


    /**
     * @author: Lucilene Fidelis
     * Se não houver post ele carrega a pagina cadastrar
     * Esse método tem a finalidade de cadastrar uma vaga
     * Se der certo ele redireciona para a lista de vagas
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/cadastrar/vaga
     */
    public function create()
    {
      if($this->input->post()){
        if($this->form_validation->run('vaga')){
          $array = array(
           'id_cargo' => $this->input->post('id_cargo'),
           'quantidade' => $this->input->post('quantidade'),
           'requisitos' => $this->input->post('requisitos'),

           'data_oferta' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('data_oferta')))),
           
          );
            $this->vaga->insert($array);
            $this->session->set_flashdata('success','Cadastrado com sucesso');
            redirect('vaga');
        }else{
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('old_data', $this->input->post());
            redirect('cadastrar/vaga');
        }
      }else{
        $data['title'] = 'Cadastrar vaga';
        $data['errors'] = $this->session->flashdata('errors');
        $data['old_data'] = $this->session->flashdata('old_data');
         $data['assets'] = array(
        'js' => array(
          
          'vaga/validate.js',
        ),
      );
      
        loadTemplate('includes/header', 'vaga/cadastrar', 'includes/footer', $data);
      }
    }

    /**
     * @author: Lucilene Fidelis
     * Se não houver post ele carrega a pagina editar
     * Esse método tem a finalidade de cadastrar a vaga
     * Se der certo ele redireciona para a lista de vagas
     * Se der errado ele aciona um danger na pagina de cadastro
     *
     * Rota: http://localhost/projeto/editar/vaga
     */
    public function edit($id)
    {
      if($this->input->post()){
        if($this->form_validation->run('vaga')){
          $array = array(
           $array = array(
           'cargo' => $this->input->post('cargo'),
           'setor' => $this->input->post('setor'),
           'data_oferta' => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('data_oferta')))),
           )
          );
          $this->vaga->update($array);
          $this->session->set_flashdata('success','Alterado com sucesso.');
          redirect('vaga');
        }else{
          $this->session->set_flashdata('errors', $this->form_validation->error_array());
          redirect('editar/vaga/'.$id);
        }
      }else{
        $data['errors'] = $this->session->flashdata('errors');
        $data['title'] = 'Alterar Vaga';
        $data['vaga'] = $this->vaga->getById($id);
        $data['vaga']->cargo = switchDate($data['vaga']->cargo);
        $data['vaga']->setor = switchDate($data['vaga']->setor);
        $data['vaga']->data_oferta = switchDate($data['vaga']->data_oferta);
        loadTemplate('includes/header', 'editar/vaga', 'includes/footer', $data);
      }
    }

    /**
     * @author: Lucilene Fidelis
     * Esse método tem a finalidade de deletar
     * Se der certo ele lança um succes na lista de vagas
     * Se der errado ele lança um danger na lista de vagas
     * @param: $id
     * Rota: http://localhost/projeto/remover/vaga
     */
    public function delete($id){
      $vaga = $this->vaga->getById($id);
      if($produto){
        $this->vaga->delete($id);
        $this->session->set_flashdata('success', 'Vaga deletada com sucesso.');
      }else{
        $this->session->set_flashdata('danger', 'Impossível Deletar!');
      }
      redirect('vaga');
    }
}
