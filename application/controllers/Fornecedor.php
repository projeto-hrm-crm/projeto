<?php

/**
* author: Nikolas Lencioni
* Controller de fornecedor
**/

class Fornecedor extends CI_Controller
{
  /**
  * author: Nikolas Lencioni
  * Metodo index que chama a view inicial de fornecedores
  **/
  public function index()
  {
    $data['title'] = 'Fornecedores';
    $data['fornecedores'] = $this->fornecedor->get();
    // print_r($data);
    // exit();

    loadTemplate('includes/header', 'fornecedor/index', 'includes/footer', $data);
  }


  /**
  * author: Nikolas Lencioni
  * Metodo create, apresenta o formulario de cadastro, recebe os dados
  * e envia para função insert de Fornecedor_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  **/
  public function create()
  {
    $data = $this->input->post();

    if($data)
    {
      if ($this->form_validation->run('fornecedor'))
      {
        $this->fornecedor->insert($data);
        $this->session->set_flashdata('success', 'Fornecedor cadastrado com sucesso.');

        redirect('fornecedor');
      }else{
        $this->session->set_flashdata('danger', 'Fornecedor não pode ser cadastrado');

        redirect('fornecedor/create');
      }
    }

    $data['title'] = 'Cadastrar Fornecedor';
    loadTemplate('includes/header', 'fornecedor/cadastrar', 'includes/footer', $data);
  }


  /**
  * author: Nikolas Lencioni
  * Metodo edit, apresenta o formulario de edição, com os dados do fornecedor a ser editado,
  * recebe os dados e envia para função update de Fornecedor_model
  *
  * Se cadastrar com sucesso, redireciona para pagina index de fornecedor
  * Se não, mostra msg de erro e redireciona para a mesma pagina
  *
  * @param $id int, id do fornecedor
  **/
  public function edit($id)
  {
    if ($this->input->post())
    {
      $data['fornecedor'] = $this->input->post();
      if ($this->form_validation->run('fornecedor'))
      {
        $this->fornecedor->update($id, (array)$data['fornecedor']);
        $this->session->set_flashdata('success', 'Fornecedor editado com sucesso.');
        redirect('fornecedor');
      }else{
        $this->session->set_flashdata('danger', 'Fornecedor não pode ser cadastrado');
        redirect('fornecedor/edit/'.$id);
      }
    }

    $data['fornecedor'] = $this->fornecedor->find($id);
    $data['title'] = 'Editar Fornecedor';
    $data['id'] = $id;

    loadTemplate('includes/header', 'fornecedor/editar', 'includes/footer', $data);
  }

  /**
  * author: Nikolas Lencioni
  * Metodo delete, chama a funçao delete de Fornecedor_model, passando o id do fornecedores
  * Redireciona para a pagina index de fornecedor
  *
  * @param $id int
  **/
  public function delete($id)
  {
    $data['fornecedor'] = $this->fornecedor->find($id);
    if ($data)
    {
      $this->fornecedor->delete($id);
      $this->session->set_flashdata('success', 'Fornecedor excluido com sucesso');
      redirect('fornecedor');
    }
  }
}
