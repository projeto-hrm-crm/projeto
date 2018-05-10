<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaga extends CI_Controller
{

  public $menus;
    /**
     * @author Pedro Henrique Guimarães
     * Com a configuração do menu esse controller serve como base para todos os outros controllers
     * onde todos devem seguir essa mesma estrutura mínima no consrutor.
     */
    public function __construct()
    {
      parent::__construct();
      $user_id = $this->session->userdata('user_login');
      $url = isset($_SERVER['PATH_INFO']) ? ltrim($_SERVER['PATH_INFO'], '/') : '';
      $this->usuario->hasPermission($user_id, $url);
      $this->menus = $this->menu->getUserMenu($user_id);
    }
    /**
      *@author: Lucilene Fidelis
      * Esse método tem a finalidade de retornar uma lista com todos as vagas
      * cadastradas
      *
      *
      */

    public function index()
    {
      $data['title'] = 'Vagas';
      $data['menus'] = $this->menus;
      $data['vagas'] = $this->vaga->get();
      $data['success_message']=$this->session->flashdata('success');
       $data['error_message']=$this->session->flashdata('danger');
       $data['assets'] = array(
        'js' => array(
          'lib/data-table/datatables.min.js',
          'lib/data-table/dataTables.bootstrap.min.js',
          'datatable.js',
          'confirm.modal.js'
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

           'data_oferta' => switchDate($this->input->post('data_oferta')),

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
        $data['menus'] = $this->menus;
        $data['errors'] = $this->session->flashdata('errors');
        $data['success_message'] = $this->session->flashdata('success');
        $data['error_message']   = $this->session->flashdata('danger');
        $data['old_data'] = $this->session->flashdata('old_data');
         $data['assets'] = array(
        'js' => array(

          'validate.js',
        ),

      );
         $data['cargos'] = $this->cargo->get();

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

            'id_vaga' => $id,
           'id_cargo' => $this->input->post('id_cargo'),
           'quantidade' => $this->input->post('quantidade'),
           'requisitos' => $this->input->post('requisitos'),
           'data_oferta' => switchDate($this->input->post('data_oferta')),

          );
          $this->vaga->update($array);
          $this->session->set_flashdata('success','Atualizado com sucesso.');
          redirect('vaga');
        }else{
          $this->session->set_flashdata('errors', $this->form_validation->error_array());
          $this->session->set_flashdata('old_data', $this->input->post());
          redirect('editar/vaga/'.$id);
        }
      }else{
        $data['errors'] = $this->session->flashdata('errors');
        $data['title'] = 'Alterar Vaga';
        $data['menus'] = $this->menus;
        $data['vaga'] = $this->vaga->getById($id);
        $data['success_message'] = $this->session->flashdata('success');
        $data['error_message']   = $this->session->flashdata('danger');
        $data['vaga']->data_oferta = switchDate($data['vaga']->data_oferta);
        $data['old_data'] = $this->session->flashdata('old_data');
       $data['assets'] = array(
        'js' => array(
          'lib/jquery/jquery.validate.min.js',
          'validate.js',
        ),

      );

        $data['cargos'] = $this->cargo->get();

        loadTemplate('includes/header', 'vaga/editar', 'includes/footer', $data);
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
      if($vaga){
        $this->vaga->remove($id);
        $this->session->set_flashdata('success', 'Vaga removida com sucesso.');
      }else{
        $this->session->set_flashdata('danger', 'Não foi possível remover a Vaga!');
      }
      redirect('vaga');
    }
}
