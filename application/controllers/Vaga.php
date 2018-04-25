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
      $dados['title'] = 'Vagas';
      $dados['vagas'] = $this->vaga->get();
      $vagas = $dados['vagas'];
      foreach($vagas as $vaga){
          $vaga->cargo = $_POST($vaga->cargo);
          $vaga->setor = switchDate($vaga->setor);
          $vaga->data_oferta = switchDate($vaga->data_oferta);

      }
      loadTemplate('includes/header', 'Vaga/index', 'includes/footer', $dados);
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
           'cargo' => $this->input->post('cargo'),
           'setor' => $this->input->post('setor'),
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
        $dados['title'] = 'Cadastrar vaga';
        $dados['errors'] = $this->session->flashdata('errors');
        $dados['old_data'] = $this->session->flashdata('old_data');
        loadTemplate('includes/header', 'cadastrar/vaga', 'includes/footer', $dados);
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
