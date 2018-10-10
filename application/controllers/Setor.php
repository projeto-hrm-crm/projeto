<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends PR_Controller
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
        $this->setTitle('Setores');
        $this->addData('setores', $this->setor->get());

        $this->loadIndexDefaultScripts();

        $this->loadView('index');
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

                $this->redirectSuccess('Setor cadastrado com sucesso!');
            }
            else
            {
                $this->redirectError('cadastrar');
            }
        }
        else
        {
            $this->setTitle('Cadastrar Setor');

            $this->loadFormDefaultScripts();

            $this->loadView('cadastrar');

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
                $this->redirectSuccess('Setor atualizado com sucesso!');
            }
            else
            {
                $this->redirectError('editar/'.$id_setor);
            }

        }
        else
        {
            $this->setTitle('Editar Setor');

            $this->addData('setor',    $this->setor->getById($id_setor));
            $this->addData('id_setor', $id_setor);

            $this->loadFormDefaultScripts();

            $this->loadView('editar');
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
  $setor =  $this->db->where('cargo.id_setor', $id_setor)->get('cargo')->row();

  if(!$setor){
     $this->setor->remove($id_setor);
     $this->session->set_flashdata('success','Setor removido com sucesso!');
  }else{
    $this->session->set_flashdata('danger','Não foi possivel Realizar esta operação, Existem cargos cadastrados no Setor!');
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
