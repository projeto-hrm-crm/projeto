<?php

/**
* author: Mayra Bueno
* Controller de candidato
**/

class Candidato extends CI_Controller
{
  /**
  * Metodo index que chama a view inicial de candidato
  **/
  public function index()
  {
    $data['title'] = 'Candidatos';
    $data['candidatos'] = $this->candidato->get();

    loadTemplate('includes/header', 'candidato/index', 'includes/footer', $data);
  }


  /**
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de Candidato_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de candidato
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {
    $data = $this->input->post();

    if($data){
      // if ($this->form_validation->run('candidato'))
      // {
        $id_pessoa = $this->pessoa->insert(['nome' => $data['nome'], 'email' => $data['email']]);
    		$id_pessoa_fisica = $this->pessoa_fisica->insert(['data_nascimento'=> $data['data_nacimento'],'sexo'=>$data['sexo'],'id_pessoa'=>$id_pessoa]);
        $this->candidato->insert(['id_pessoa_fisica' => $id_pessoa_fisica]);
        $this->session->set_flashdata('success', 'Candidato cadastrado com sucesso.');
        redirect('candidato');
      // }else{
      //   $this->session->set_flashdata('danger', 'Candidato não pode ser cadastrado');
      //   redirect('candidato/create');
      // }
    }

    $data['title'] = 'Cadastrar Candidato';
    loadTemplate('includes/header', 'candidato/cadastrar', 'includes/footer', $data);
  }


  /**
  * Metodo edit, apresenta o formulario de edição, com os dados do candidato a ser editado,
  * recebe os dados e envia para função update de candidato_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de candidato
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id int, id do candidato
  **/
  public function edit($id_candidato)
  {
    if ($this->input->post())
    {
      $data = $this->input->post();
      // if ($this->form_validation->run('candidato'))
      // {
        $candidato = $this->candidato->find($id_candidato);

        $this->pessoa->update(['id_pessoa' => $candidato[0]->id_pessoa, 'nome'=> $data['nome'],'email'=>$data['email']]);
        $this->pessoa_fisica->update($candidato[0]->id_pessoa_fisica,['data_nascimento'=> $data['candidato']['data_nascimento'],'sexo'=>$data['candidato']['sexo']]);
        $this->session->set_flashdata('success', 'Candidato editado com sucesso.');
        redirect('candidato');
      // }else{
      //   $this->session->set_flashdata('danger', 'Candidato não pode ser cadastrado');
      //   redirect('candidato/edit/'.$id_candidato);
      // }
    }

    $data['candidato'] = $this->candidato->find($id_candidato);
    $data['title'] = 'Editar Candidato';
    $data['id'] = $id_candidato;

    loadTemplate('includes/header', 'candidato/editar', 'includes/footer', $data);
  }

  /**
  * Metodo delete, chama a funçao delete de Candidato_model, passando o id do candidato
  * Redireciona para a pagina index de candidato
  *
  * @param $id_candidato int
  **/
  public function delete($id_candidato)
  {
    $data['candidato'] = $this->candidato->find($id_candidato);
    if ($data)
    {
      $this->candidato->remove($id_candidato);
      $this->session->set_flashdata('success', 'Candidato excluido com sucesso');
      redirect('candidato');
    }
  }
}
