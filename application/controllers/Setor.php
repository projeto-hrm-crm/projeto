<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends CI_Controller
{

    function __construct()
    {
        parent::__construct('setor');
    }

    /**
    * @author: Desconhecido
    * Carrega a listagem de setores
    */
    public function index()
    {
        $data['title'] = 'Setores';
        $data['setores'] = $this->setor->get();
        $data['assets'] = array(
         'js' => array(
           'confirm.modal.js'
         ),
       );

        loadTemplate('includes/header', 'setor/index', 'includes/footer', $data);
    }

    /**
    * @author: Matheus Ladislau
    * Realiza o cadastro de um setor, dados recebidos da view setor/cadastro.php
    */
    public function create()
    {
        if($this->input->post())
        {

            if($this->form_validation->run('setor'))
            {
                $this->setor->insert($this->getFromPost());

                $this->session->set_flashdata('success','Setor cadastrado com sucesso!');
                redirect('setor');
            }
            else
            {
              $this->session->set_flashdata('errors', $this->form_validation->error_array());
              $this->session->set_flashdata('old_data', $this->input->post());
              redirect('setor/cadastrar');
            }
        }
        else
        {
            $data['title'] = 'Cadastrar Setor';

            loadTemplate('includes/header', 'setor/cadastrar', 'includes/footer', $data);

        }

    }

    /**
    * @author: Matheus Ladislau
    *Realiza edição de registro de um setor pelo id, dados recebidos pela view setor/editar.php
    *
    *@param integer: referen-se ao id do setor a ser alterado
    */
    public function edit($id_setor)
    {
        if ($this->input->post())
        {

            if($this->form_validation->run('setor'))
            {
                $this->setor->update($this->getFromPostEdit($id_setor));
                $this->session->set_flashdata('success','Setor atualizado com sucesso!');
                redirect('setor');
            }
            else
            {
              $this->session->set_flashdata('errors', $this->form_validation->error_array());
              $this->session->set_flashdata('old_data', $this->input->post());
              redirect('setor/editar/'.$id);
            }

        }
        else
        {
            $data['title'] = 'Editar Setor';

            $data['setor'] = $this->setor->getById($id_setor);
            $data['id_setor'] = $id_setor;

            loadTemplate('includes/header', 'setor/editar', 'includes/footer', $data);
        }

    }

    /**
    * @author: Matheus Romeo
    * Realiza remoção de registro de um setor pelo id, dados recebidos pela view setor/delete.php
    *
    *@param integer: referen-se ao id do setor a ser alterado
    */
    public function delete($id_setor)
    {
      $setor = $this->setor->getById($id_setor);
      if($setor){
         $this->setor->remove($id_setor);
         $this->session->set_flashdata('success','Setor removido com sucesso!');
      }else{
        $this->session->set_flashdata('danger','Não foi possivel realizar esta operação, existem cargos cadastrados no Setor!');
      }
      redirect('setor');
    }


    /**
    * @author: Tiago Villalobos
    * Retorna um array com dados pegos por post
    *
    * @return: mixed
    */
    private function getFromPost()
    {
        return array(
            'nome' => $this->input->post('nome'),
            'sigla' => $this->input->post('sigla'),
            'descricao' => $this->input->post('descricao')
        );
    }

    /**
    * @author: Tiago Villalobos
    * Retorna um array com dados pegos por post adicionado a eles o id_setor
    *
    * @return: mixed
    */
    private function getFromPostEdit($id_setor)
    {
        $postData = $this->getFromPost();

        $postData['id_setor'] =  $id_setor;

        return $postData;
    }
}
