<?php

/**
* author: Camila Sales
* Controller de funcionario
**/

class Funcionario extends CI_Controller
{
  /**
  * author: Camila Sales
  * Metodo index que chama a view inicial de funcionarioes
  **/
  public function index()
  {
    $data['title'] = 'Funcionarios';
    $data['funcionarios'] = $this->funcionario->get();

    loadTemplate('includes/header', 'funcionario/index', 'includes/footer', $data);
  }


  /**
  * author: Camila Sales
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de Funcionario_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de funcionario
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {
    $data = $this->input->post();

    if($data){
      // if ($this->form_validation->run('funcionario'))
      // {
        $id_pessoa = $this->pessoa->insert(['nome' => $data['nome'], 'email' => $data['email']]);
    		$id_pessoa_fisica = $this->pessoa_fisica->insert(['data_nascimento'=> $data['data_nacimento'],'sexo'=>$data['sexo'],'id_pessoa'=>$id_pessoa]);
        $this->funcionario->insert(['id_pessoa_fisica' => $id_pessoa_fisica]);
        $this->session->set_flashdata('success', 'Funcionario cadastrado com sucesso.');
        redirect('funcionario');
      // }else{
      //   $this->session->set_flashdata('danger', 'Funcionario não pode ser cadastrado');
      //   redirect('funcionario/create');
      // }
    }

    $data['title'] = 'Cadastrar Funcionario';
    loadTemplate('includes/header', 'funcionario/cadastrar', 'includes/footer', $data);
  }


  /**
  * author: Camila Sales
  * Metodo edit, apresenta o formulario de edição, com os dados do funcionario a ser editado,
  * recebe os dados e envia para função update de Funcionario_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de funcionario
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id int, id do funcionario
  **/
  public function edit($id_funcionario)
  {
    if ($this->input->post())
    {
      $data = $this->input->post();
      // if ($this->form_validation->run('funcionario'))
      // {
        $funcionario = $this->funcionario->find($id_funcionario);
        
        $this->pessoa->update(['id_pessoa' => $funcionario[0]->id_pessoa, 'nome'=> $data['nome'],'email'=>$data['email']]);
        $this->pessoa_fisica->update($funcionario[0]->id_pessoa_fisica,['data_nascimento'=> $data['data_nascimento'],'sexo'=>$data['sexo']]);
        $this->session->set_flashdata('success', 'Funcionario editado com sucesso.');
        redirect('funcionario');
      // }else{
      //   $this->session->set_flashdata('danger', 'Funcionario não pode ser cadastrado');
      //   redirect('funcionario/edit/'.$id_funcionario);
      // }
    }

    $data['funcionario'] = $this->funcionario->find($id_funcionario);
    $data['title'] = 'Editar Funcionario';
    $data['id'] = $id_funcionario;

    loadTemplate('includes/header', 'funcionario/editar', 'includes/footer', $data);
  }

  /**
  * author: Camila Sales
  * Metodo delete, chama a funçao delete de Funcionario_model, passando o id do funcionarioes
  * Redireciona para a pagina index de funcionario
  *
  * @param $id_funcionario int
  **/
  public function delete($id_funcionario)
  {
    $data['funcionario'] = $this->funcionario->find($id_funcionario);
    if ($data)
    {
      $this->funcionario->remove($id_funcionario);
      $this->session->set_flashdata('success', 'Funcionario excluido com sucesso');
      redirect('funcionario');
    }
  }
}
